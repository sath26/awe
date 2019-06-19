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
     <h1 style="margin-top: 10px">Collection : Application</h1>
<?php 
//This function automatically loads any classes called. They must be same name and captilised eg Cow.php
function __autoload($class_name) {
	require_once 'classes/'.$class_name . '.php';
}
//create a new object collection (of animals)
$ObjColl = new ObjectCollection();

//Create objects using Animal Abstract class and add them to the collection
$c1 = new Cow("Jersey", 100);
$ObjColl->addItem($c1);
$d1 = new Dog("Alsation", "Rover");
$ObjColl->addItem($d1);
$c2 = new Cow("Friesan", 200);
$ObjColl->addItem($c2);
for($i = 0;$i < $ObjColl->getItemCount();$i++){
	    $item = $ObjColl->getItems($i);

            // $item->getBreed() is defined in superclass i.e. Animal.
            // you've not correctly generalized the inheritence
	    if ($item instanceof Dog) {
	       print 'Dog - '.$item->getBreed() . ' ' . $item->getName(). '<br />';
	    } elseif ($item instanceof Cow) {
	       // $item->getBreed() is defined in superclass i.e. Animal.
               print 'Cow- ' . $item->getBreed() . ' ' . $item->getMilkYield() . '<br />';
	    }
}

?>
                </main>
</div>
</div>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>