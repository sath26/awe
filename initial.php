<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head metas, css, and title -->
    <?php require_once 'includes/head.php'; ?>
</head>
<body>
<?php require_once 'includes/header.php'; ?>
<div class="container-fluid">
<div class="row">
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php require_once 'includes/sidebar.php'; ?>
                    <h1 style="margin-top: 10px">Test: Initialisation and Configuration</h1>

<?php
require_once '.\classes\database.php';
$database = new Database();
$db = array(
    "localhost"=>$database->host, 
    "database"=>$database->dbName,
    "username"=>$database->username,
    "password"=>$database->password,
);
?>
<pre><?php
    print_r($db);
?></pre>
                </main>
</div>
</div>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>