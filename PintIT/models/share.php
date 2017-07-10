<?php

  class ShareModel extends Model {

    public function Index() {
      $this->query('SELECT * FROM shares');
      $rows = $this->ResultSet();
      return  $rows;
    }

  }

?>
