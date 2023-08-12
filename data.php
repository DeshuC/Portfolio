<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <style>
        
        body {
            background-color:#013220;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $conn = new mysqli('localhost', 'root', '', 'portfolio');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = mysqli_real_escape_string($conn, $id);
    $title = mysqli_real_escape_string($conn, $title);
    $description = mysqli_real_escape_string($conn, $description);

    $sql = "INSERT INTO details (id, title, description) VALUES ('$id', '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<h2>Update New Details &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h2>
<form method="post">
    <label for="id">ID:</label><br>
    <input type="text" id="id" name="id"><br><br>
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="100"></textarea><br><br>
    <input type="submit" value="Submit">
</form>
<br>
<br>
<button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
