<?php
class Users extends CI_Controller{
    public function register(){
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $data['post_data'] = $this->input->post();
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        }
        else{
            // Encrypt password
            $enc_password = md5($this->input->post('password'));
            $data = array(
                'name'      => $this->input->post('name'),
                'zipcode'   => $this->input->post('zipcode'),
                'email'     => $this->input->post('email'),
                'username'  => $this->input->post('username'),
                'password'  => $enc_password,
            );

            $this->user_model->register_user($data);
            // set message
            $this->session->set_flashdata('user_registered', 'You are now registered');
            redirect('posts');
        }
    }

    public function login(){
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $data['post_data'] = $this->input->post();
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        }
        else{
            $password = md5($this->input->post('password'));
            $username = $this->input->post('username');

            $user_id = $this->user_model->login($username, $password);

            if($user_id){
                //create session
                $user_data = array(
                    'user_id'  => $user_id,
                    'username' => $user_name,
                    'logged_in'    => true
                );
                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('user_loggedin', 'You are now logged_in');
                redirect('posts');

            } else{
                $this->session->set_flashdata('login_failed', 'Invalid username and password');
                redirect('users/login');
            }
        }
    }

    public function logout(){
        //destroy session
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('user_logged_out', 'You are now logged out');
        redirect('users/login');
    }

    // check if username exist
    function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists', 'This username is taken. Please choose a different one');
        if($this->user_model->check_username_exists($username)){
            return true;
        }
        else{
            return false;
        }
    }
    //check if email exist
    function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'This email is taken. Please choose a different one');
        if($this->user_model->check_email_exists($email)){
            return true;
        }
        else{
            return false;
        }
    }
}