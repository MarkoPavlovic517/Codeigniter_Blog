<?php
    class Posts extends CI_Controller {
      public function index($offset = 0){

       //Pagination config for posts

       $this->load->library('pagination');

       $config['base_url'] = base_url() . 'posts/index';
       $config['total_rows'] = $this->db->count_all('posts'); // All rows from posts table
       $config['per_page'] = 3; // Posts per page
       $config['uri_segment'] = 3; // exmple ci_blog/posts/(pagination page number)
       $config['attributes'] = array('class' => 'pagination-link'); // Add class to the links of pagination

       // Init pagination

       $this->pagination->initialize($config);

       // All posts

        $data['title'] = 'Latest Posts';

        $data['posts'] = $this->Post_model->get_posts(false, $config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
      }

      public function view($slug = NULL){
        $data['post'] = $this->Post_model->get_posts($slug);

        $id = $data['post']['category_id'];
        $data['category_name'] = $this->Category_model->get_category($id)->name;

        // Comments
        $post_id = $data['post']['id'];
        $data['comments'] = $this->Comment_model->get_comments($post_id);

        if(empty($data['post'])){
          show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view',$data);
        $this->load->view('templates/footer');
      }

      public function create(){

        //Check login
        if(!$this->session->userdata('logged_in')){
          redirect('users/login');
        }

        $data['title'] = 'Create Post';

        $data['categories'] = $this->Post_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
          $this->load->view('templates/header');
          $this->load->view('posts/create',$data);
          $this->load->view('templates/footer');
        }else{

          // Image upload
          $config['upload_path'] = './assets/images/posts';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_size'] = '8192';
          $config['max_width'] = '5000';
          $config['max_height'] = '5000';

          //Loading upload library

          $this->load->library('upload', $config);

          if(!$this->upload->do_upload()){
            $error = array('error' => $this->upload->display_errors());
            $post_image = 'noimage.png';
          }else{
            $data = array('upload_data' => $this->upload->data());
            $post_image = $_FILES['userfile']['name'];
          }

          $this->Post_model->create_post($post_image);

          //Set massage

          $this->session->set_flashdata('post_created', 'New post created!');

          redirect('posts');
        }

      }

        public function delete($id){

          //Check login
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }

          $this->Post_model->delete_post($id);

          $this->session->set_flashdata('post_deleted', 'Post has been deleted!');

          redirect('posts');
        }

        public function edit($slug){

          //Check login
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }

          $data['post'] = $this->Post_model->get_posts($slug);

          //Check user

          if($this->session->userdata('user_id') != $this->Post_model->get_posts($slug)['user_id']){
            redirect('posts');
          }

          $data['categories'] = $this->Post_model->get_categories();

          if(empty($data['post'])){
            show_404();
          }

          $data['title'] = 'Edit Post';

          $this->load->view('templates/header');
          $this->load->view('posts/edit',$data);
          $this->load->view('templates/footer');
        }

        public function update(){
          $this->Post_model->update_post();

          //Set massage

          $this->session->set_flashdata('post_updated', 'Post has been updated!');
          redirect('posts');
        }




    } // class end









 ?>
