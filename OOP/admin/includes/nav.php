<?php include 'init.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-white">

<?php if($session->get_logged_in()){?>
<nav class="navbar navbar-expand-lg navbar-light bg-gradient-pink m-3 radius-20">
  <a class="navbar-brand" href="#"><img src="assets/img/logo.svg" width="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto p-2">
    <?php if($session->rule == 2){echo '
        <li class="nav-item m-1">
        <a class="nav-link btn btn-github text-white" href="index.php">Welcome Admin</a>
      </li>
        ';}?>
      <li class="nav-item m-1">
        <a class="nav-link btn btn-white" href="index.php">HOME</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
      <a href="?logout" class="btn btn-danger w-100">LOGOUT</a>
</div>
  </div>
</nav>




<div class="row m-5 justify-content-center">
<div class="col-lg-3 col-sm m-1 bg-gradient-pink p-4 radius-20">
<ul class="list-group list-group-flush">
  <li class="list-group-item m-2 radius-20"><a href="upload_post.php">UPLOAD YOUR POST</a></li>
  <li class="list-group-item m-2 radius-20"><a href="owner_post.php">VIEW YOUR POST</a></li>
  <?php if($session->rule == 2){?>
    <li class="list-group-item m-2 radius-20"><a href="allpost.php">VIEW ALL POST</a></li>
  <li class="list-group-item m-2 radius-20"><a href="adduser.php">ADD USER</a></li>
  <li class="list-group-item m-2 radius-20"><a href="view_all_user.php">VIEW USER</a></li>
  <?php }?>
</ul>
</div>


<?php }?>


