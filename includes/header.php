<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="row">
        <div class="btn-sidenav-toggler col-2 m-0">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <a class="navbar-brand p-2 nav-title col-4" href="http://localhost/crud/index.php">
            <h5>Employment Management System</h5>
        </a>
    </div>
    <form class="form-inline log-reg-btn">
    <?php
            if (isset($_SESSION['user'])) {
                ?>
        <button class="mx-1 btn btn-link btn-reg" type="button"><a class="text-secondary" href="logout.php?logout">
            Logout
        </a></button>
        <?php
        } else {
            ?>
        <button class="mr-1 btn btn-link btn-log" type="button"><a href="http://localhost/crud/login.php">
                Login
            </a></button>
        <button class="mx-1 btn btn-link btn-reg" type="button"><a class="text-secondary" href="http://localhost/crud/register.php">
                Register
            </a></button>
            <?php
        }
        ?>
    </form>
</nav>