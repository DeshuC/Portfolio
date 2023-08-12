<!DOCTYPE html>
<html>
<head>
    <title>Delete Data</title>
    <style>
        body {
            background-color: rgb(25, 114, 162);
            margin: 0;
            padding: 0;
        }
       
        
        #projects {
            background-color: #f4f4f4;
            padding: 20px;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: white;
          }

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #333;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        
        .table-container {
            display: flex;
            justify-content: center;
        }
  </style>
</head>
<body>
<section id="projects" class="section-projects">
    <div class="table-container">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projects";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM details WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}


$sql = "SELECT * FROM details";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Title</th><th>Description</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "<td><a href='index.php?delete_id=" . $row["ID"] . "'>Delete</a></td>";
             echo "</tr>";
        
    }
    
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
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
