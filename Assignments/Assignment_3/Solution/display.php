<?php
    session_start();
    $Database = $_SESSION["DB"];
    $Table = $_SESSION["TB"];
    $servername = "localhost";
    $username = "root";
    $password = "";

    $connect = new mysqli($servername,$username,$password,$Database);
    if($connect->connect_error){
        die("Connection failed:" . $connect->connect_error);
    }

    $sql = "Select * from ".$Table;
    $result = $connect->query($sql);
    
    if($result->num_rows > 0){
        echo "<html>";
        echo "<head>";
        echo "<title>Final Table</title>";
        echo "<style> table, th, td{border: 1px solid black} </style>";
        echo "</head>";
        echo "<body>";
        echo "<center><h3>The data in the Table ".$Table." of the Database ".$Database." is given below.<h3>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Contact</th><th>Address</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td>".$row["address"]."</td></tr>";
        }
        echo "</table>";
        echo "</center>";
        echo "</body>";
        echo "</html>";
    }
    else{
        echo "The Table is Emply";
    }
    $connect->close();
    session_destroy();
?>