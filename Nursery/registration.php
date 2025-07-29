<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('bgimg.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
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
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .link {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1><br><br>
        <?php
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            
            $errors = array();
            
            // Check if all fields are filled
            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
                array_push($errors,"All fields are required");
            }

            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }

            // Check if password meets complexity requirements
            if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
                array_push($errors,"Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long");
            }

            // Check if passwords match
            if ($password !== $passwordRepeat) {
                array_push($errors,"Password does not match");
            }

            // Check if email already exists in the database
            require_once "db_conn.php";
            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);
                if ($rowCount > 0) {
                    array_push($errors,"Email already exists!");
                }
            } else {
                die("Something went wrong");
            }

            // If there are no errors, insert the user into the database
            if (count($errors) == 0) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user (full_name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong");
                }
            } else {
                // Display errors
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
        }
        ?>
        <!-- PHP code for form submission and error handling -->
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <!-- Link to login page -->
        <div><p>Already Registered? <a href="login.php" class="link">Login Here</a></p></div>
    </div>
</body>
</html>
