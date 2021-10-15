<?php  
// Log in EMAIL
if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $email=$_POST['email'];  
    $password=$_POST['password'];  
    $salt = "Garam";
    $password = md5($salt.$password);
    $host = "localhost";
    $dbEmail = "root";
    $dbPassword = "";
    $dbname = "garyforums";
    $con = mysqli_connect($host, $dbEmail, $dbPassword, $dbname);

    if (!$con){
      die(mysqli_error($con));
    }
    
    mysqli_select_db($con,'garyforums') or die("cannot select DB");  
    $query=mysqli_query($con,"SELECT * FROM garyforums WHERE email='".$email."' AND password='".$password."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))    
    {  
    $dbemail = $row['email'];  
    $dbpassword=$row['password'];  
    }  
   
    if ($email == 'tuminosun123@yahoo.com' && $password == md5($salt.'asdasdasd')){ // LOG IN Moderator
      $message = "Login Successful";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Home-Mods.html');
                </script>";     
    }

    if($email == $dbemail && $password == $dbpassword)  
    {  
    session_start();  
    $_SESSION['garyforums']=$email;  
  
    /* Redirect browser */  
    $message = "Login Successful";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Home-User.html');
                </script>";
                          
    }  
}
mysqli_select_db($con,'garyforums') or die("cannot select DB");  
$query=mysqli_query($con,"SELECT * FROM garyforums WHERE email='".$email."'");  
$numrows=mysqli_num_rows($query);  
if($numrows!=0){
  while($row=mysqli_fetch_assoc($query))    
{  
$dbemail=$row['email'];   
}  
if ($email == $dbemail){ 
    $message = "Invalid Password!";
              echo "<script type='text/javascript'>alert('$message');
              window.location.replace('Log-in-E.html');</script>";
    }
    
    }
    else{
      $message = "E-mail does not exist.";
              echo "<script type='text/javascript'>alert('$message');
              window.location.replace('Log-in-E.html');</script>";
  }
}
 else {  
  $message = "All field required!";
  echo "<script type='text/javascript'>alert('$message');
  window.location.replace('Log-in-E.html');
  </script>";
}  
?>  

