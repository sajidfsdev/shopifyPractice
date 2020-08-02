<?php
    function insertAnimation($delay,$repeat,$animation,$price)
    {
             //Performing saving actions on DB..........
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "animation";
        $servername = "sql12.freemysqlhosting.net";
        $username = "sql12357796";
        $password = "99pzu5LXAM";
        $dbname = "sql12357796";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
        }

        $sql = "DELETE FROM animation";

        if ($conn->query($sql) === TRUE) {
        //Inserting new record selected ............
        $sql = "INSERT INTO animation (delayanimation, repeatanimation, classanimation,price)
        VALUES ('$delay', '$repeat', '$animation','$price')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
        }
        //Inserting new records ends................
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
        }

        $conn->close();
    }
?>