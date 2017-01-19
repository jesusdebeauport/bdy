<?php
session_start(); //we need to start session in order to access it through CI

class user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        //$this->load->model('login_database');
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

    public function login() {
        $this->load->view('templates/header');
        $this->load->view('user/login');
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

    // Validate and store registration data in database
    public function new_user_registration() {

        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastname', 'Nom', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        } else {
            $data = array(
                'user_name' => $this->input->post('username'),
                'user_password' => $this->input->post('password'),
                'user_email' => $this->input->post('email_value'),
                'user_firstname' => $this->input->post('firstname'),
                'user_lastname' => $this->input->post('lastname')
            );
            $result = $this->login_database->registration_insert($data);
            if ($result == TRUE) {
                $data['message_display'] = 'Enregistrement Réussi!';
                $this->load->view('login_form', $data);
            } else {
                $data['message_display'] = 'Le nom d\'utilisateur est déjà utilisé.';
                $this->load->view('registration_form', $data);
            }
        }
    }

    // Check for user login process
    public function user_login_process() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('admin_page');
            }else{
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('admin_page');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_form', $data);
            }
        }
    }

    // Logout from admin page
    public function logout() {

        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login_form', $data);
    }
}