<?php
include('partials/header.php')
?>
    <div class="register_container">
        <div class="overlay">

        </div>
        <div class="titleDiv">
            <h1 class="title">Register</h1>
            <span class="subTitle">Thanks for choosing us</span>
        </div>
        <form action="" method="POST">
         <div class="rows grid">
            <!-- username -->
            <div class="row">
                <label for="username">Username</label>
                <input type="text" id="username" name="userName" placeholder="Enter userName" required>
            </div>
            <!-- Email -->
            <div class="row">
                <label for="username">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <!-- Phone  -->
            <div class="row">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your Phone Number" required>
            </div>
            <!-- Password -->
            <div class="row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <!-- Submit Button -->
            <div class="row">
                <input type="submit" id="submitBtn" name="submit" value="Create" required>
                
                <span class="registerLink">Have an account already?   <a href="index.php">Login</a></span>
            </div>
            
         </div>

            
        
        </form>
    </div>
<?php
include('partials/footer.php')
?>

<!-- let us register a new account -->
<?php
if(isset($_POST['submit'])){
    //variables
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];

    //state out uery
    $sql = "INSERT INTO admin SET usernames='$userName', email='$email',passwords='$password',phone='$phone'";

    //execute our sql querry
    $res= mysqli_query($conn,$sql);
    //check if the querry is executed
    if ($res==true){
        //message to show account crested successfully
        $_SESSION['accountCreated']='<span class="addedAccount" >Account '.$userName.' created!</span>';
        header('location' .SITEURL. 'index.php');
        exit();
    }
    else{
        //message to show that account failed to create
        $_SESSION['unSuccessful']='<span class="fail" >Account '.$userName.' failed!</span>';
        header('location' .SITEURL. 'register.php');
        exit();
    }
}
?>