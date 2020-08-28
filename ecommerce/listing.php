<?php
require 'products/products.php';

$products = getProducts();

include 'partials/header.php';
?>


<div class="container">
  <h2 class="mt-5 text-center">All Products</h2>
    <table class="table mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td><?php echo $product['quantity'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td>

                  <?php echo $product_prc = $product['quantity'] * $product['price'] ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <tr>
              <?php  $total += $product_prc ?>
            </tr>

        <?php endforeach; ?>
        <tr>
          <td colspan="5">Total</td>
          <td colspan="2"><?php echo $total  ?></td>
        </tr>
        </tbody>
    </table>
    <p>
        <a class="btn btn-success" href="index.php">Create new Product</a>
    </p>
</div>

<?php include 'partials/footer.php' ?>
