<?php

// Main controller
class Pages extends CI_Controller {
  // Default page view
  public function view ($page = 'home') {

    if (!file_exists(APPPATH. 'views/pages/'.$page.'.php')) {
      show_404();
    }

    // Catch any data passed into array
    $data['title'] = ucfirst($page);

    // Load pages in this order
    $this->load->view('inc/header');
    $this->load->view('pages/' . $page, $data);
    $this->load->view('inc/footer');
  }

}
?>
