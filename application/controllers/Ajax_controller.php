<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller extends MY_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function validate_login(){
        $this->load->model('Sc_user_model');
        $config = array(
            array('field'   => 'userName','label'   => 'User Name','rules'   => 'trim|required|xss_clean|valid_email'),
            array('field'   => 'password','label'   => 'Password','rules'   => 'trim|required|xss_clean')
         );
        //initialise the rules with validatiion helper
        $this->form_validation->set_rules($config); 
        //checking validation
        if($this->form_validation->run() == FALSE){
                //retun to login page with peroper error
                echo json_encode(array('result'=>'bad','msg'=>str_replace('</p>','',str_replace('<p>','',validation_errors()))));die;
        }else{
            $userName=$this->input->post('userName',TRUE);
            $password=$this->input->post('password',TRUE);
            $DataArr=$this->Sc_user_model->check_login_data($userName,$password);
            //print_r($DataArr);die;
            if(count($DataArr)>0){
                $this->session->set_userdata('LOGEDIN','ok');
                $this->session->set_userdata('USER_ID',$DataArr[0]['userId']);
                $this->session->set_userdata('USER_NAME',$userName);
                $this->session->set_userdata('USER_FNAME',$DataArr[0]['fName']);
                $this->session->set_userdata('USER_TYPE',$DataArr[0]['userType']);
                
                //$this->Sc_user_model->add_login_history(array('userId'=>$DataArr[0]->userId,'IP'=>$this->input->ip_address()));
                $redirect_url = $_SERVER['HTTP_REFERER'];
                echo json_encode(array('result'=>'good','url'=>$redirect_url?$redirect_url:$_SERVER['HTTP_REFERER']));die; 
            }else{
                echo json_encode(array('result'=>'bad','msg'=>'Please check your "Username" and "Password" and try again.'));die;     
            }
        }
    }
    
    function add_teacher(){
        $this->load->model('Sc_teacher_model');
        $tableTeacherStructureTextArr=$this->Sc_teacher_model->_table_teacher_structure_text;
        $tableUserStructureTextArr=$this->Sc_teacher_model->_table_user_structure_text;
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
        $formValidationConfigArr=array();
        foreach ($tableTeacherStructureTextArr AS $key => $val){
            $tempArr=array(
                'field'=>$key,'label'=>$val['label']
            );
            $ruleStr='trim|xss_clean';
            $ruleStr.= $this->_get_form_validatain_rule_str($val);
            $tempArr['rules']=$ruleStr;
            $formValidationConfigArr[]=$tempArr;
        }
        
        foreach ($tableUserStructureTextArr AS $key => $val){
            $tempArr=array(
                'field'=>$key,'label'=>$val['label']
            );
            $ruleStr='trim|xss_clean';
            $ruleStr.= $this->_get_form_validatain_rule_str($val);
            $tempArr['rules']=$ruleStr;
            $formValidationConfigArr[]=$tempArr;
        }
        $formValidationConfigArr[]=array('field'=>'','label');
        $this->form_validation->set_rules($formValidationConfigArr);
        if($this->form_validation->run() == FALSE){
            echo json_encode(array('result'=>'bad','msg'=>str_replace('</p>','',str_replace('<p>','',validation_errors()))));die;
        }else{
            
        }
    }
    
    function _get_form_validatain_rule_str($val){
        $ruleStr='';
        if(array_key_exists('required', $val)):
            $ruleStr.='|required';
            //$element.=' required="required"';
        endif;
        if($val['type']=='email'){
            $ruleStr.='|valid_email';
        }
        if($val['type']=='tel'){
            $ruleStr.='|numeric|max_length[10]';
        }
        if(array_key_exists('is_unique', $val)):
            $ruleStr.='|is_unique['.$val['is_unique'].']';
            //$element.=' required="required"';
        endif;
        return $ruleStr;
    }
}