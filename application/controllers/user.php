<?php
class user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['users'] = $this->user_model->get_user();
        $data['title'] = 'Liste des utilisateurs';

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL) {
        $data['user_item'] = $this->user_model->get_user($id);
        if (empty($data['user_item'])) {
            show_404();
        }

        $data['title'] = $data['user_item']['username'];

        $this->load->view('templates/header', $data);
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Créer un utilisateur';

        $this->form_validation->set_rules('username', 'Utilisateur', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('firstname', 'Prénom', 'required');
        $this->form_validation->set_rules('lastname', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/create');
            $this->load->view('templates/footer');
        } else {
            $this->user_model->set_user();
            $this->load->view('user/success');
        }
    }
}