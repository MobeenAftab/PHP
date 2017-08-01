<?php

class Posts extends CI_Controller {

  public function index () {

    $data['title'] = 'Latest Posts';
    $data['posts'] = $this->post_model->GetPost();

    $this->load->view('inc/header');
    $this->load->view('posts/index', $data);
    $this->load->view('inc/footer');
  }

  public function view($slug = NULL) {

    $data['post'] = $this->post_model->GetPost($slug);

    if(empty($data['post'])) {
      show_404();
    }

    $data['title'] = $data['post']['title'];

    $this->load->view('inc/header');
    $this->load->view('posts/view', $data);
    $this->load->view('inc/footer');
  }
}
