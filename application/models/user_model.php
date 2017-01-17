<?php
class user_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_user($name = FALSE) {
        if ($name === FALSE) {
            $query = $this->db->get('bdy_user');
            return $query->result_array();
        }

        $query = $this->db->get_where('bdy_user', array('name' => $name));
        return $query->row_array();
    }

    public function set_user() {
        $this->load->helper('url');

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );

        return $this->db->insert('user', $data);
    }
}