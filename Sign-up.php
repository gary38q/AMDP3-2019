<?php
    $email = $_POST['email'];
    $Username = $_POST['Username'];
    $password = $_POST['password'];
    $salt = "Garam";
    $password = md5($salt.$password);
    if (!empty($Username) || !empty($password) || !empty($email)){
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "garyforums";
        $connect = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
    if(!$connect)
    {
        die ("tidak bisa connect").mysqli_error($connect);
    }
    else {
        $SELECT = "SELECT email From garyforums Where email = ? Limit 1";
        $SELECT1 = "SELECT username From garyforums Where Username = ? Limit 1";
        $INSERT = "INSERT Into garyforums (Username, password, email) values(?, ? , ?)";
        // statement

        $stmt = $connect->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        $stmt = $connect->prepare($SELECT1);
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $stmt->bind_result($Username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();
            $stmt = $connect->prepare($INSERT);
            $stmt->bind_param ("sss" , $Username, $password, $email);
            $stmt->execute();
            $message = "Register Successful";
            $message1= "We have sent validation email to your Email";
                echo "<script type='text/javascript'>alert('$message'); 
                alert('$message1'); 
                window.location.replace('Log-in-U.html');
                </script>";
                

           }
            else {
                $message = "Someone already use this Email or Username";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Sign-up.html');
                </script>";
                
           }
           
           $stmt->close();
           $connect->close();
          }
      } else {
       echo "All field are required";
       die();
      }      

?>