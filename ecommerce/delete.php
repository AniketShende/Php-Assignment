<?php
include 'partials/header.php';
require __DIR__ . '/products/products.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$productId = $_POST['id'];
deleteproduct($productId);

header("Location: listing.php");
