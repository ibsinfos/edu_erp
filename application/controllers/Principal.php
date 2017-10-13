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
            $data['StudentDataArr']=  $this->Sc_student_model->get_students_list_for_principal();
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
    
    
    
}
