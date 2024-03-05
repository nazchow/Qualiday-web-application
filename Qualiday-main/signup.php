<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap">

  <title>Sign Up Page</title>
  <style>
    body {
      font-family: 'Lalezar', cursive;
      background-color: #C8DBBD;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    /* main sign-up */
    .signup-container {
      background-color: #F4F6F5;
      width: 400px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
    }

    /* main sign up header */
    h2 {
      font-family: 'Lalezar', cursive;
      text-align: center;
      margin-bottom: 20px;
      color: #4D524A;
    }

    /* texts, password, email inputs, and dropdown */
    input[type="text"],
    input[type="password"],
    input[type="email"],
    select {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #D9D9D9;
      border-radius: 5px;
      font-size: 16px;
      color: #4D524A;
    }

    /* sign up button */
    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #9DB08F;
      color: #FFFFFF;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #C8DBBD;
    }

  </style>
</head>

<body>
  <div class="signup-container">
    <form method="post" action="signup.php">
    <h2>SIGN UP</h2>
    <!-- Input for for email -->
    <label for="email">email</label>
    <input type="email" id="email" placeholder="email" name="email" required>

    <!-- Input for for password -->
    <label for="password">password</label>
    <input type="password" id="password" placeholder="password" name="password" required>

    <!-- Input for for confirm password -->
    <label for="confirm-password">confirm password</label>
    <input type="password" id="confirm-password" placeholder="confirm password" name="confirm-password">

    <!-- Security q drop down -->
    <label for="security-question">select a security question</label>
    <select id="security-question" name="security-question">
      <option value="" disabled selected>enter your question</option>
      <option value="1">What is your mother's name?</option>
      <option value="2">What was the name of your first pet?</option>
      <option value="3">What city were you born in?</option>
    </select>

    <label for="answer">enter your answer</label>
    <input type="text" id="answer" placeholder="enter your answer" name="answer">

    <!-- Submit -->
    <button type= "submit" value="Signup" name="signup_Btn">Signup</btn>
  </div>
</body>
</html>

<?php

$conn = mysqli_connect("localhost", "root", "");
if (isset($_POST['signup_Btn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];
  $securityQuestion = $_POST['security-question'];
  $securityAnswer = $_POST['answer'];

  if ($password !== $confirmPassword) {
  echo "<script>alert('Passwords do not match');</script>";
} else {
  $sql = "INSERT INTO todo.logininfo (email, password, security_question, answer) VALUES('$email', '$password', '$securityQuestion', '$securityAnswer')";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Sign up successful. You can now login'); window.location='login.php';</script>";
} else {
  echo "<script>alert('Error occured while signing up.');</script>";
    }
  }
}
mysqli_close($conn);
?>