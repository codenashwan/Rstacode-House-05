<?php require_once('includes/nav.php');in(1);?>

<div class="col-lg-8 col-sm bg-gradient-pink p-3 m-1 radius-20">
<?php
if(isset($_POST['submit'])){
$upload->userid = $session->userid;
$upload->title = $_POST['title'];
$upload->details = $_POST['details'];
$upload->price = $_POST['price'];
$upload->set_image($_FILES['file']);
if($upload->save() === true){
    redirect("owner_post.php");
}else{
echo "<div class='alert alert-white h2 text-center'> ". $upload->save()." </div>";
}
}
?>
    <form action="upload_post.php" class="radius-20 text-center p-3" method="POST" enctype="multipart/form-data">
        <img src="assets/img/upload.svg" width="150">
        <input type="text" name="title" placeholder="Title" class="form-control m-1">
        <textarea placeholder="Details" name="details" class="form-control m-1"></textarea>
        <input type="text" name="price" placeholder="Price 100.00 USD" class="form-control m-1">
        <input type="file" name="file" class="form-control m-1">
        <button name="submit" class="btn btn-danger w-100 m-1">Upload</button>
    </form>
</div>
</div>




<?php require_once('includes/footer.php');?>