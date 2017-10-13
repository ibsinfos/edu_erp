<?php
class Sc_student_model extends CI_Model {
    private $_table='sc_student';
    private $_table_user='sc_user';
    //private $_table_user='sc_';
    
    function __construct() {
        parent::__construct();
    }
    
    function get_students_list_for_principal(){
        $this->db->select('u.communicationEmail,u.fName,u.phoneNumber,u.userType');
        $this->db->from($this->_table." AS s")->join($this->_table_user." AS u",'s.userId=u.userId','left');
        $rs=$this->db->get()->result_array();
        //echo $this->db->last_query();
        return $rs;
    }
}
