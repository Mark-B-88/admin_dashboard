<?php require('./config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        form {
            max-width: 600px;
            height: auto;
            margin: 8rem auto 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    <title>Admin Dashboard | About Page</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col px-3 py-3">
                <form class="form-control shadow py-5 px-5">
                    <h1 class="mb-3">Admin Dashboard</h1>
                    <hr>
                    <h5 class="mb-3">Author: Marco Barrantes</h5>
                    <h6 class="mb-3">Created On: September 26th 2021</h6>
                    <p class="lead mb-3">Version 1.0.0</p>
                    <hr>
                    <p class="mb-3">
                        This is a basic C.R.U.D application where you can create,
                        edit, and delete users from your database. It is meant to
                        be used as a boiler plate where you can create any information about your particular user.
                    </p>
                    <p class="mb-3">
                        For Example, you can use the Dashboard to create a database of employees for your organization, or perhaps even a database of students in your high school, or even members of an online community.
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- bootstrap script CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>