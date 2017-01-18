<?php
class recipe_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_recipe($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('bdy_recipe');
            return $query->result_array();
        }
        $query = $this->db->get_where('bdy_recipe', array('recipe_id' => $id));
        return $query->row_array();
    }

    public function set_recipe() {
        $data = array(
            'name' => $this->input->post('name'),
            'comment' => $this->input->post('comment'),
            'category_id' => $this->input->post('category_id'),
            'nb_portion' => $this->input->post('nb_portion'),
            'preparation_time' => $this->input->post('preparation_time'),
            'waiting_time' => $this->input->post('waiting_time'),
            'average_score' => $this->input->post('average_score'),
            'source_recipe_id' => $this->input->post('source_recipe_id'),
            'source_recipe_id' => $this->input->post('source_recipe_id'),
            'creator_user_id' => $this->input->post('creator_user_id'),
        );

        return $this->db->insert('user', $data);
    }
}