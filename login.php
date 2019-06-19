<?php
ob_start();
session_start();
require_once 'classes/database.php';
require_once 'classes/loginClass.php';

$login = new Login();
// if session is set direct to index
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $upass = $_POST['pass'];

    $password = hash('sha256', $upass); // password hashing using SHA256
    $stmt = $login->runQuery("SELECT id, username, password FROM users WHERE email=:email");
    // $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email= ?");
    // $stmt->bind_param("s", $email);
    /* execute query */
    $stmt->execute(array(":email" => $email));
    //get result
    // $res = $stmt->get_result();
    // $stmt->close();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
    if ($row['password'] == $password) {
        $_SESSION['user'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header("Location: index.php");
    } elseif ($count == 1) {
        $errMSG = "Bad password";
    } else $errMSG = "User not found";
}
?>

<!DOCTYPE html>
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body>
<?php require_once 'includes/header.php'; ?>
<div class="container">
<div class="row">
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php require_once 'includes/sidebar.php'; ?>
    <div id="login-form">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Login:</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                    </div>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="register.php" type="button" class="btn btn-block btn-danger"
                       name="btn-login">Register</a>
                </div>

            </div>

        </form>
    </div>
    </main>
</div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
