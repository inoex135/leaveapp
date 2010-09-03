<?php
class Leave_model extends Model {

    var $id   = '';
    var $user_id   = '';
    var $start_date   = '';
    var $end_date   = '';
    var $type_of_leave_id   = '';
    var $purpose   = '';
    var $status   = '';
    var $submit_time   = '';
    var $recommend_time   = '';
    var $approve_time   = '';
    var $keep_time   = '';
    var $recommendation   = '';
    var $manager_note   = '';

    var $tablename = 'leaves';
    var $usertablename = 'users';
    var $leavetypetablename = 'type_of_leave';

//    function Leave_model() {
//        // Call the Model constructor
//        parent::Model();
//    }

//    function get($limit=null,$offset=null) {
//        $query = $this->db->get($tablename, $limit, $offset);
//        return $query->result();
//    }

    function get($id) {
        $sql = "select u.username,t.name,l.start_date,l.end_date,l.purpose,l.status,l.submit_time,l.recommend_time,l.approve_time,l.keep_time,l.recommendation,l.manager_note from (
                select id,username from ".$this->usertablename."
                ) as u inner join (
                select user_id,type_of_leave_id,start_date,end_date,purpose,status,submit_time,recommend_time,approve_time,keep_time,recommendation,manager_note from ".$this->tablename."
                where id=$id
                ) as l on l.user_id=u.id inner join (
                select id, name from ".$this->leavetypetablename."
                ) as t on l.type_of_leave_id=t.id";
        $query = $this->db->query($sql);
        return $query->result('array');
    }

    function getObject($id) {
        $query = $this->db->get_where($this->tablename,array('id'=>$id));
        return $query->first_row();
    }

    function listStaff($userid, $username,$limit=null,$offset=null) {
        $sql = "select l.id,'$username' as username,t.name,l.start_date,l.end_date,l.purpose,l.status,l.submit_time,l.recommend_time,l.approve_time,l.keep_time,l.recommendation,l.manager_note from (
                select * from ".$this->tablename." where user_id=$userid
                ) as l inner join (
                select id, name from ".$this->leavetypetablename."
                ) as t on l.type_of_leave_id=t.id order by submit_time desc";
        $query = $this->db->query($sql);
        return $query->result('array');
    }

    function listManager($userid,$limit=null,$offset=null) {
        $sql = "select l.id,u.username,t.name,l.start_date,l.end_date,l.purpose,l.status,l.submit_time,l.recommend_time,l.approve_time,l.keep_time,l.recommendation,l.manager_note from (
                select id,username from ".$this->usertablename." where parent_id in (select id from ".$this->usertablename." where parent_id=$userid)
                ) as u inner join ".$this->tablename." as l
                on l.user_id=u.id inner join (
                select id, name from ".$this->leavetypetablename."
                ) as t on l.type_of_leave_id=t.id order by submit_time desc";
        $query = $this->db->query($sql);
        return $query->result('array');
    }

    function listAll($limit=null,$offset=null, $where='') {
        $sql = "select l.id,u.username,t.name,l.start_date,l.end_date,l.purpose,l.status,l.submit_time,l.recommend_time,l.approve_time,l.keep_time,l.recommendation,l.manager_note from (
                select id,username from ".$this->usertablename." $where
                ) as u inner join ".$this->tablename." as l
                on l.user_id=u.id inner join (
                select id, name from ".$this->leavetypetablename."
                ) as t on l.type_of_leave_id=t.id order by submit_time desc";
        $query = $this->db->query($sql);
        return $query->result('array');
    }

    function add($data) {
        $this->db->insert($this->tablename, $data);
    }

    function recommend($leave) {
        $leave->recommend_time = date('Y-m-d H:i:s');
        $this->db->update($this->tablename, $leave, array('id' => $leave->id));
    }

    function approve($leave) {
        $leave->status = APPROVED;
        $leave->approve_time = date('Y-m-d H:i:s');
        $this->db->update($this->tablename, $leave, array('id' => $leave->id));
    }

    function reject($leave) {
        $leave->status = REJECTED;
//        $leave->approve_time = date('Y-m-d H:i:s');
        $this->db->update($this->tablename, $leave, array('id' => $leave->id));
    }

    function keep($leave) {
        $leave->status = KEPT;
        $leave->keep_time = date('Y-m-d H:i:s');
        $this->db->update($this->tablename, $leave, array('id' => $leave->id));
    }

    function getStatusString($status) {
        if($status == SUBMITTED) return SUBMITTED_LABEL;
        else if($status == APPROVED) return APPROVED_LABEL;
        else if($status == KEPT) return KEPT_LABEL;
        else if($status == REJECTED) return REJECTED_LABEL;
        else return null;
    }

    function update($data){
        $this->db->update('leaves',$data,"id = ".$data['id']);
    }
}

?>
