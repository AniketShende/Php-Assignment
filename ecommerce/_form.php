<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="text-center">
                <?php if ($product['id']): ?>
                    Update Product <b><?php echo $product['title'] ?></b>
                <?php else: ?>
                    Create new Product
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Title <span style="color:red;">*</span></label>
                    <input name="title" value="<?php echo $product['title'] ?>"
                           class="form-control <?php echo $errors['title'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['title'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input name="description" value="<?php echo $product['description'] ?>"
                           class="form-control <?php echo $errors['description'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['description'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantity <span style="color:red;">*</span></label>
                    <input name="quantity" value="<?php echo $product['quantity'] ?>"
                           class="form-control  <?php echo $errors['quantity'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['quantity'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Price <span style="color:red;">*</span></label>
                    <input name="price" value="<?php echo $product['price'] ?>"
                           class="form-control  <?php echo $errors['price'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['price'] ?>
                    </div>
                </div>
              <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
