<?php

//include config settings
require('config.php');

//Classes includes
require ('lib/Bootstrap.php');
require ('lib/Controller.php');
require ('lib/Model.php');

//include Controllers
require ('controllers/home.php');
require ('controllers/shares.php');
require ('controllers/users.php');

//include Models
require ('models/home.php');
require ('models/share.php');
require ('models/user.php');


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->CreateController();
if($controller){
	$controller->ExecuteAction();
}
?>
