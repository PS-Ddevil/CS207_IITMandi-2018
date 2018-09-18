<?php
    session_start();
    header("Location: insert.html");
    $Database = $_POST["DBname"];
    $Table = $_POST["TBname"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $_SESSION["DB"] = $Database;
    $_SESSION["TB"] = $Table; 
    
    $connect1 = new mysqli($servername,$username,$password);
    if($connect1->connect_error){
        die("Connection failed: " . $connect1->connect_error);
    }

    //Creating Database 
    $sql = "CREATE DATABASE ".$Database;
    if($connect1->query($sql) === TRUE){
        echo "Database ".$Database." and ".$Table." created Successfully";
    }else{
        echo "Error creating database: ". $connect1->error;
    }
    $connect1->close();

    $connect2 = new mysqli($servername,$username,$password,$Database);

    if (!$connect2) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $create_table = "CREATE TABLE ".$Table."(
    id int(6) unsigned auto_increment primary key,
    name varchar(30) not null,
    email varchar(50) null,
    contact bigint(11) null,
    address varchar(200) null
    )";

    if (mysqli_query($connect2, $create_table)) {
    echo "Table".$Table." created successfully";
    } else {
    echo "Error creating table: " . mysqli_error($connect2);
    }
    
    mysqli_close($connect2);
?>