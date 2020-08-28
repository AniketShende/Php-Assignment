<?php
include 'partials/header.php';
require __DIR__ . '/products/products.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$productId = $_GET['id'];

$product = getProductById($productId);
if (!$product) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'title' => "",
    'description' => "",
    'quantity' => "",
    'price' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = array_merge($product, $_POST);

    $isValid = validateProduct($product, $errors);

    if ($isValid) {
        $product = updateProduct($_POST, $productId);
        header("Location: listing.php");
    }
}

?>

<?php include '_form.php' ?>
