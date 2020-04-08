<?php require_once('includes/nav.php');?>

<div class="p-2" style="background:url(upload/1.jpg);background-size:cover">
<div class=" mt-3">
<div class="jumbotron blur m-2 bg-primary text-center radius-10">
  <span class="h3 radius-20 p-2 text-white ">بەخێربێیت بۆ هەسارەکەمان</span>
  <p class="lead mt-3 text-white">کار دەکات لە پێناو گەشەپێدان و پێش خستنی کڕین و فرۆشتن بە شێوازی ئۆنلاین</p>
  <a href="login.php" class="btn blur text-white">کاڵاکەت دابنێ</a>
  </div>
</div>
</div>


<h1 class="mt-5 p-2 text-primary">NEW HOUSE</h1>
<div class="bg-lighter">
<div class="m-1 row justify-content-center">
<?php
$allpost = Upload::get_all(0);
foreach($allpost as $post){?>
<div class="card m-2 radius-20" style="width: 18rem;">
  <img src="upload/<?php echo $post->fileName; ?>" class="card-img-top radius-20" height="200px">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->title; ?></h5>
    <p class="card-text"><?php echo $post->details; ?></p>
    <span class="btn btn-white" style="position: absolute;right: 0;top: 0;margin-top: 63%;"><?php echo $post->price; ?></span>
    <a href="#" class="btn btn-primary">View Home</a>
  </div>
</div>
<?php } ?>
</div>
</div>
</div>



<?php require_once('includes/footer.php');?>

