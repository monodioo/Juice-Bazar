<div class="page-section card col-12 p-5">
    <div class="section-title"><?= $sectionTitle ?></div>
    <div>
        <table class="table table-hover table-striped table-responsive" id='prodEditTable'>
            <thead>
                <tr>
                    <th scope="col" style="width:10%"><span onclick='sortTable("Name");'>Name</span></th>
                    <th scope="col" style="width:6%">Image</th>
                    <th scope="col" style="width:5%">Category</th>
                    <th scope="col" style="width:15%">Description</th>
                    <th scope="col" style="width:15%">Nutrition</th>
                    <th scope="col">Price 250ml</th>
                    <th scope="col">Price 330ml</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <form enctype="multipart/form-data" method="post" action="">
                            <td><input type="text" name="Name" value="<?= $product['Name']; ?>" required>
                                <input type="hidden" name="ProductId" value="<?= $product['ProductId'] ?>"></td>
                            <td><img class="img-fluid" src="../../<?= $product['Image']; ?>" alt="<?= $product['Name']; ?>">
                                <input type="hidden" name="ImageCheck" value="<?= $product['Image'] ?>">
                                <input type="file" name="Image" style="width:200px">
                            </td>
                            <td>
                                <select name="TypeId" value=<?= $product['TypeId'] ?>>
                                    <option value='1' <?= ($product['TypeId'] == 1) ? 'selected' : '' ?>>1.Fruits</option>
                                    <option value='2' <?= ($product['TypeId'] == 2) ? 'selected' : '' ?>>2.Greens</option>
                                    <option value='3' <?= ($product['TypeId'] == 3) ? 'selected' : '' ?>>3.Combo</option>
                                </select>
                            </td>
                            <td><textarea name="Description" rows=10><?= $product['Description']; ?></textarea></td>
                            <td>
                                <textarea name="Nutrition" rows=10><?= $product['Nutrition']; ?></textarea>
                            </td>
                            <td><input type="number" name="Price1" value="<?= $product['Price1'] ?>" min=0 step=500 style="width: 100px" required>₫</td>
                            <td><input type="number" name="Price2" value="<?= $product['Price2'] ?>" min=0 step=500 style="width: 100px" required>₫</td>
                            <td>
                                <select name="Status" value=<?= $product['Status'] ?>>
                                    <option value='0' <?= ($product['Status'] == 0) ? 'selected' : '' ?>>Disabled</option>
                                    <option value='1' <?= ($product['Status'] == 1) ? 'selected' : '' ?>>Enabled</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm mb-1 text-white" type="submit" name="SubmitProduct">Save</button>
                                <br>
                        </form>
                        <!-- <button class="btn btn-<?= ($product['Status'] == 1) ? 'secondary' : 'success' ?> btn-sm mb-1" action="disableSwitch.php?productId=<?= $product['ProductId'] ?>"><?= ($product['Status'] == 1) ? 'Disable' : 'Enable' ?></button>
                            <br> -->
                        <a class="btn btn-danger btn-sm text-white delete-product <?= ($product['Sold'] + $product['Pending'] > 0) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-product-id="<?= $product['ProductId'] ?>" data-product-name="<?= $product['Name'] ?>">
                            Delete
                        </a>

                    </tr>
                <?php endforeach; ?>
                <!-- Modal -->
                <div class=" modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span>Are you sure you want to delete the Product: </span>
                                <span class="modal-text font-weight-bold"></span>
                                <span>?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form method="post" action="products-delete.php">
                                    <input type="hidden" name="deleteProduct" id="deleteProduct" value="">
                                    <button type="submit" name="deleteProductBtn" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Modal -->
            </tbody>
        </table>
    </div>
</div>