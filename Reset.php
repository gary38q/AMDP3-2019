<?php  
// BELUM BERHASIL TINGGAL CARA MERESET
// MENGECEK EMAIL ADA ATAU TIDAK SUDAH BISA

if (!empty($_POST['email'])){
  $email=$_POST['email'];  
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "garyforums";
  $con = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
  if (!$con){
    die ("tidak bisa connect").mysqli_error($connect);
  }
  
  mysqli_select_db($con,'garyforums') or die("cannot select DB");  
  
  $query=mysqli_query($con,"SELECT * FROM garyforums WHERE email='".$email."'");
  $numrows=mysqli_num_rows($query);  

    if ($numrows == NULL){
      $message = "Invalid Email";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('forget.html');
                </script>";
    }
    else{
      $_SESSION;
  echo "<script type='text/javascript'>
       window.location.replace('Reset.html');
       </script>";
    }

}

else if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $email=$_POST['email'];  
    $salt = "Garam";
    $password=$_POST['password'];  
    $password = md5($salt.$password);
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "garyforums";
    $con = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

    if (!$con){
      die ("tidak bisa connect").mysqli_error($con);
    }
    
    mysqli_select_db($con,'garyforums') or die("cannot select DB");  
    
    $query = "SELECT * FROM garyforums UPDATE SET password = $password WHERE email = $email";
    $result = mysqli_query($con, $query);
    if ($result){ 
      $message = "Password Changed";  
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Log-in-U.html');
                </script>";
                $stmt->close();
              }
   
    else {
      echo "error";
    }
   $con->close();

}              
else {
  echo "<script type='text/javascript'>
       window.location.replace('Reset.html');
       </script>";
}
?>                