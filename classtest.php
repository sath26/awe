<?php
session_start();
require_once 'classes/user.php';
$objUser = new User();
function __autoload($class_name)
{
    require_once 'classes/' . $class_name . '.php';
}
$ObjColl = new ObjectCollection();
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
                <h1 style="margin-top: 10px">Classes and Objects</h1>

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
                        $query = "SELECT * FROM crud_users";
                        $stmt = $objUser->runQuery($query);
                        $stmt->execute();
                        ?>
                        <tbody>
                            <?php if ($stmt->rowCount() > 0) {
                                while ($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $row = new Oop($rowUser["id"], $rowUser["name"], $rowUser["email"]);
                                    $ObjColl->addItem($row);
                                }
                            }
                            for ($i = 0; $i < $ObjColl->getItemCount(); $i++) {
                                $item = $ObjColl->getItems($i);
                                if ($item instanceof Oop) {
                                    ?>
                                    <tr>
                                        <td><?php print($item->getId()); ?></td>
                                        <td>
                                            <?php print($item->getName()); ?>
                                        </td>
                                        <td><?php print($item->getEmail()); ?></td>

                                    </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</body>

</html>