<?php
class User_Model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function register($enc_password){
    // User data array
    $data = array(
            'name'      => $this->input->post('name'),
            'email'     => $this->input->post('email'),
            'username'  => $this->input->post('username'),
            'password'  => $enc_password,
            'zipcode'   => $this->input->post('zipcode')
    );

    // Insert new User into database
    return $this->db->insert('users', $data);
  }

  //Log in User
  public function login($username, $password){
    //Validate Username and Password
    $this->db->where('username', $username);
    $this->db->where('password', $password);

    $result = $this->db->get('users');

    if($result->num_rows() == 1){
      return $result->row(0)->id;
    }else{
      return false;
    }
  }

  // Checking if Username already exists in the Database
  public function check_username_exists($username){
    $query = $this->db->get_where('users', array('username' => $username));
    if(empty($query->row_array())){
      return true;
    }else{
      return false;
    }
  }

 // Checking if Email is taken

 public function check_email_exists($email){
   $query = $this->db->get_where('users', array('email' => $email));
   if(empty($query->row_array())){
     return true;
   }else{
     return false;
   }
 }


} // class end




 ?>
