<?php
class Sc_country_model extends CI_Model {
    private $_table='Sc_country';
    
    function __construct() {
        parent::__construct();   
    }
    
    function get_list(){
        $rs= $this->db->select('locationId,name')->where('locationType','0')->get($this->_table)->result_array();
        return $rs;
    }
}

