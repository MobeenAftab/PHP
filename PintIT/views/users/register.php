<div class="panel panel-default">
  <div class="panel-body">
    <h3 class="panel-title">Create Account</h3>
  </div>
  <div class="panel-body">

    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="">
      </div>
      <input class="btm btn-primary" type="submit" name="submit" value="Submit">
    </form>
  </div>
</div>
