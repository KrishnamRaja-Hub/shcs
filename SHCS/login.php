<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
h1 {
  text-align: center;
}
h2{
  text-align: center;
}
h4{
  text-align: center;
  color: red;
}
form {
  width: 300px;
  margin: 0 auto;
  text-align: center;
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 16px;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

  </style>
</head>
<body>
  <h1>Login</h1>
  <h2> Welcome to SHCS </h2>
  <form name="login" action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="user" name="user"><br>
    <label for="password">Password:</label>
    <input type="password" id="pass" name="pass"><br><br>
    <input type="submit" value="Submit">
  </form> 
</body>
</html>


<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "SHCS";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
  
    $sql = "select * from login where username = '$username' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";  
        header("Location: page2.html");
      }  
      else{  
        echo "<h4> Login failed. Invalid username or password.</h4>";  
        // header("Location: login.php");
    } 
?> 