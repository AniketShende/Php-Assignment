<?php
include 'partials/header.php';
require __DIR__ . '/products/products.php';


$product = [
    'id' => '',
    'title' => '',
    'description' => '',
    'quantity' => '',
    'price' => '',
];

$errors = [
    'title' => "",
    'description' => "",
    'quantity' => "",
    'price' => "",
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = array_merge($product, $_POST);

    $isValid = validateProduct($product, $errors);

    if ($isValid) {
        $product = createProduct($_POST);
        header("Location: listing.php");
    }
}

?>

<?php include '_form.php' ?>
