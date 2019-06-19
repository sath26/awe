<?php
ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: index.php");
}
require_once 'classes/database.php';
require_once 'classes/loginClass.php';

$login = new Login();

if (isset($_POST['signup'])) {

    $uname = trim($_POST['uname']); // get posted data and remove whitespace
    $email = trim($_POST['email']);
    $upass = trim($_POST['pass']);

    // hash password with SHA256;
    $password = hash('sha256', $upass);
    



        $stmts = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?, ?, ?)");
        $stmts->bind_param("sss", $uname, $email, $password);
        $res = $stmts->execute();//get result
        $stmts->close();

        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id; // set session and redirect to index page
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("Location: index.php");
                exit;
            }

        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again";
        }

    

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
                    <h2 class="">Register for our Website</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="uname" class="form-control" placeholder="Enter Username" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                               required/>
                    </div>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" id="TOS" value="This"><a href="#">I agree with
                            terms of service</a></label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Register</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="login.php" type="button" class="btn btn-block btn-success" name="btn-login">Login</a>
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
