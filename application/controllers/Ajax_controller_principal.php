<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller_principal extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function add_teacher() {
        $this->load->model('Sc_teacher_model');
        $tableTeacherStructureTextArr = $this->Sc_teacher_model->_table_teacher_structure_text;
        $tableUserStructureTextArr = $this->Sc_teacher_model->_table_user_structure_text;
        /*
         * $config = array(
          array('field'   => 'email','label'   => 'User Name','rules'=> 'trim|required|xss_clean|min_length[8]|max_length[35]|valid_email|callback_username_check'),
          array('field'   => 'password','label'   => 'Password','rules'   => 'trim|required|xss_clean|min_length[4]|max_length[15]'),
          array('field'   => 'confirmPassword','label'   => 'Password','rules'   => 'trim|required|xss_clean|matches[password]'),
          array('field'   => 'firstName','label'   => 'First Name','rules'   => 'trim|required|xss_clean|min_length[3]|max_length[25]'),
          array('field'   => 'lastName','label'   => 'Last Name','rules'   => 'trim|required|xss_clean|min_length[3]|max_length[25]')
          );
         * 
         */
        $formValidationConfigArr = array();
        foreach ($tableTeacherStructureTextArr AS $key => $val) {
            $tempArr = array(
                'field' => $key, 'label' => $val['label']
            );
            $ruleStr = 'trim|xss_clean';
            $ruleStr .= generate_form_validation_rules($val);
            $tempArr['rules'] = $ruleStr;
            $formValidationConfigArr[] = $tempArr;
        }

        foreach ($tableUserStructureTextArr AS $key => $val) {
            $tempArr = array(
                'field' => $key, 'label' => $val['label']
            );
            $ruleStr = 'trim|xss_clean';
            $ruleStr .= generate_form_validation_rules($val);
            $tempArr['rules'] = $ruleStr;
            $formValidationConfigArr[] = $tempArr;
        }
        $formValidationConfigArr[] = array('field' => '', 'label');
        $this->form_validation->set_rules($formValidationConfigArr);
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('result' => 'bad', 'msg' => str_replace('</p>', '', str_replace('<p>', '', validation_errors()))));
            die;
        } else {
            
        }
    }

}
