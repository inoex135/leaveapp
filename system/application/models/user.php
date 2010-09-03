<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class User extends Model {
    function validate($username, $password) {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM users where username='$username' and password = '$password'");

        return $query->row_array();
    }

    function get_all() {
        $this->db->select('a.*,b.username as parent_username');
        $this->db->order_by('a.id','ASC');
        $this->db->from('users as a');
        $this->db->join('users as b','a.parent_id = b.id','left');
        $query = $this->db->get();

        return $query->result();

    }

    function simpanUser($user) {
        $this->db->insert('users',$user);
    }

    function get($id = null) {
        $this->db->select('*');
        $this->db->from('users a');
        $this->db->where('id', $id);
        $this->db->limit('1');
        $query = $this->db->get();

        return $query->row();
    }

    function updateUser($id, $data) {
        $this->db->update('users',$data,"id = $id");;
        //$sql="update users set username = '$type[0]', password= '$type[1]', email='$type[2]', role='$type[3]' where id= '$id' ";
        //$Q=$this->db->query($sql);

    }

    function getParent($role) {
        $sql = "SELECT id,username from users where role = '$role'";
        $query = $this->db->query($sql);
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[$row->id] = $row->username;
        }
        return $arr;
    }
}
?>
