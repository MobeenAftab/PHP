<div class="panel panel-default">
  <div class="panel-body">
    <h3 class="panel-title">Pin IT</h3>
  </div>
  <div class="panel-body">

    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="">
      </div>
      <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Link</label>
        <input type="text" name="link" value="">
      </div>
      <input class="btm btn-primary" type="submit" name="submit" value="Submit">
      <a class="btn btn-danger" href="<?php ROOT_PATH;?>shares">Cancel</a>
    </form>
  </div>
</div>
