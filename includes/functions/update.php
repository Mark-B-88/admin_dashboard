<?php 
    require('../../config/database.php');
    
    # Handles Post Request
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"]) && $_POST["_method"] == "PUT") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $age = $_POST["age"];
        $id = $_GET["id"];

        try {
            $statement = $pdo->prepare(
                'UPDATE users SET first_name = :first_name, last_name = :last_name, age = :age WHERE id =:id'
            );
            $statement->execute(["first_name" => $first_name, "last_name" => $last_name, "age" => $age, "id" => $id]);

            header("Location: http://localhost/admin_dashboard/index.php");
            exit();
        } catch(PDOException $e) {
            echo "<h4 style='color:#842029;background-color: #f8d7da;border-color: #f5c2c7;width:100%;height:auto;'>".$e->getMessage(). "</h4>";
        }
    }

    # Handles Get Request
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        try {
            $statement = $pdo->prepare(
                'SELECT * FROM users WHERE id = :id;'
            );
            $statement->execute(["id" => $id]);

            $results = $statement->fetchAll(PDO::FETCH_OBJ);
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
                <h1>Edit User</h1>
                <form 
                    action="./update.php?id=<?php echo $results[0]->id; ?>" 
                    method="POST"
                    class="form-control py-3 px-3"
                >
                <input type="hidden" name="_method"value="PUT">
                <input type="text" name="first_name" placeholder="First Name" class="form-control mb-3" value="<?php echo $results[0]->first_name; ?>">
                <input type="text" name="last_name" placeholder="Last Name" 
                class="form-control mb-3" value="<?php echo $results[0]->last_name; ?>">
                <input type="text" name="age" placeholder="Age" 
                class="form-control mb-3" value="<?php echo $results[0]->age; ?>">
                <button class="btn btn-danger form-control mb-3" type="submit">Save</button>
                <button class="btn btn-secondary form-control mb-3">
                    <a href="./read.php?show=all" style="color:white;text-decoration:none;">
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