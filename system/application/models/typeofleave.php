<?php
class Typeofleave extends Model {
    function get_all($type='object') {
        $this->db->order_by('id','ASC');
        $query = $this->db->get('type_of_leave');

        return $query->result($type);

    }

    function simpanType($type) {

        $data = array();


        $sql="insert into type_of_leave values('','$type[0]') ";

        $Q=$this->db->query($sql);

    }

    function editType($id = null) {
        $this->db->select('*');
        $this->db->from('type_of_leave');
        $this->db->where('id', $id);
        $this->db->limit('1');
        $query = $this->db->get();

        return $query->row();       
    }

    function updateType($id, $type) {

        $data = array();
        $sql="update type_of_leave set name = '$type[0]' where id= '$id' ";
        $Q=$this->db->query($sql);

    }

    function listofstatus(){
        return array(REJECTED=>REJECTED_LABEL,SUBMITTED=>SUBMITTED_LABEL,APPROVED=>APPROVED_LABEL,KEPT=>KEPT_LABEL);
    }
}
?>