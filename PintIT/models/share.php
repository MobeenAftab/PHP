<?php

  class ShareModel extends Model {

    public function Index() {

      $this->query('SELECT * FROM shares ORDER BY create_date');
      $rows = $this->ResultSet();
      return  $rows;
    }

    public function Add () {

      // Sanitize POST
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if ($post['submit']) {
        // Execute mySQL
        $this->query('INSERT INTO shares (title, body, link, user_id)
        VALUES(:title, :body, :link, :user_id)');
        $this->bind((':title'), $post['title']);
        $this->bind((':body'), $post['body']);
        $this->bind((':link'), $post['link']);
        $this->bind((':user_id'), 1);
        $this->Execute();
        // Verify
        if ($this->LastInsertId()) {
          // Redirect
          header('Location: ' . ROOT_URL . 'shares');
        }
      }
      return;
    }

  }

?>
