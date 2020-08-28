<?php

function getProducts()
{
    return json_decode(file_get_contents(__DIR__ . '/products.json'), true);
}

function getProductById($id)
{
    $products = getproducts();
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

function createProduct($data)
{
    $products = getProducts();

    $data['id'] = rand(100, 10000);

    $products[] = $data;

    putJson($products);

    return $data;
}

function updateProduct($data, $id)
{
    $updateProduct = [];
    $products = getProducts();
    foreach ($products as $i => $product) {
        if ($product['id'] == $id) {
            $products[$i] = $updateProduct = array_merge($product, $data);
        }
    }

    putJson($products);

    return $updateProduct;
}

function deleteProduct($id)
{
    $products = getProducts();

    foreach ($products as $i => $product) {
        if ($product['id'] == $id) {
            array_splice($products, $i, 1);
        }
    }

    putJson($products);
}

function putJson($products)
{
    file_put_contents(__DIR__ . '/products.json', json_encode($products, JSON_PRETTY_PRINT));
}

function validateproduct($product, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$product['title']) {
        $isValid = false;
        $errors['title'] = 'Title is mandatory';
    }
    if (!filter_var($product['quantity'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['quantity'] = 'This must be a valid number';
    }

    if (!filter_var($product['price'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['price'] = 'This must be a valid number';
    }
    // End Of validation

    return $isValid;
}
