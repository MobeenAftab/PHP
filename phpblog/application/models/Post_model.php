<?php

  class Post_model extends CI_Model {

    public function __construct() {
      $this->load->database();
    }

    // Get posts from DB

    public function GetPost($slug = FALSE) {

      if ($slug === FALSE) {
        $query = $this->db->get('posts');
        return $query->result_array();
      }

      $query = $this->db->get_where('posts', array('slug' => $slug));
      return $query->row_array();
    }
  }
