<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Login Page</title>
  <style>
    .space {
      margin-top: 23vh;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border-radius: 10px;
      padding: 10px;
    }

    body {
      background-color:white;
    }

    .login {
      background-color: #9494ff;
    }

    .cus_text {
      text-shadow: 5px 2px #bf3042;
      background-color:#00f67b;
    }
  </style>
</head>

<body>

  <?php
  session_start();
  if (isset($_SESSION['username'])) {
    header("location: loged_in.php");
  }


  ?>
  <div class="maincls">
    <div class="container">
      <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm space">
          <br>
          <h1 class="text-center cus_text"> LOG IN</h1>
          <br>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input name="username" type="text" class="form-control login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <br>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input name="password" type="password" class="form-control login" id="exampleInputPassword1" placeholder="Password">
            </div>
            <br>

            <button name="submit" type="submit" class="btn btn-primary">Login</button>

          </form>
          <?php

          if (isset($_POST['submit'])) {
            $connection = mysqli_connect('localhost', 'root', '', 'exam') or die("not connected" . mysqli_error());
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $query = "SELECT * FROM users WHERE username='{$username}' AND password = '{$password}'";
            $result = mysqli_query($connection, $query) or die("Query Faild");
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                session_start();

                $_SESSION['username'] = $row['username'];

                header("location: loged_in.php");
              }
            } else {
              echo '<div class="alert alert-danger" role="alert">';
              echo "Username or Password don't match";
              echo "</div>";
            }
          }

          ?>
          <br>
        </div>
        <div class="col-sm">

        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>