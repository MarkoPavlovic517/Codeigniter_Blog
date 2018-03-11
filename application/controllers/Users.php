<?php
class Users extends CI_Controller{

  public function register(){

    $data['title'] = 'Sign Up';

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
    $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('users/register', $data);
      $this->load->view('templates/footer');
    }else{
      $enc_password = md5($this->input->post('password'));

      $this->User_model->register($enc_password);
      // Set massage
      $this->session->set_flashdata('user_registered', 'You are now registered and you can login');
      redirect('posts');
    }
  }
 // Login User
  public function login(){

    $data['title'] = 'Sign In';


    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');


    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('users/login', $data);
      $this->load->view('templates/footer');
    }else{

      //Get Username
      $username = $this->input->post('username');
      //Get and encrypt password
      $password = md5($this->input->post('password'));

      //Login user
      $user_id = $this->User_model->login($username, $password);

      if($user_id){
        //Create session
        $user_data = array(
                    'user_id'   => $user_id,
                    'username'  => $username,
                    'logged_in' => true
        );

        $this->session->set_userdata($user_data);

        //Set massage
        $this->session->set_flashdata('user_logged_in', 'You are now Logged In.');
        redirect('posts');
      }else{
        // Set massage
      $this->session->set_flashdata('login_failed', 'Login failed. Something went wrong');
      redirect('users/login');
    }
  }
}

    //Logout user
    public function logout(){
      //Unset user data
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');

      // Set massage
    $this->session->set_flashdata('user_logged_out', 'You are now logged out');
    redirect('users/login');

    }

  // Check if username exists

   public function check_username_exists($username){
     $this->form_validation->set_message('check_username_exists', 'That username is taken. Please, chose another Username.');

     if($this->User_model->check_username_exists($username)){
       return true;
     }else{
       return false;
     }
   }

   // Check if email is taken

   public function check_email_exists($email){
     $this->form_validation->set_message('check_email_exists', 'That email is taken. Please, chose another Email.');

     if($this->User_model->check_email_exists($email)){
       return true;
     }else{
       return false;
     }
   }


} // Class end






 ?>
