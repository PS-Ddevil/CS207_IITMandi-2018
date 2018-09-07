<?php
    session_start();
    header("Location: insert.html");
    $Database = $_SESSION["DB"];
    $Table = $_SESSION["TB"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];

//    echo "Database name was ".$Database." and table name was ".$Table;
    $connect = new mysqli($servername, $username, $password, $Database);
    if($connect->connect_error){
        die("Connection failed" . $connect->connect_error);
    }
    $sql = "INSERT INTO ".$Table."(name,email,contact,address)
    values('$name','$email','$contact','$address')";
    
    if($connect->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }  
    $connect->close();
?>