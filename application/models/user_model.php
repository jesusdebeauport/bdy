<?php
class user_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_user_by_id($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('bdy_user');
            return $query->result_array();
        }

        $query = $this->db->get_where('bdy_user', array('user_id' => $id));
        return $query->row_array();
    }

    public function set_user($id, $data) {
        $data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname']
        );

        $this->db->where('user_id', $id);
        return $this->db->update('bdy_user', $data);
    }

    public function login($username, $password) {
        $query = $this->db->get_where('bdy_user', array('username' => $username,
            'password' => $password));

        return $query->row_array();
    }

    public function signup($data) {
        $this->db->insert('bdy_user', $data);
        return $this->db->insert_id();
    }
}