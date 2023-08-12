<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        
        body {
            background-color:#04AA6D;
            margin: 10;
            padding: 10;
            font-family: Arial, sans-serif;
            display: flex;
            
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            padding: 40px;
        }

       
        .form-heading {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333333;
        }

        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        
        .form-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .form-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h2>Log in &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</h2>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM user WHERE phone = ? AND password = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $phone, $password);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        echo "Login successful. Welcome, " . $phone . "!";
        header("Location: index.php");
    } else {
        echo "Login failed. Please try again.";
    }
    
    $stmt->close();
}

$conn->close();
?>

<form method="post" action="">
    Phone: <input type="text" name="phone"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
<br>
&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>
