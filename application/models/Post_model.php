<?php
    class Post_model extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function get_posts($limit = FALSE, $offset = FALSE){
            if($limit){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        public function get_post($slug){
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post($data){
            $this->db->insert('posts', $data);
            return true;
        }

        public function delete_post($id){
            $image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
            $cwd = getcwd(); //save the current working directory
            $image_file_path = $cwd. "\\public\\assets\\images\\posts\\";
            chdir($image_file_path);
            unlink($image_file_path);
            chdir($cwd); // Restore the previous working directory
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
        public function update_post($data){
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        public function get_posts_by_category($category_id){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('category_id' => $category_id));
            return $query->result_array();
        }
    }
