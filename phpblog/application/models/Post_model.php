<?php

  class Post_model extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    // Get posts from DB
    public function GetPost($slug = FALSE) {
      if ($slug === FALSE) {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result_array();
      }

      $query = $this->db->get_where('posts', array('slug' => $slug));
      return $query->row_array();
    }

    public function CreatePost() {
      $slug = url_title($this->input->post('title'));

      $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'body' => $this->input->post('body')
      );
      return $this->db->insert('posts', $data);
    }

    public function DeletePost($id) {
      $this->db->where('id', $id);
      $this->db->delete('posts');
      return true;
    }

    public function UpdatePost() {
      $slug = url_title($this->input->post('title'));

      $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'body' => $this->input->post('body')
      );
      $this->db->where('id', $this->input->post('id'));
      return $this->db->update('posts', $data);
    }
  }
