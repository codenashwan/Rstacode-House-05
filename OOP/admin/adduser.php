<?php require_once('includes/nav.php');in(2);?>
<div class="col-lg-8 col-sm bg-gradient-pink m-1 radius-20">
<?php
if(isset($_POST['submit'])){
$user->username = $_POST['username'];
$user->email = $_POST['email'];
$user->password = hash('gost',$_POST['password']);
$user->rule = $_POST['rule'];
if($user->create() === true){
    redirect("alluser.php");
}else{
echo "<div class='alert alert-white h2 text-center'> ". $user->create()." </div>";
}
}
?>
<form action="adduser.php" class="radius-20 text-center p-3" method="POST" enctype="multipart/form-data">
        <img src="assets/img/shop.svg" width="150">
        <input type="text" name="username" placeholder="Username" class="form-control m-1">
        <input type="text" name="email" placeholder="Email" class="form-control m-1">
        <input type="password" name="password" placeholder="Password" class="form-control m-1">
        <select name="rule" class="form-control m-1">
        <option value="1">User</option>
        <option value="2">Admin</option>
        </select>
        <button name="submit" class="btn btn-danger w-100 m-1">Create New Account</button>
    </form>
</div>

</div>



<?php require_once('includes/footer.php');?>
