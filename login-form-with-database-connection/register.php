<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From users where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

/*if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }*/
   
   
   
                       if(isset($_POST['signIn'])){
                         include "connect.php"; // db configuration
                         $username = mysqli_real_escape_string($conn, $_POST['email']);
                         $password  = mysqli_real_escape_string($conn, $_POST['password']);
   
                         $sql = "SELECT * FROM users WHERE email = '{$username}' AND password = '{$password}'";
                         $result = mysqli_query($conn, $sql);
   
                         if(mysqli_num_rows($result) > 0){
                           session_start(); //session start
                           while($row = mysqli_fetch_assoc($result)){
                             $_SESSION["email"] = $row['email'];
                             //$_SESSION["user_id"] = $row['id'];
                           }
                          // header("$base_url/dashboard.php"); // redirect
                         }else{
                             echo "<div class='alert alert-danger'>Username and Password are not matched.</div>";
                         }
                       
                   
   
   
   
   
   
   
   
   
   
   

}
?>