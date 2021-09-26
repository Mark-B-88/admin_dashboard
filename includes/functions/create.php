<?php
    require('../../config/database.php');
    
    # Create New User
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $age = $_POST["age"];

        try {
            $statement = $pdo->prepare(
                'INSERT INTO users (first_name, last_name, age) VALUES (:first_name, :last_name, :age);'
            );
            $statement->execute(['first_name' => $first_name, 'last_name' => $last_name, 'age' => $age]);

            $id = $pdo->lastInsertId();

            echo "<script location.href='/read.php?show=one&id={$id}'></script>";

            header("Location: http://localhost/admin_dashboard/index.php");
            exit();
        } catch(PDOException $e) {
            echo "<h4 style='color:#842029;background-color: #f8d7da;border-color: #f5c2c7;width:100%;height:auto;'>".$e->getMessage(). "</h4>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Admin Dashboard | Create User</title>
</head>
<body>
    <div class="container" style="margin:4rem auto 0 auto;max-width:600px;">
        <div class="row">
            <div class="col">
                <h1>Create User</h1>
                <form 
                    action="./create.php" 
                    method="POST"
                    class="form-control py-3 px-3"
                >
                <input type="text" name="first_name" placeholder="First Name" class="form-control mb-3">
                <input type="text" name="last_name" placeholder="Last Name" 
                class="form-control mb-3">
                <input type="text" name="age" placeholder="Age" 
                class="form-control mb-3">
                <button class="btn btn-primary form-control mb-3" type="submit">Save</button>
                <button class="btn btn-secondary form-control mb-3">
                    <a href="../../index.php" style="color:white;text-decoration:none;">
                        Cancel
                    </a>
                </button>
                </form>
            </div>
        </div>
    </div>

    <!-- bootstrap script CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>