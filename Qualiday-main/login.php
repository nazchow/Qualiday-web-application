<!DOCTYPE html>
<!-- Things to implement: if incorrect password, try again -->
<!-- FIX ME: match buttons to the rest of the document -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap">

  <title>Login Page</title>
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

    /* Spacing out buttons*/
    .button-container {
      display: flex;
      justify-content: center;
    }

    .button-container button {
      margin: 0 5px;
    }

    #forgotPassword {
      text-align: center;
    }

    a {
      color: black;
    }

    a:hover {
      color: #2d6a4f;
    }

    /* main login-page */
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
      font-size: 40px;
      weight: 200;
      margin-bottom: 0;
      color: #4D524A;
    }


    /* texts, password, email inputs, and dropdown */
    input[type="text"],
    input[type="password"],
    input[type="email"],

    select {
      width: 100%;
      padding: 5px;
      margin-bottom: 20px;
      border: 1px solid #D9D9D9;
      border-radius: 5px;
      font-size: 16px;
      color: #4D524A;
    }

    /* sign up button (OLD)*/
    /*button {

      background-color: #9DB08F;
      color: white;
      padding: 40px ,40px text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      border-radius: 30px
    }
*/
    /* login/signup button 2.0 */

    .square-button {
      width: 121px;
      height: 35px;
      padding: 5px;
      background-color: #9DB08F;
      color: #FFFFFF;
      font-size: 16px;
      font-family: 'Lalezar';
      border-radius: 10px;
      border: none;
      outline: none;
      cursor: pointer;
      transition: background-color 0.3s;

    }

    .square-button:hover {
      background-color: #C8DBBD;
    }
  </style>


</head>

<body>
<form method = "post" action = "login.php">

  <div class="signup-container">
    <h2>LOGIN</h2>
    <!-- Input for for email -->
    <label for="email">email</label>
    <input type="email" id="email" placeholder="email" name = "email">

    <!-- Input for for password -->
    <label for="password">password</label>
    <input type="password" id="password" placeholder=" password" name = "password" >

    <!-- Login/Sign Up Buttons -->
    <div class="button-container">
      <input class="square-button" type="submit" id="loginButton" value="LOGIN" name = "login_Btn" >

      <button onclick="window.location='signup.php';" class="square-button" type="button" id="signUpButton"> SIGN UP </button>
      
      </a>
    </div>

    <!-- Forgot Password Hyperlink -->
    <p id="forgotPassword"> <a href="password.php"> Forgot Password? </a> </p>
  </div>

</form>
</body>


</html>

<?php


$conn = mysqli_connect("localhost", "root", "");
if(isset($_POST['login_Btn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM todo.logininfo WHERE email = '$email'";
    $result= mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $resultPassword = $row['password'];
        if($password == $resultPassword){
            header('Location:todo.html');
        }else {
            echo "<script> alert ('login unsucessful');
        </script>";
        }
    }
}

?>