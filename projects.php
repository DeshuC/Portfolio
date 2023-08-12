<!DOCTYPE html>
<html>
<head>
    
  <title>Chalani Deshikaa</title>
  <style>
  body {
            background-color:#013220; 
            margin: 10; 
            padding: 10; 
            font-family: Arial, sans-serif; 
        }
table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #dddddd;
    margin-top: 20px;
}


th {
    background-color: #013220;
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}


tr:nth-child(even) {
    background-color: #013220;
}


td {
    border: 1px solid #dddddd;
    padding: 8px;
}


tr:hover {
    background-color: #e0e0e0;
}
</style>
  </head>

<body>
<main>
   
    <div class="table-container">
  <?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'portfolio';
  

  $conn = mysqli_connect($host, $username, $password, $database);
  
 
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
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
          echo "<td><a href='data.php?id=" . $row['ID'] . "'>Update</a> | <a href='dt.php?id=" . $row['ID'] . "'>Delete</a></td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "No records found";
  }
  
  mysqli_close($conn);
  ?>
  </section>
  </main>
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