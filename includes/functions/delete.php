<?php 
    require('../../config/database.php');
    
    # Handle Get Request
    # Delete User & Re-direct Back to Home Page
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) == "PUT") {
        $id = $_GET["id"];

        try {
            $statement = $pdo->prepare(
                'DELETE FROM users WHERE id = :id'
            );
            $statement->execute(["id" => $id]);

            header("Location: http://localhost/admin_dashboard/index.php");
            exit();
        } catch(PDOException $e) {
            echo "<h4 style='color:#842029;background-color: #f8d7da;border-color: #f5c2c7;width:100%;height:auto;'>".$e->getMessage(). "</h4>";
        }
    } else {
        header("Location: http://localhost/admin_dashboard/index.php");
        exit();
    }
?>