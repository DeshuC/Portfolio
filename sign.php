<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        
        body {
  background-color: #04AA6D;
  margin: 20;
  padding: 10;
  font-family: Arial, sans-serif;
  display: flex;
  align-items: center;
  min-height: 100vh;
}

.form-container {
  background-color: #5A5A5A;
  border-radius: 12px;
  box-shadow: 10px 20px 20px rgba(0, 0, 0, 0.2);
  width: 400px;
  padding: 40px;
  perspective: 1000px;
}

.form-heading {
  font-size: 28px;
  margin-bottom: 20px;
  color: #00008b;
  text-shadow: 2px 2px 3px #000;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
}

.form-button {
  background-color: #007bff;
  color: #ffffff;
  border: none;
  padding: 0px 0px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s;
  box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
}

.form-button:hover {
  background-color: #0056b3;
}


    </style>
</head>
<body>

<?php

$id = $name = $phone = $password = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'portfolio');

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO user (id, name, phone, password) VALUES ('$id', '$name', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();
}
?>

<h2>Tell Us About You &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</h2>
<form method="post">
    <label for="id">ID:</label><br>
    <input type="varchar" id="id" name="id"><br><br>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br><br>
    <label for="phone">Phone:</label><br>
    <input type="int" id="phone" name="phone"><br><br>
    <label for="password">password:</label><br>
    <input type="varchar" id="password" name="password"><br><br>
    <input type="submit" value="Submit">
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
