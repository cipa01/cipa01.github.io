<?php

    $conn = new mysqli('sql305.epizy.com', 'epiz_31926538', 'm4uJ5Vo3y3Oo', 'epiz_31926538_regform');
    if ($conn->connect_error) { // Fixed typo here
        die('Connection failed: ' . $conn->connect_error); // Added error message
    } else {
        $name = $_REQUEST["fullname"];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];

        $stmt = $conn->prepare("INSERT INTO tdata(name, email, message) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        $stmt->execute();
        echo "Message sent";
        $stmt->close();
        $conn->close();
    }
?>