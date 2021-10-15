<?php  
// LOG IN USERNAME

if(!empty($_POST['Username']) && !empty($_POST['password'])) {  
    $Username=$_POST['Username'];  
    $password=$_POST['password'];  
    $salt = "Garam";
    $password = md5($salt.$password);
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "garyforums";
    $con = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

    if (!$con){
      die(mysqli_error($con));
    }
    
    mysqli_select_db($con,'garyforums') or die("cannot select DB");  
    $query=mysqli_query($con,"SELECT * FROM garyforums WHERE username='".$Username."' AND password='".$password."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))    
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
    
    if ($Username == 'asdasdasd' && $password == md5($salt.'asdasdasd')){   // LOG IN USERNAME MODERATOR
      $message = "Login Successful";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Home-Mods.html');
                </script>";     
    }
    if ($Username == $dbusername && $password == $dbpassword)  
    {  
    session_start();  
    $_SESSION['garyforums']=$Username;  
  
    /* Redirect browser */  
    $message = "Login Successful";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Home-User.html');
                </script>";            
    }  
      }

    mysqli_select_db($con,'garyforums') or die("cannot select DB");  
    $query=mysqli_query($con,"SELECT * FROM garyforums WHERE username='".$Username."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0){
      while($row=mysqli_fetch_assoc($query))    
    {  
    $dbusername=$row['username'];   
    }  
   if ($Username == $dbusername){ 
        $message = "Invalid Password!";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location.replace('Log-in-U.html');</script>";
        }
        
        }
        else{
          $message = "Username does not exist.";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location.replace('Log-in-U.html');</script>";
      }
      
    }
 else {
   $message = "All field required!";
  echo "<script type='text/javascript'>alert('$message');
  window.location.replace('Log-in-U.html');
  </script>";
 }

?>