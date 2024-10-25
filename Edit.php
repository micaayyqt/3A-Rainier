<?php
require('./Database.php');

if (isset($_POST['edit'])) {
    $editID = $_POST['editID'];
    $editF = $_POST['editF'];
    $editM = $_POST['editM'];
    $editL = $_POST['editL'];
}

if (isset($_POST['update'])) {
    $updateID = $_POST['updateID'];
    $updateF = $_POST['updateF'];
    $updateM = $_POST['updateM'];
    $updateL = $_POST['updateL'];

    $querryupdate = "UPDATE tbl3a SET FirstName = '$updateF', MiddlName = '$updateM', LastName = '$updateL' WHERE ID = $updateID";
    $sqlupdate = mysqli_query($connection, $querryupdate);

    echo '<script>alert("Successfully Edited!")</script>';
    echo '<script>window.location.href = "/3A-Rainier/Index.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }

        h1, h3 {
            text-align: center;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Edit Information</h1>
            <h3>Edit Info</h3>
            <input type="text" name="updateF" placeholder="Enter your Firstname" value="<?php echo $editF ?>" required />
            <input type="text" name="updateM" placeholder="Enter your Middlename" value="<?php echo $editM ?>" required />
            <input type="text" name="updateL" placeholder="Enter your Lastname" value="<?php echo $editL ?>" required />
            <input type="hidden" name="updateID" value="<?php echo $editID ?>" />
            <input type="submit" name="update" value="SAVE" />
        </form>
    </div>
</body>
</html>
