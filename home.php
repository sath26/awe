<?php
session_start();
require_once 'classes/user.php';

$objUser = new User();
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
                <h1 style="margin-top: 10px">Search</h1>

                <?php
                if (isset($_SESSION['user'])) {
                    echo '<p>Yay! you are logged in</p>';
                } elseif (isset($_GET['form'])) {
                    echo '<p>Login and u wont have come back here again from  <b>Form to DB Test(add new)</b>.</p>';
                }
                ?>


                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" size="100" placeholder="Search by Full Name" />
                    </div>
                    <input type="submit" class="btn btn-primary mb-2" value="Search">
                </form>

                <?php
                if (isset($_GET['name'])) {
                    $name = $_GET['name'];
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            if ($name != "") {
                                $query = "SELECT * FROM crud_users where name LIKE '%$name%'";
                                $stmt = $objUser->runQuery($query);
                                $stmt->execute();
                                ?>

                                <?php if ($stmt->rowCount() > 0) {
                                    while ($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><?php print($rowUser['id']); ?></td>
                                            <td>

                                                <?php print($rowUser['name']); ?>

                                            </td>
                                            <td><?php print($rowUser['email']); ?></td>
                                            <td>
                                                <a class="confirmation" href="index.php?delete_id=<?php print($rowUser['id']); ?>">
                                                    <span data-feather="trash"></span>
                                                </a>
                                                <a href="form.php?edit_id=<?php print($rowUser['id']); ?>">
                                                    <span data-feather="edit"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                            } else { ?>
                                    <tr>
                                        <td colspan="4">No record found...</td>
                                    </tr>
                                <?php }
                        } else { ?>
                                <tr>
                                    <td colspan="4">You must type a word to search!</td>
                                </tr>
                            <?php
                        }
                        ?>
                        </table>
                    </div>
                <?php
            }
            ?>
            </main>
        </div>

    </div>
    <?php require_once 'includes/footer.php'; ?>
</body>

</html>