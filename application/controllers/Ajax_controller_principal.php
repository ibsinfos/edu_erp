<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller_principal extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function add_teacher() {
        //pre($this->input->post());die;
        $this->load->model('Sc_teacher_model');
        $this->load->model('Sc_user_model');
        $tableTeacherStructureTextArr = $this->Sc_teacher_model->_table_teacher_structure_text;
        $tableUserStructureTextArr = $this->Sc_teacher_model->_table_user_structure_text;
        $tableTeacherStructureForeignKeyIdArr = $this->Sc_teacher_model->_table_teacher_structure_foreign_key;
        
        $formValidationConfigArr = array();
        $formValidationConfigArr = generate_form_validation_arr($tableTeacherStructureTextArr);
        $formValidationConfigArr = generate_form_validation_arr($tableUserStructureTextArr,$formValidationConfigArr);
        $formValidationConfigArr = generate_form_validation_arr($tableTeacherStructureForeignKeyIdArr,$formValidationConfigArr);

        $this->form_validation->set_rules($formValidationConfigArr);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('result' => 'bad', 'msg' => str_replace('</p>', '', str_replace('<p>', '', validation_errors()))));die;
        } else {
            $userDataArr=array();
            $userDataArr=generate_user_table_data_arr($tableUserStructureTextArr, array('typeText'=>'teacher'));
            $userId= $this->Sc_user_model->add($userDataArr);
            //$teacherId= 3;
            $teacherDataArr=array();
            foreach ($tableTeacherStructureTextArr AS $key => $val) {
                $teacherDataArr[$key]= $this->input->post($key,TRUE);
            }
            $teacherDataArr['userId']=$userId;
            foreach ($tableTeacherStructureForeignKeyIdArr AS $key => $val) {
                $teacherDataArr[$key]= $this->input->post($key,TRUE);
            }
            $DOBDate = DateTime::createFromFormat('d-m-Y', $teacherDataArr['DOB']);
            $teacherDataArr['DOB']= $DOBDate->format('Y-m-d');
            $DOJDate = DateTime::createFromFormat('d-m-Y', $teacherDataArr['DOJ']);
            $teacherDataArr['DOJ']= $DOJDate->format('Y-m-d');
            $teacherId=$this->Sc_teacher_model->add($teacherDataArr);
            if($teacherId!=""){
                echo json_encode(array('result' => 'good','msg'=>'Teacher added successfully.'));die;
            }
        }
    }

}
