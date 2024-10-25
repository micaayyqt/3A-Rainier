<?php
require('./Read.php');

if (isset($_POST['login'])) {
    $Uname = $_POST['Uname'];
    $Pname = $_POST['Pname'];

    // Prepare the SQL query to prevent SQL injection
    $queryAccount = "SELECT * FROM register WHERE username ='$Uname'  AND password = '$Pname'";
    $stmt = mysqli_prepare($connection, $queryAccount);
    
    // Bind the username and password
    mysqli_stmt_bind_param($stmt, "ss", $Uname, $Pname);
    mysqli_stmt_execute($stmt);
    
    // Store the result to check if any rows were returned
    mysqli_stmt_store_result($stmt);

    // Check if a match was found
    if (mysqli_stmt_num_rows($stmt) > 0) {
        // Login successful
        echo '<script>alert("Login Successfully!")</script>';
        echo '<script>window.location.href = "/3A-Rainier/Index.php"</script>';
    } else {
        // Login failed
        echo '<script>alert("Invalid Username or Password!")</script>';
        echo '<script>window.location.href = "Login.php"</script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background:  #2B2D35;
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

        .success {
            background: #D4EDDA;
            color: #40754C;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .ca {
            font-size: 14px;
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            color: #444;
        }

        .ca:hover {
            text-decoration: underline;
        } 
    </style>
</head>
<body>
    <form action="Login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>Username</label>
        <input type="text" name="Uname" placeholder="Enter your Username..." required>

        <label>Password</label>
        <input type="password" name="Pname" placeholder="Enter your Password..." required>

        <button type="submit" name="login">Login</button>
        
        <div class="login-link">
            <p>Don't have an account? <a href="/3A-Rainier/Signup.php">Signup here</a></p>
        </div>
    </form>
</body>
</html>