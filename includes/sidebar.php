<div class="sidebar collapse" id="navbarToggleExternalContent">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="home.php">

                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">

                    Database Test
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="initial.php">

                    Initial Test
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="function.php">

                    Function Test
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="form.php">

                    Form to DB Test(Add New)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="classtest.php">

                    OO Class Tests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="collection.php">

                    Collection Application
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xml.php" target="_blank">

                   XML
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="json.php" target="_blank">

                    JSON
                </a>
            </li>

            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <div class="mob-log-reg_btn">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php?logout">
                            Logout
                        </a>
                    </li>
                </div>
            <?php
        } else {
            ?>
                <div class="mob-log-reg_btn">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">
                            Register
                        </a>
                    </li>
                </div>
            <?php
        }
        ?>

        </ul>
    </div>
</div>