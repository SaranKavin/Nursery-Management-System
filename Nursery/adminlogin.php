<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-image: url('bgimg.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="adminlogin.php" method="post">
            <h1>Admin Login</h1>
            <label for="uname">Username:</label>
            <input type="text" id="uname" name="uname" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
    </div>

    <?php
    session_start();
    include "db_conn.php";

    if (isset($_SESSION["admin_name"])) {
        header("Location: purchaseadmin.html");
        exit();
    }

    if (isset($_POST['uname']) && isset($_POST['password'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['password'];

        $adminSql = "SELECT * FROM adminuser WHERE user_name='$uname' AND password='$pass'";
        $adminResult = mysqli_query($conn, $adminSql);

        if (mysqli_num_rows($adminResult) === 1) {
            $_SESSION['admin_name'] = $uname;
            header("Location: purchaseadmin.html");
            exit();
        } else {
            echo "<script>alert('Invalid username or password. You are not an admin.');window.location.href = 'login.php';</script>";
        }
    }
    ?>
</body>
</html>
