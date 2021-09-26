<?php 
    require('../../config/database.php');
    
    # Get All Users    
    if($_GET["show"] == "all") {
        try {
            $statement = $pdo->prepare(
                'SELECT * FROM users;'
            );
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            echo "<h4 class='alert alert-danger text-center' role='alert'>".$e->getMessage(). "</h4>";
        }
    }
    
    # Single User
    if($_GET["show"] == "one" && isset($_GET["id"])) {
        $id = $_GET["id"];

        try {
            $statement = $pdo->prepare(
                'SELECT * FROM users WHERE id = :id;'
            );
            $statement->execute(["id" => $id]);
            $results = $statement->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            echo "<h4 class='alert alert-danger text-center' role='alert'>".$e->getMessage(). "</h4>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <!--  bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        li {
            list-style-type: none;
        }
    </style>
    <script>
        function confirmEdit() {
            if(confirm("Are you sure you want to edit this user?")) {
                return true;
            } else {
                event.preventDefault();
            }
        }

        function confirmDelete() {
            if(confirm("Are you sure you want to delete this user?")) {
                return true;
            } else {
                event.preventDefault();
            }
        }
    </script>

    <title>Admin Dashboard | Show Users</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col text-center" style="margin-top:4rem;">
                <h1 style="margin-bottom:2rem;">All Active Users</h1>
                        <table class="table table-striped table-hover table-dark shadow">
                            <thead>
                                <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Edit User</th>
                                <th scope="col">Delete User</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($results as $user) { ?>
                                <tr>
                                    <!-- first name -->
                                    <td>
                                    <?php echo $user->first_name ?>
                                    </td>
                                    <!-- first name -->
                                    <td>
                                    <?php echo $user->last_name ?>
                                    </td>
                                    <!-- age -->
                                    <td>
                                    <?php echo $user->age ?>
                                    </td>
                                    <!-- edit user -->
                                    <td>
                                        <a href="./update.php?id=<?php echo $user->id; ?>" onclick="confirmEdit()" class="text-decoration-none"><i class="far fa-edit text-info"></i> Edit</a>
                                    </td>
                                    <!-- delete user -->
                                    <td>
                                        <a href="./delete.php?id=<?php echo $user->id; ?>" onclick="confirmDelete()" class="text-decoration-none"><i class="far fa-trash-alt text-danger"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                <button class="btn btn-secondary" style="margin-top:4rem;">
                    <a href="../../index.php" style="color:white;text-decoration:none;">
                        Main Page
                    </a>
                </button>
            </div>
        </div>
    </div>

    <!-- bootstrap script CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>