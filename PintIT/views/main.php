<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pin IT</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <<link rel="stylesheet" href="./assets/css/style.css"></link>

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href=" <?php echo ROOT_URL; ?>">Home</a></li>
            <li><a href=" <?php echo ROOT_URL; ?>shares">Pin IT</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href=" <?php echo ROOT_URL; ?>users/login">Log In</a></li>
            <li><a href=" <?php echo ROOT_URL; ?>users/register">Register</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      <div class="row">
        <?php require($view); ?>
      </div>
    </div>

  </body>
</html>
