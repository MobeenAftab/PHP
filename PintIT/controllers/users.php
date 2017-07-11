<?php

  class Users extends Controller {

    protected function Register() {

      $viewModel = new UserModel();
      $this->ReturnView($viewModel->Register(), true);
    }
  }

 ?>
