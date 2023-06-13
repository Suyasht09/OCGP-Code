<?php
ini_set('display_errors', 1);
if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    // DataBase connection
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'test';
    $conn = mysqli_connect($host,$user,$password,$dbname);
    $sql = "INSERT INTO uregistration (username, email, password) values('$username', '$email', '$password')";
    mysqli_query($conn,$sql);
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into uregistration(username, email, password) values(?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    echo"Registration Successfull...";
    $stmt->close();
    $conn->close();
}
}
?>
