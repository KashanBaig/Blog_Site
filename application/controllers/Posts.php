<?php
    class Posts extends CI_Controller{
        public function __construct(){
            parent::__construct(); 
        }
        public function index($offset = 0){
            //Pagination
            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            
            // Produces: class="myclass"
            $config['attributes'] = array('class' => 'pagination-link');

            //Init Pagination
            $this->pagination->initialize($config);

            $data['title'] = 'Latest Posts';
            $data['posts'] = $this->post_model->get_posts($config['per_page'], $offset);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function postView($slug){
            $data['post'] = $this->post_model->get_post($slug);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);
        
            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
        public function create(){
            //check if user login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create Post';
            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                $data['post_data'] = $this->input->post();
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }
            else{
                $slug = url_title($this->input->post('title'));
                
                // Upload Image
				$config['upload_path'] = './public/assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
                $config['max_height'] = '2000';
                
                $this->load->library('upload', $config);
                
				if(!$this->upload->do_upload()){
                    
					$errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                } 
                else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

                $data = array(
                    'title'        =>  $this->input->post('title'),
                    'slug'         =>  $slug,
                    'body'         =>  $this->input->post('body'),
                    'category_id'  =>  $this->input->post('category_id'),
                    'user_id'      =>  $this->session->userdata('user_id'),
                    'post_image'   =>  $post_image
                );
                
                $this->post_model->create_post($data);
                // set message
                $this->session->set_flashdata('post_created', 'Post has been Created');
                redirect('posts');
            }
        }
        public function delete($id){
            //check if user login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $this->post_model->delete_post($id);
            // set message
            $this->session->set_flashdata('post_deleted', 'Post has been Deleted');
            redirect('posts');
        }

        public function edit($slug){
            //check if user login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['post'] = $this->post_model->get_post($slug);

            if($this->session->userdata('user_id') != $this->post_model->get_post($slug)['user_id']){
                redirect('posts');
            }
            $data['categories'] = $this->post_model->get_categories();
            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = 'Edit Post';

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }
        public function update(){
            //check if user login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id'  =>  $this->input->post('category_id')
            );
            $this->post_model->update_post($data);
            // set message
            $this->session->set_flashdata('post_updated', 'Post has been Updated');
            redirect('posts');
        }
    }