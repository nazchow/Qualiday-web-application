<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap">

  <title>Reset Password</title>
  <style>
    body {
      font-family: 'Lalezar', cursive;
      background-color: #C8DBBD;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      margin:
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
    <form method="post" action="password.php">
      <h2>FORGOT PASSWORD</h2>
      <!-- Input for for email -->
      <label>Enter your email</label>

      <input type="email" id="email" placeholder="" name="email">

      <!-- Security question drop down-->
      <label for="security-question">Select your security question</label>
      <select id="security-question" name="security-question" required>
        <option value="1">What is your mother's name?</option>
        <option value="2">What was the name of your first pet?</option>
        <option value="3">What city were you born in?</option>
      </select>
      <label for="answer">Enter your answer</label>
      <input type="text" id="answer" placeholder="Enter your answer" name="answer" required>

      <!--Input for new password-->
      <label for="new-password">New Password</label>
      <input type="password" id="new-password" placeholder="New Password" name="new-password" required>

      <!--Input for confirm new password-->
      <label for="confirm-new-password">Confirm New Password</label>
      <input type="password" id="confirm-new-password" placeholder="Confirm New Password" name="confirm-new-password"
        required>

      <!--Submit-->
      <button type="submit" name="reset_password_Btn">RESET PASSWORD</button>
    </form>
  </div>
</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "");
if(isset($_POST['reset_password_Btn'])){
  $email = $_POST['email'];
  $securityQuestion = $_POST['security-question'];
  $answer = $_POST['answer'];
  $newPassword = $_POST['new-password'];
  $confirmNewPassword = $_POST['confirm-new-password'];
  if($newPassword !== $confirmNewPassword){
    echo "<script>alert('Passwords do not match.');</script>";
  } else{
    //check if email, security question, and answer match the database
    $sql = "SELECT * FROM todo.logininfo WHERE email = '$email' AND security_question = '$securityQuestion' AND answer = '$answer'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_assoc($result)){
      //Update the user's password with the new password
      $updateSql = "UPDATE todo.logininfo SET password = '$newPassword' WHERE email = '$email'";
      if(mysqli_query($conn, $updateSql)){
        echo "<script>alert('Password reset successfully. You can now login'); window.location='login.php'; </script>";
      }else{
        echo "<script>alert('Error updating password.');</script>";
      }
  }else{
    echo "<script>alert('Invalid email, security question, or answer.');</script>";
    }
  }
}
mysqli_close($conn);

?>