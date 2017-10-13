<?php

class Sc_user_model extends CI_Model {
    private $_table="sc_user";
    
    function __construct() {
        parent::__construct();
    }
    
    function check_login_data($userName,$password){
        $dbPassword=  md5($password.'~erp~');
        $rs=$this->db->select('*')->from($this->_table)->where('userName',$userName)->where('password',$dbPassword)->where('status','1')->get()->result_array();
        //echo $this->db->last_query();die;
        return $rs;
    }
}