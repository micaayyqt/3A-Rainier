<?php
require('./Read.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f7f7f7;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #337ab7;
        }
        form input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">User Management</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="Email.php">Email Notification</a></li>
                <li><a href="SMS.php">SMS API</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>WELCOME</h1>
        <h3>Create User Info</h3>
        <form action="Create.php" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="Fname" placeholder="Enter your Firstname" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Mname" placeholder="Enter your Middlename" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Lname" placeholder="Enter your Lastname" required />
            </div>
            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
        </form>

        <br>

        <h3>List of Users</h3>
        <table class="table table-hover">
            <thead>
                <tr class="success">
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>MiddleName</th>
                    <th>LastName</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($results = mysqli_fetch_array($sqlAccount)) { ?>
                    <tr class="info">
                        <td><?php echo $results['ID']; ?></td>
                        <td><?php echo $results['FirstName']; ?></td>
                        <td><?php echo $results['MiddlName']; ?></td>
                        <td><?php echo $results['LastName']; ?></td>
                        <td>
                            <form action="Edit.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="editID" value="<?php echo $results['ID']; ?>">
                                <input type="hidden" name="editF" value="<?php echo $results['FirstName']; ?>">
                                <input type="hidden" name="editM" value="<?php echo $results['MiddlName']; ?>">
                                <input type="hidden" name="editL" value="<?php echo $results['LastName']; ?>">
                                <button type="submit" name="edit" class="btn btn-warning btn-sm">EDIT</button>
                            </form>
                            <form action="Delete.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="deleteID" value="<?php echo $results['ID']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
