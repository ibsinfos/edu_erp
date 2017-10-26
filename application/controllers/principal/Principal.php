<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {
    private $_SEODataArr=array();
    function __construct() {
        parent::__construct();
        $generalDataArr=array();
            $meta=array();
            $generalDataArr['MetaTitle']="Temp School";
            $meta[]=array('name' => 'description', 'content' => "School");
            $meta[]=array('name' => 'keywords', 'content' =>'content');
            $generalDataArr['meta']=$meta;
            $generalDataArr['ogImage']='';
        $this->_SEODataArr=$generalDataArr;
    }
    
    function index(){
        if($this->_is_loged_in()){
            $this->dashboard();
        }else{
            redirect(BASE_URL.'login');
        }
    }
    
    
    function dashboard(){
        if($this->_is_loged_in()==FALSE){
            redirect(BASE_URL.'login');
        }else{
            $currentUserType=  $this->session->userdata('logedinUserType');
            $data=$this->_get_logedin_template($this->_SEODataArr);
            //pre($data);die;
            $data['breadcrumb']=  generate_breadcrumb();
            $data['custer_data']="customer data";
            $userType=  $this->session->userdata('USER_TYPE');
            $this->load->view($this->erpUserTypeArr[$this->userType].'/dashboard',$data);
        }
    }
    
    function show_student_list(){
        if($this->_is_loged_in()==FALSE){
            redirect(BASE_URL.'login');
        }else{
            $this->load->model('Sc_student_model');
            $currentUserType=  $this->session->userdata('logedinUserType');
            $data=$this->_get_logedin_template($this->_SEODataArr);
            $breadcrumb=array();
            $breadcrumbItemArr=array('breadcrumbLink'=>'#','tooltip'=>'All Student List','breadcrumbIcon'=>'fa-user','breadcrumbText'=>'Student List');
            $breadcrumb[]=$breadcrumbItemArr;
            $data['breadcrumb']=  generate_breadcrumb($breadcrumb);
            $data['studentDataArr']=  $this->Sc_student_model->get_students_list_for_principal();
            $this->load->view($this->erpUserTypeArr[$this->userType].'/student_list',$data);
        }
    }
    
    function show_student(){
        if($this->_is_loged_in()==FALSE){
            redirect(BASE_URL.'login');
        }else{
            $data=$this->_get_logedin_template($this->_SEODataArr);
            $breadcrumb=array();
            $breadcrumbItemArr=array('breadcrumbLink'=>'#','tooltip'=>'All Student List','breadcrumbIcon'=>'fa-user','breadcrumbText'=>'Student List');
            $breadcrumb[]=$breadcrumbItemArr;
            $data['breadcrumb']=  generate_breadcrumb($breadcrumb);
            $data['custer_data']="customer data";
            $this->load->view($this->erpUserTypeArr[$this->userType].'/dashboard',$data);
        }
    }
    
    function show_class_list(){
        if($this->_is_loged_in()==FALSE){
            redirect(BASE_URL.'login');
        }else{
            $data=$this->_get_logedin_template($this->_SEODataArr);
            $breadcrumb=array();
            $breadcrumbItemArr=array('breadcrumbLink'=>'#','tooltip'=>'All Class List','breadcrumbIcon'=>'fa-user','breadcrumbText'=>'Class List');
            $breadcrumb[]=$breadcrumbItemArr;
            $data['breadcrumb']=  generate_breadcrumb($breadcrumb);
            $data['custer_data']="customer data";
            $this->load->view($this->erpUserTypeArr[$this->userType].'/class_list',$data);
        }
    }
    
    function show_teacher_list(){
        if(!$this->_is_loged_in()){
            redirect(BASE_URL.'login');
        }
        $this->load->model('Sc_teacher_model');
        $this->load->model('Sc_job_title_model');
        $this->load->model('Sc_gender_model');
        $this->load->model('Sc_blood_group_model');
        $this->load->model('Sc_country_model');
        $data=$this->_get_logedin_template($this->_SEODataArr);
        $breadcrumb=array();
        $breadcrumbItemArr=array('breadcrumbLink'=>'#','tooltip'=>'All Teacher List','breadcrumbIcon'=>'fa-user','breadcrumbText'=>'Teacher List');
        $breadcrumb[]=$breadcrumbItemArr;
        $data['breadcrumb']=  generate_breadcrumb($breadcrumb);
        $data['teacherDataArr']=  $this->Sc_teacher_model->get_teachers_list_for_principal();
        $data['table_teacher_structure_text']= $this->Sc_teacher_model->_table_teacher_structure_text;
        $data['table_user_structure_text']= $this->Sc_teacher_model->_table_user_structure_text;
        $data['jobTitleArr']= $this->Sc_job_title_model->get_list();
        $data['genderArr']= $this->Sc_gender_model->get_list();
        $data['blogGroupArr']= $this->Sc_blood_group_model->get_list();
        $data['countryArr']= $this->Sc_country_model->get_list();
        $this->load->view($this->erpUserTypeArr[$this->userType].'/teacher/teacher_list',$data);
    }
    
    function show_teacher_edit($teacherId){
        //$teacherId= $this->input->post("teacherId",TRUE);
         if($teacherId==""){
             //process error message
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
                $valueProp='value="'.$dataArr[0][$k].'"';
                $v['elementEditVal']=$valueProp;
                $table_user_structure_text_arr[]=$v;
            }
            
            $table_teacher_structure_text_arr=array();
            foreach($table_teacher_structure_text AS $k =>$v){
                $valueProp='value="'.$dataArr[0][$k].'"';
                $v['elementEditVal']=$valueProp;
                $table_teacher_structure_text_arr[]=$v;
            }
            $data=$this->_get_logedin_template($this->_SEODataArr);
            $data['table_user_structure_text']=$table_user_structure_text_arr;
            $data['table_teacher_structure_text']=$table_teacher_structure_text_arr;
            $data['teacherDataArr']=$dataArr;
            $data['teacherId']=$teacherId;
            $data['countryArr']= $this->Sc_country_model->get_list();
            $data['jobTitleArr']= $this->Sc_job_title_model->get_list();
            $data['genderArr']= $this->Sc_gender_model->get_list();
            $data['blogGroupArr']= $this->Sc_blood_group_model->get_list();
            $this->load->view($this->erpUserTypeArr[$this->userType].'/teacher/teacher_edit',$data);
         }
    }
}
