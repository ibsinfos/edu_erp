<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller_principal extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function add_teacher() {
        $this->load->model('Sc_teacher_model');
        $this->load->model('Sc_user_model');
        $tableTeacherStructureTextArr = $this->Sc_teacher_model->_table_teacher_structure_text;
        $tableUserStructureTextArr=$this->Sc_teacher_model->_table_user_structure_text;
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
    
    function get_teacher_details_with_edit_mode(){
        $teacherId= $this->input->post("teacherId",TRUE);
        if($teacherId==""){
            echo json_encode(array('result' => 'bad', 'msg' => 'Inalid teacher index for update.'));die;
        }else{
            $this->load->model('Sc_country_model');
            $this->load->model('Sc_teacher_model');
            $this->load->model('Sc_job_title_model');
            $this->load->model('Sc_gender_model');
            $this->load->model('Sc_blood_group_model');
            $dataArr= $this->Sc_teacher_model->get_full_details_by_id($teacherId);
            $table_teacher_structure_text= $this->Sc_teacher_model->_table_teacher_structure_text;
            $table_user_structure_text= $this->Sc_teacher_model->_table_user_structure_text;
            $table_user_structure_text_arr=array();
            foreach($table_user_structure_text AS $k =>$v){
                if(array_key_exists('not_editable', $v)){
                    $valueProp=$dataArr[0][$k];
                }else{
                    $valueProp='value="'.$dataArr[0][$k].'"';
                }
                $v['elementEditVal']=$valueProp;
                $table_user_structure_text_arr[$k]=$v;
            }
            
            $table_teacher_structure_text_arr=array();
            foreach($table_teacher_structure_text AS $k =>$v){
                $valueProp='value="'.$dataArr[0][$k].'"';
                $v['elementEditVal']=$valueProp;
                $table_teacher_structure_text_arr[$k]=$v;
            }
           
            $data=array();
            $data['table_user_structure_text']=$table_user_structure_text_arr;
            $data['table_teacher_structure_text']=$table_teacher_structure_text_arr;
            //pre($dataArr);die;
            $data['teacherDataArr']=$dataArr[0];
            $data['primary_key_field']= $this->Sc_teacher_model->_table_primary_key;
            $data['primary_key_field_val']=$teacherId;
            $data['countryArr']= $this->Sc_country_model->get_list();
            $data['jobTitleArr']= $this->Sc_job_title_model->get_list();
            $data['genderArr']= $this->Sc_gender_model->get_list();
            $data['blogGroupArr']= $this->Sc_blood_group_model->get_list();
            $data['common_css'] = $this->load->view('common_css', $data, true);
            $data['common_js'] = $this->load->view('common_js', $data, true);
            $viewContent= $this->load->view($this->erpUserTypeArr[$this->userType].'/teacher/modal_teacher_edit',$data,TRUE);
            
            echo json_encode(array('result' => 'good', 'resultContent' => $viewContent));die;
        }
    }
    
    function edit_teacher(){
        //pre($_POST);die;
        $this->load->model('Sc_teacher_model');
        $this->load->model('Sc_user_model');
        $tableTeacherStructureTextArr = $this->Sc_teacher_model->_table_teacher_structure_text;
        $tableUserStructureTextArr=$this->Sc_teacher_model->_table_user_structure_text;
        
        $formValidationConfigArr = array();
        $formValidationConfigArr = generate_form_validation_arr($tableTeacherStructureTextArr,array(),TRUE);
        $formValidationConfigArr = generate_form_validation_arr($tableUserStructureTextArr, $formValidationConfigArr,TRUE);
        
        //pre($formValidationConfigArr);die;
        
        $this->form_validation->set_rules($formValidationConfigArr);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('result' => 'bad', 'msg' => str_replace('</p>', '', str_replace('<p>', '', validation_errors()))));die;
        } else {
            $primeryKeVal= $this->input->post($this->Sc_teacher_model->_table_primary_key,TRUE);
            $oldTeacherDataArr= $this->Sc_teacher_model->get_details_by_id($primeryKeVal);
            //pre($teacherDataArr);die;
            $userDataArr = array();
            $userDataArr = generate_user_table_data_arr_for_edit($tableUserStructureTextArr, array('typeText' => 'teacher'));
            //pre($userDataArr);die;
            $this->Sc_user_model->edit($userDataArr,$oldTeacherDataArr['userId']);
            //$teacherId= 3;
            $teacherDataArr = array();
            foreach ($tableTeacherStructureTextArr AS $key => $val) {
                $teacherDataArr[$key] = $this->input->post($key, TRUE);
            }
            
            /*foreach ($tableTeacherStructureForeignKeyIdArr AS $key => $val) {
                $teacherDataArr[$key] = $this->input->post($key, TRUE);
            }*/
            //pre($teacherDataArr['DOB']);die;
            $teacherDOBDataArr= explode('-', $teacherDataArr['DOB']);
            if(strlen($teacherDOBDataArr[0])==2){
                $DOBDate = DateTime::createFromFormat('d-m-Y', $teacherDataArr['DOB']);
                $teacherDataArr['DOB'] = $DOBDate->format('Y-m-d');
            }
            $teacherDOJDataArr= explode('-', $teacherDataArr['DOJ']);
            if(strlen($teacherDOJDataArr[0])==2){
                $DOJDate = DateTime::createFromFormat('d-m-Y', $teacherDataArr['DOJ']);
                $teacherDataArr['DOJ'] = $DOJDate->format('Y-m-d');
            }
            $teacherDataArr['jobTitleId'] = $this->input->post("jobTitleId",TRUE);
            $teacherDataArr['genderId'] = $this->input->post("genderId",TRUE);
            $teacherDataArr['bloodGroupId'] = $this->input->post("bloodGroupId",TRUE);
            //pre($teacherDataArr);die;
            $profilePictureFileName= $this->input->post('profilePictureFileName12',TRUE);
            if($profilePictureFileName!=""){
                $extArr=explode('.', $profilePictureFileName);
                $ext= end($extArr);
                $newFileName=rand('9999999','10000000').'-'.time().'.'.$ext;
                $destName=SchoolResourcesPath.'user_image/teacher/'.$newFileName;
                @copy(SchoolResourcesPath.'uploads/'.$profilePictureFileName,$destName);
                $teacherDataArr['image']=$newFileName;
                /// removing old img
                @unlink(SchoolResourcesPath.'user_image/teacher/'.$oldTeacherDataArr['image']);
            }
            
            if($this->Sc_teacher_model->edit($teacherDataArr,$primeryKeVal)){
                //echo json_encode(array('result' => 'good', 'msg' => 'Teacher updated successfully.'));die;
                $this->session->set_flashdata('success_message','Teacher updated successfully.');
                redirect(BASE_URL.$this->erpUserTypeArr[$this->userType].'/principal/show_teacher_list');
            }
            /*if ($teacherId != "") {
                echo json_encode(array('result' => 'good', 'msg' => 'Teacher updated successfully.'));die;
            }*/
        }
    }
    
    function teacher_status_chanage(){
        $teacherId= $this->input->post('teacherId',TRUE);
        $changeTo=$this->input->post('changeTo',TRUE);
        
        $this->load->model('Sc_teacher_model');
        $this->load->model('Sc_user_model');
        
        $TeacherDataArr= $this->Sc_teacher_model->get_details_by_id($teacherId);
        if(empty($TeacherDataArr)){
            echo json_encode(array('result' => 'bad', 'msg' => 'invalie teacher selected for status update.'));die;
        }else{
            if($this->Sc_user_model->edit(array('status'=>$changeTo),$TeacherDataArr['userId'])==TRUE){
                echo json_encode(array('result' => 'good', 'msg' => 'Teacher status change successfully.'));die;
            }else{
                echo json_encode(array('result' => 'bad', 'msg' => 'Unknown error arises for update the teacher status.'));die;
            }
        }
    }
}
