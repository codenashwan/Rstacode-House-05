<?php 
require_once('includes/nav.php');
require_once('includes/login.php');
in(0);?>



<div class="mt-5">
    <div class="col-lg-4 col-sm text-center bg-gradient-pink shadow-lg p-3 radius-20 m-auto">
        <img src="assets/img/logo.svg" width="100">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="p-3">
            <input name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ""); ?>" type="text" class="form-control mt-2 radius-20 border-0" placeholder="Username">
            <input name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? ""); ?>" type="password" class="form-control mt-2 radius-20 border-0" placeholder="Password">
           <p class="text-white mt-2 mb-2"><?php echo isset($_POST['submit']) ? $errors['result'] : '';?> </p>
            <button name="submit" class="btn btn-instagram radius-20 mt-1 w-100">Login</button>
        </form>
    </div>
</div>

<?php require_once('includes/footer.php');?>