<?php require_once('includes/nav.php');in(2);?>

<?php
if(isset($_GET['delete'])){
$userid = $db->secure($_GET['delete']);
$getUser = User::get_by_id("`id` = $userid");
$deleted = $user->delete("`id` = '$userid'");
if($deleted){
redirect("view_all_user.php");
}else{
  redirect("view_all_user.php?NotFound");
}
}
?>


<div class="col-lg-8 col-sm bg-gradient-pink m-1 radius-20">
<div class="m-1 row justify-content-center">
<?php
$allpost = User::get_all(0);
foreach($allpost as $post){?>
<div class="card m-2 radius-20" style="width: 18rem;">
  <img src="assets/img/shop.svg" class="card-img-top radius-20" height="150px">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->username; ?></h5>
    <p class="card-text"><?php echo $post->email; ?></p>
    <p class="card-text"><?php if($post->rule == 1){echo "User";}else{echo "Admin";};?></p>
    <a href="?delete=<?php echo $post->id;?>" class="btn btn-danger">Delete</a>

  </div>
</div>
<?php } ?>
</div>
</div>
</div>



<?php require_once('includes/footer.php');?>
