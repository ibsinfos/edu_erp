<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller_principal extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function add_teacher() {
        //pre($_FILES);
        //die;
        //pre($this->input->post());die;
        $this->load->model('Sc_teacher_model');
        $this->load->model('Sc_user_model');
        $tableTeacherStructureTextArr = $this->Sc_teacher_model->_table_teacher_structure_text;
        $tableUserStructureTextArr = $this->Sc_teacher_model->_table_user_structure_text;
        $tableTeacherStructureForeignKeyIdArr = $this->Sc_teacher_model->_table_teacher_structure_foreign_key;

        $formValidationConfigArr = array();
        $formValidationConfigArr = generate_form_validation_arr($tableTeacherStructureTextArr);
        $formValidationConfigArr = generate_form_validation_arr($tableUserStructureTextArr, $formValidationConfigArr);
        $formValidationConfigArr = generate_form_validation_arr($tableTeacherStructureForeignKeyIdArr, $formValidationConfigArr);

        $this->form_validation->set_rules($formValidationConfigArr);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('result' => 'bad', 'msg' => str_replace('</p>', '', str_replace('<p>', '', validation_errors()))));die;
        } else {
            $userDataArr = array();
            $userDataArr = generate_user_table_data_arr($tableUserStructureTextArr, array('typeText' => 'teacher'));
            $userId = $this->Sc_user_model->add($userDataArr);
            //$teacherId= 3;
            $teacherDataArr = array();
            foreach ($tableTeacherStructureTextArr AS $key => $val) {
                $teacherDataArr[$key] = $this->input->post($key, TRUE);
            }
            $teacherDataArr['userId'] = $userId;
            foreach ($tableTeacherStructureForeignKeyIdArr AS $key => $val) {
                $teacherDataArr[$key] = $this->input->post($key, TRUE);
            }
            $DOBDate = DateTime::createFromFormat('d-m-Y', $teacherDataArr['DOB']);
            $teacherDataArr['DOB'] = $DOBDate->format('Y-m-d');
            $DOJDate = DateTime::createFromFormat('d-m-Y', $teacherDataArr['DOJ']);
            $teacherDataArr['DOJ'] = $DOJDate->format('Y-m-d');
            
            $profilePictureFileName= $this->input->post('profilePictureFileName',TRUE);
            if($profilePictureFileName!=""){
                $extArr=explode('.', $profilePictureFileName);
                $ext= end($extArr);
                $newFileName=rand('9999999','10000000').'-'.time().'.'.$ext;
                $destName=SchoolResourcesPath.'user_image/teacher/'.$newFileName;
                @copy(SchoolResourcesPath.'uploads/'.$profilePictureFileName,$destName);
                $teacherDataArr['image']=$newFileName;
            }
            
            $teacherId = $this->Sc_teacher_model->add($teacherDataArr);
            if ($teacherId != "") {
                echo json_encode(array('result' => 'good', 'msg' => 'Teacher added successfully.'));die;
            }
        }
    }
    
    function teacher_delete(){
        $this->load->model('Sc_teacher_model');
        $teacherId= $this->input->post('teacherId',TRUE);
        /// do transaction check stuff here; if valid then start process for delete teacher
        if($this->Sc_teacher_model->delete($teacherId)==TRUE){
            echo json_encode(array('result' => 'good', 'msg' => 'Teacher delete successfully.'));die;
        }else{
            echo json_encode(array('result' => 'bad', 'msg' => 'Unknown error arises for delete the teacher.'));die;
        }
    }
    
    function upload_profile_image() {
        /*if (!is_dir('uploads')) {
            mkdir('uploads');
        }*/
        $profilePicPath=SchoolResourcesPath.'uploads/';
        $response = array();
        $response['files'] = array();
        foreach ($_FILES as $file) {
            $newFile = array();
            $newFile['name'] = $file['name'][0];
            $newFile['size'] = $file['size'][0];
            $newFile['type'] = $file['type'][0];
            $newFile['error'] = $file['error'][0];
            $newFile['uload_path'] = $profilePicPath . $newFile['name'];
            $newFile['url']=SchoolSiteResourcesURL.'uploads/'.$newFile['name'];
            $response['files'][] = $newFile;
            move_uploaded_file($file['tmp_name'][0], $newFile['uload_path']);
        }
        echo json_encode($response);
    }
    
    function show_teacher_list_in_update_data_table(){
        $this->load->model('Sc_teacher_model');
        $teacherDataArr=  $this->Sc_teacher_model->get_teachers_list_for_principal();
        ob_start();
         if (!empty($teacherDataArr)):
            foreach ($teacherDataArr AS $key =>$value):?>
        <tr>
            <td class="center-align">
                <input type="checkbox" id="teacher<?php echo $value['teacherId'];?>">
                <label for="teacher<?php echo $value['teacherId'];?>"></label>
            </td>
            <td data-id="<?php echo $value['teacherId'];?>"><?php echo $value['fName'].' '.$value['lName'];?></td>
            <td><?php echo $value['communicationEmail'];?></td>
            <td><?php echo $value['title'];?></td>
            <td><?php echo $value['phoneNumber'];?></td>
            <td class="center-align">
                <div class="btn-group">
                    <a href="javascript:void(0);" class="btn-flat btn-small waves-effect">
                        <i class="material-icons">edit</i>
                    </a>
                    <a class="btn-flat btn-small waves-effect btnDelete">
                        <i class="material-icons">delete</i>
                    </a>
                </div>
            </td>
        </tr>
        <?php endforeach;
        endif;
        $contents = ob_get_contents();
	ob_end_clean();
        echo $contents;die;
    }
    
    function show_teacher_list_in_update_data_table1(){
         ob_start();
        ?>
        <tr>
                <td class="center-align">
                        <input type="checkbox" id="teacher4">
                        <label for="teacher4"></label>
                </td>
                <td data-id="4">demo teacher</td>
                <td>demo.teacher@school-erp.com</td>
                <td>Teacher</td>
                <td>2147483647</td>
                <td class="center-align">
                        <div class="btn-group">
                                <a href="javascript:void(0);" class="btn-flat btn-small waves-effect">
                                        <i class="material-icons">edit</i>
                                </a>
                                <a class="btn-flat btn-small waves-effect btnDelete">
                                        <i class="material-icons">delete</i>
                                </a>
                        </div>
                </td>
        </tr>
        <?php
        $contents = ob_get_contents();
	ob_end_clean();
        echo $contents;die;
    }
}
