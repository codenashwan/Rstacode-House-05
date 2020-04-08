<?php require_once('includes/nav.php');in(1);?>

<?php
if(isset($_GET['delete'])){
$post_id = $db->secure($_GET['delete']);
$getPhoto = Upload::get_by_id("`post_id` = $post_id");
unlink("../upload/$getPhoto->fileName");
$deleted = $upload->delete("`post_id` = '$post_id' AND `userid` = '$session->userid'");
if($deleted){
redirect("owner_post.php");
}else{
  redirect("owner_post.php?NotFound");
}
}
?>

<div class="col-lg-8 col-sm bg-gradient-pink m-1 radius-20">
<div class="m-1 row justify-content-center">
<?php
$allpost = Upload::get_all("`userid` = $session->userid ");
foreach($allpost as $post){?>
<div class="card m-2 radius-20" style="width: 18rem;">
  <img src="../upload/<?php echo $post->fileName; ?>" class="card-img-top radius-20" height="200px">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->title; ?></h5>
    <p class="card-text"><?php echo $post->details; ?></p>
    <span class="btn btn-white" style="position: absolute;right: 0;top: 0;margin-top: 63%;"><?php echo $post->price; ?></span>
    <a href="#" class="btn btn-white bg-pink">View Home</a>
    <a href="?delete=<?php echo $post->post_id;?>" class="btn btn-danger">Delete</a>
  </div>
</div>
<?php } ?>
</div>
</div>
</div>



<?php require_once('includes/footer.php');?>
