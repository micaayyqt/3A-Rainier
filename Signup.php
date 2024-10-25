<?php
require('./Database.php');

if (isset($_POST['signup'])) {
    $Uname = $_POST['Uname'];
    $Ename = $_POST['Email'];
    $Pname = $_POST['password'];

    if (empty($Uname) || empty($Ename) || empty($Pname)) {
        header("Location: Signup.php");
        exit();
    }

    $hashedPassword = password_hash($Pname, PASSWORD_DEFAULT);

    if ($hashedPassword === false) {
        echo '<script>alert("Password hashing failed!")</script>';
        exit();
    }

    $querySignup = "INSERT INTO register (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $querySignup);
    mysqli_stmt_bind_param($stmt, "sss", $Uname, $Ename, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Register Successfully!")</script>';
        echo '<script>window.location.href = "/3A-Rainier/Login.php"</script>';
    } else {
        echo 'Error: ' . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background: #2B2D35;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }

        button:hover {
            opacity: .7;
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #444;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="Signup.php" method="post">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
        <label>User Name</label>
        <input type="text" name="Uname" placeholder="Enter Your User Name..." value="<?php echo isset($_GET['UserName']) ? $_GET['UserName'] : ''; ?>"><br>

        <label>Email</label>
        <input type="text" name="Email" placeholder="Enter Your Email..." value="<?php echo isset($_GET['Email']) ? $_GET['Email'] : ''; ?>"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Your Password..."><br>

        <button type="submit" name="signup">Sign Up</button>

        <div class="login-link">
            <p>Already have an account? <a href="/3A-Rainier/Login.php">Login here</a></p>
        </div>
    </form>
</body>
</html>