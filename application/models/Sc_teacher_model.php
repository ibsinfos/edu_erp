<?php
class Sc_teacher_model extends CI_Model {
    private $_table='sc_teacher';
    private $_table_user='sc_user';
    public $_table_teacher_structure_text=array(
        'DOB'=>array('type'=>'date','class'=>'datepicker','required'=>'required','label'=>'Date of birth'),
        'DOJ'=>array('type'=>'date','class'=>'datepicker','required'=>'required','label'=>'Date of Join'),
        'qualification'=>array('type'=>'text','required'=>'required','label'=>'Qualification'),
        'specialisation'=>array('type'=>'text','required'=>'required','label'=>'Specialisation'),
        'experience'=>array('type'=>'text','required'=>'required','label'=>'Experience'),
        'address'=>array('type'=>'text','required'=>'required','label'=>'Address'),
        'zipCode'=>array('type'=>'text','required'=>'required','label'=>'Zip Code'),
        'homePhone'=>array('type'=>'text','required'=>'required','label'=>'Home Phone'),
        'cardId'=>array('type'=>'text','required'=>'required','label'=>'Card Id')
    );
    
    public $_table_user_structure_text=array(
        'userName'=>array('type'=>'email','required'=>'required','is_unique'=>'sc_user.userName','label'=>'User Name','jsEventAction'=>'onblur="$(\'#communicationEmail\').val($(this).val());"'),
        'communicationEmail'=>array('type'=>'email','required'=>'required','label'=>'Communication Email'),
        'fName'=>array('type'=>'text','required'=>'required','label'=>'First Name'),
        'mName'=>array('type'=>'text','label'=>'Middle Name'),
        'lName'=>array('type'=>'text','required'=>'required','label'=>'Last Name'),
        'phoneNumber'=>array('type'=>'tel','required'=>'required','label'=>'Phone Number'),
    );
            
    function __construct() {
        parent::__construct();
        
    }
    
    function get_teachers_list_for_principal(){
        return array();
    }
    
    function add($dataArr){
        $this->db->insert($this->_table,$dataArr);
        return $this->db->insert_id();
    }
}