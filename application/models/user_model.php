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

    public function get_user_login($username, $password) {
        $query = $this->db->get_where('bdy_user', array('username' => $username,
                                                        'password' => md5($password)));

        return $query->row_array();
    }

    public function set_user() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );

        return $this->db->insert('bdy_user', $data);
    }

    public function insert_user($data) {
        return $this->db->insert('bdy_user', $data);
    }
}