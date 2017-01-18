<?php
class recipe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('recipe_model');
    }

    public function index() {
        $data['recipes'] = $this->recipe_model->get_recipe();
        $data['title'] = 'Les recettes';

        $this->load->view('templates/header', $data);
        $this->load->view('recipe/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL) {
        $data['recipe_item'] = $this->recipe_model->get_recipe($id);
        if (empty($data['recipe_item'])) {
            show_404();
        }

        $data['title'] = $data['recipe_item']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('recipe/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Créer une recette';

        $this->form_validation->set_rules('category_id', 'Catégorie', 'required');
        $this->form_validation->set_rules('name', 'Titre', 'required');
        $this->form_validation->set_rules('nb_portion', 'Nombre de portion', 'required');
        $this->form_validation->set_rules('preparation_time', 'Temps de préparation', 'required');
        $this->form_validation->set_rules('waiting_time', 'Temps d\'attente', 'required');
        $this->form_validation->set_rules('comment', 'Commentaire', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('recipe/create');
            $this->load->view('templates/footer');
        } else {
            $this->recipe_model->set_recipe();
            $this->load->view('recipe/success');
        }
    }
}