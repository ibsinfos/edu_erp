<?php

class Sc_user_model extends CI_Model {
    private $_table="sc_user";
    
    function __construct() {
        parent::__construct();
    }
    
    function check_login_data($userName,$password){
        //        UFJJLTEyMzQ1~91b2a91f2d3e7b55941c57710757b395
        //base64_encode($passcode).'~'.md5('jsrob')
        //for principal -- PRI-12345    echo base64_encode('PRI-12345').'~'.md5('jsrob');
        $dbPassword=  base64_encode($password).'~'.md5('jsrob');//md5($password.'~erp~');
        $rs=$this->db->select('*')->from($this->_table)->where('userName',$userName)->where('password',$dbPassword)->where('status','1')->get()->result_array();
        //echo $this->db->last_query();die;
        return $rs;
    }
    
    function add($dataArr){
        $this->db->insert($this->_table,$dataArr);
        return $this->db->insert_id();
    }
    
    function is_user_name_exist($userName){
        return $this->db->from($this->_table)->where('userName',$userName)->get()->result();
    }
}