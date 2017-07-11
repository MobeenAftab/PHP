<?php

  class Shares extends Controller {

    protected function Index () {

      $viewModel = new ShareModel();
      $this->ReturnView($viewModel->Index(), true);
    }

    protected function Add () {

      $viewModel = new ShareModel();
      $this->ReturnView($viewModel->Add(), true);
    }

  }

 ?>
