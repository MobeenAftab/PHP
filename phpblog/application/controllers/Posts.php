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

  public function create() {
    $data['title'] = 'Create Post';

    // Rules for validation_errors
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('inc/header');
      $this->load->view('posts/create', $data);
      $this->load->view('inc/footer');
    } else {
      $this->post_model->CreatePost();
      redirect('posts');
    }
  }

  public function Delete($id) {
    $this->post_model->DeletePost($id);
    redirect('posts');
  }

  public function Edit($slug) {
    $data['post'] = $this->post_model->GetPost($slug);

    if(empty($data['post'])) {
      show_404();
    }

    $data['title'] = 'Edit Post';

    $this->load->view('inc/header');
    $this->load->view('posts/edit', $data);
    $this->load->view('inc/footer');
  }

  public function Update() {
    $this->post_model->UpdatePost();
    redirect('posts');
  }
}
