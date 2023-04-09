<?php
include('partials/header.php')
?>
     <?php
     if(isset( $_SESSION['accountCreated'])){
        echo  $_SESSION['accountCreated'];
        unset( $_SESSION['accountCreated']);
     }
     ?>
    <div class="form_container">
        <div class="overlay">

        </div>
        <div class="titleDiv">
            <h1 class="title">Login</h1>
            <span class="subTitle">Welcome back!</span>
        </div>
        <?php

        if(isset($_SESSION['noAdmin'])){
            echo $_SESSION['noAdmin'];
            unset($_SESSION['noAdmin']);
        }
        ?>
        <!-- form section -->
        <form action="" method="POST">
            <!-- username -->
         <div class="rows grid">
            <div class="row">
                <label for="username">Username</label>
                <input type="text" id="username" name="userName" placeholder="Enter userName" required>
            </div>
            <!-- Password -->
            <div class="row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <!-- Submit Button -->
            <div class="row">
                <input type="submit" id="submitBtn" name="submit" value="Login" required>
                
                <span class="registerLink">Don't have an account?   <a href="register.php">Register</a></span>
            </div>
            
         </div>

            
        
        </form>
    </div>
<?php
include('partials/footer.php')
?>

<!-- let login to the database -->
<?php
if(isset($_POST['submit'])){
    // echo 'Yes data submitted'
    // let us create variable to store username and password
    $userName=$_POST['userName'];
    $passWord=$_POST['password'];

    //sql to select if there's the detail in the database
    $sql= "SELECT * FROM admin WHERE usernames='$userName' AND passwords='$passWord'";
    // execute the query
    $result= mysqli_query($conn,$sql);
    // count the number of the account with the same username and password
    $count= mysqli_num_rows($result);
    // put the count result into one associate array
    $row= mysqli_fetch_assoc($result);
    // check if there is at least one account in the database
if($count ==1){
        $_SESSION['loginMessage']='<span class="success">Welcome '.$userName.'</span>';
        header('location:' .SITEURL. 'dashboard.php');
        exit();
}
else{
    $_SESSION['noAdmin']='<span class="fail">'.$userName.' is not registered! </span>';
        header('location:' .SITEURL. 'index.php');
        exit();
}
}


?>