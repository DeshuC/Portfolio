<?php

$name = $email = $message ="";
$nameErr = $emailErr = $messageErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces are allowed";
    }
}

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
}

if (empty($_POST["message"])) {
    $messageErr = "Message is required";
} else {
    $message = htmlspecialchars($_POST["message"]);
}
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Chalani Deshika</title>
  <style>
  </style>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="welcome.php">Log Out</a></li>
        <li><a href="projects.php">My Projects</a></li>
      </ul>
    </nav>
  </header>

  <section id="hero">
  <div class="slider-container">
    <div class="slider">
      <img id="sliderImage" src="my_photo.png" alt="Slider Image 1">
    </div>
  </div>
    <nav>
  </section>

  <section id="about">
    <div class="container">
      <h2>About Me</h2>
      <p>"Hello! I'm Chalani Deshika, a passionate web developer with 5 years of experience in crafting exceptional and user-friendly websites. My journey into web development began with a strong curiosity and a desire to bring creative ideas to life in the digital world. Over the years, I have honed my skills in HTML, CSS, JavaScript, and various web development frameworks.

        My approach to web development revolves around striking a balance between aesthetics and functionality. I thrive on creating visually captivating designs that not only capture attention but also provide an intuitive and seamless user experience. With a keen eye for detail and a dedication to staying up-to-date with the latest industry trends, I strive to deliver modern and responsive websites that exceed expectations.
        
        I take pride in collaborating with clients and understanding their unique visions, translating them into pixel-perfect websites. Whether it's developing a brand new website or revamping an existing one, I am committed to delivering solutions that align with the client's goals and objectives.
        
        In addition to my technical expertise, I value clear communication and effective project management. I enjoy working as part of a team, bringing diverse skills together to create successful digital experiences. I am constantly seeking opportunities for growth and learning, as I believe that continuous improvement is essential in such a dynamic field.
        
        Feel free to explore my portfolio and witness the projects that showcase my skills and dedication. I am always excited to take on new challenges and help businesses establish a strong online presence. Let's collaborate and bring your web development ideas to life!"
        
        </div>
  </section>

  <section id="skills">
    <div class="container">
      <h2>Skills</h2>
      <ul class="skills-list">
        <li>
          <h3>HTML</h3>
          <div class="skill-bar">
            <div class="skill-fill" style="width: 95%;"></div>
          </div>
        </li>
        <li>
          <h3>CSS</h3>
          <div class="skill-bar">
            <div class="skill-fill" style="width: 85%;"></div>
          </div>
        </li>
        <li>
          <h3>JavaScript</h3>
          <div class="skill-bar">
            <div class="skill-fill" style="width: 75%;"></div>
          </div>
        </li>
        <li>
        <h3>React</h3>
          <div class="skill-bar">
            <div class="skill-fill" style="width: 80%;"></div>
          </div>
        </li>
        <li>
        <h3>Python</h2>
        <div class="skill-bar">
          <div class="skill-fill" style="width: 77%;"></div>
        </div>
      </li>
      <li>
        <h3>Ruby</h2>
        <div class="skill-bar">
          <div class="skill-fill" style="width: 85%;"></div>
        </div>
      </li>
       
      </ul>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <h2>Contact Me</h2>
      <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost', 'root', '', 'portfolio');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>
        Email: <input type="text" name="email">
        <span class="error"><?php echo $emailErr;?></span>
        <br><br>
        Message: <textarea name="message" rows="5" cols="40"></textarea>
        <span class="error"><?php echo $messageErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
      <br>
        <p>
        <br> 
      </p></br>
    </div>
  </section>

  
  <footer>
    <div class="container">
      <p> My Email: chalanideshika@gmail.com 
        <br> My Telephone: 0710405021, 0116542380Chalani Deshika.
        <br>&copy; All rights reserved.</p>
    </div>
  </footer>
  
</body>
</html>