<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body { background-image: url('bgimg.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
             height: 100vh;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-btn {
            text-align: center;
        }
        .btn-primary {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .link {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1><br><br>
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "db_conn.php";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    echo "<div class='alert alert-success'>Login successful. Welcome !</div>";
                    header("refresh:3;url=nursery.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Enter Correct Email And Password</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        
            <a href="adminlogin.php" class="btn btn-primary">Admin</a> <!-- Admin button -->
        </div>
     <div><p>Not registered yet <a href="registration.php" class="link">Register Here</a></p></div>
    </div>
</body>
</html>
