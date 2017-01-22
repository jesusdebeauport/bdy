<?php

class user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form','html');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index() {
        if ($this->session->userdata('login')) {
            redirect('/');
        } else {
            $this->show_login(false);
        }
    }

    public function view() {
        if (!$this->session->userdata('login')) {
            redirect("user/login");
        }
        $user_id = $this->session->userdata('user_id');
        $data['user_item'] = $this->user_model->get_user_by_id($user_id);


        $data['title'] = $data['user_item']['username'];

        $this->load->view('templates/header');
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer');
    }

    public function login() {
        //If already logged in, redirect to user/view
        if ($this->session->userdata('login')) {
            redirect("user/view");
        }

        // get form input
        $username = strtolower($this->input->post("username"));
        $password = $this->input->post("password");

        // form validation
        $this->form_validation->set_rules("username", "Username", "trim|required|max_length[30]");
        $this->form_validation->set_rules("password", "Password", "trim|required|max_length[30]");

        if ($this->form_validation->run() == FALSE) {
            // validation fail
            $this->load->view('templates/header');
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        } else {
            // check for user credentials
            $uresult = $this->user_model->login($username, md5($password));
            if (count($uresult) > 0) {
                // set session
                $sess_data = array('login' => TRUE, 'username' => $uresult['username'], 'user_id' => $uresult['user_id']);
                $this->session->set_userdata($sess_data);
                $this->session->set_flashdata('success_msg', 'Connexion réussie.');
                redirect("pages/view");
            } else {
                $this->session->set_flashdata('error_msg', 'Mauvais nom d\'utilisateur ou mot de passe!');
                redirect('user/login');
            }
        }
    }

    public function signup() {
        //If already logged in, redirect to user/login
        if ($this->session->userdata('login')) {
            $this->session->set_flashdata('error_msg', 'Vous devez vous déconnecter pour pouvoir un nouveau compte.');
            redirect("user/login");
        }

        $data['title'] = 'Créer un utilisateur';
        $this->form_validation->set_rules('username', 'Utilisateur', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');
        $this->form_validation->set_rules('password-confirm', 'Confirmez le mot de passe', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Nom', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/signup', $data);
            $this->load->view('templates/footer');
        } else {
            $postData['username'] = strtolower($this->input->post("username"));
            $postData['password'] = md5($this->input->post("password"));
            $postData['email'] = $this->input->post("email");
            $postData['firstname'] = $this->input->post("firstname");
            $postData['lastname'] = $this->input->post("lastname");

            $uresult = $this->user_model->signup($postData);
            if ($uresult > 0) {
                // set session
                $sess_data = array('login' => TRUE, 'username' => $postData['username'], 'user_id' => $uresult);
                $this->session->set_userdata($sess_data);
                $this->session->set_flashdata('success_msg', 'Création de l\'utilisateur réussie.');
                redirect("user/view");
            } else {
                $this->session->set_flashdata('error_msg', 'Une erreur est survenue lors de la d\'utilisateur.');
                redirect('user/signup');
            }
        }
    }

    // Logout from admin page
    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success_msg', 'Déconnexion réussie.');
        redirect("pages/view");

    }
}