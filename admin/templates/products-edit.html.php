<div class="page-section card col-12 p-5">
    <div class="section-title"><?= $sectionTitle ?></div>
    <div class="px-5">
        <table class="table table-hover table-striped table-md-responsive" id='prodEditTable'>
            <thead>
                <tr>
                    <th scope="col" width=15%>Information</th>
                    <th scope="col" colspan="3">Value</th>
                </tr>
            </thead>
            <tbody>
                <form enctype="multipart/form-data" method="post" action="">
                    <tr>
                        <td scope="col">ID</td>
                        <td colspan="3">
                            <input type="text" disabled name="ProductId" value="<?= $products[0]['ProductId'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Name</td>
                        <td colspan="3">
                            <input type="text" name="Name" value="<?= $products[0]['Name'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Image</td>
                        <td colspan="3">
                            <img class="img-fluid" src="../../<?= $products[0]['Image']; ?>" alt="<?= $products[0]['Name']; ?>" style="width:200px">
                            <input type="hidden" name="ImageCheck" value="<?= $products[0]['Image'] ?>">
                            <input type="file" name="Image">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Category</td>
                        <td colspan="3">
                            <select name="TypeId" value=<?= $products[0]['TypeId'] ?>>
                                <option value='1' <?= ($products[0]['TypeId'] == 1) ? 'selected' : '' ?>>1.Fruits</option>
                                <option value='2' <?= ($products[0]['TypeId'] == 2) ? 'selected' : '' ?>>2.Greens</option>
                                <option value='3' <?= ($products[0]['TypeId'] == 3) ? 'selected' : '' ?>>3.Combo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Description</td>
                        <td colspan="3">
                            <textarea name="Description" style="width:100%"><?= $products[0]['Description']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Nutrition</td>
                        <td colspan="3">
                            <textarea name="Nutrition" style="width:100%"><?= $products[0]['Nutrition']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Product by Capacity</td>
                        <th scope="col">250ml</th>
                        <th scope="col">330ml</th>
                        <th scope="col">Both</th>
                    </tr>
                    <tr>
                        <td scope="col">Price</td>
                        <td><input type="number" name="Price1" value="<?= $products[0]['Price1'] ?>" min=0 step=500 style="width: 100px" required>₫</td>
                        <td><input type="number" name="Price2" value="<?= $products[0]['Price2'] ?>" min=0 step=500 style="width: 100px" required>₫</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="col">Total Quantity</td>
                        <td><input type="number" name="Total1" value="<?= $products[0]['Total1'] ?>" disabled></td>
                        <td><input type="number" name="Total2" value="<?= $products[0]['Total2'] ?>" disabled></td>
                        <td><input type="number" name="Total" value="<?= $products[0]['Total'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td scope="col">Sold Quantity</td>
                        <td><input type="number" name="Sold1" value="<?= $products[0]['Sold1'] ?>" disabled></td>
                        <td><input type="number" name="Sold2" value="<?= $products[0]['Sold2'] ?>" disabled></td>
                        <td><input type="number" name="Sold" value="<?= $products[0]['Sold'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td scope="col">Available Quantity</td>
                        <td><input type="number" name="Avail1" value="<?= $product['Total1'] - $product['Sold1'] ?>" disabled></td>
                        <td><input type="number" name="Avail2" value="<?= $product['Total2'] - $product['Sold2'] ?>" disabled></td>
                        <td><input type="number" name="Avail" value="<?= $product['Total'] - $product['Sold'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td scope="col">New Quantity</td>
                        <td><input type="number" name="New1" value="" min=0></td>
                        <td><input type="number" name="New2" value="" min=0></td>
                        <td><input type="number" name="New" value="" min=0></td>
                    </tr>
                    <tr>
                        <td scope="col">Status</td>
                        <td colspan="3">
                            <select name="Status" value=<?= $products[0]['Status'] ?>>
                                <option value='0' <?= ($products[0]['Status'] == 0) ? 'selected' : '' ?>>Disabled</option>
                                <option value='1' <?= ($products[0]['Status'] == 1) ? 'selected' : '' ?>>Enabled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Action</td>
                        <td colspan=3>
                            <button class="btn btn-warning btn-sm text-white" type="submit" name="SubmitProduct">Save</button>
                            <button class="btn btn-<?= ($products[0]['Status'] == 1) ? 'secondary' : 'success' ?> btn-sm " action="disableSwitch.php?productId=<?= $products[0]['ProductId'] ?>"><?= ($products[0]['Status'] == 1) ? 'Disable' : 'Enable' ?></button>
                            <a class="btn btn-danger btn-sm text-white delete-product <?= ($products[0]['Sold'] + $products[0]['Pending'] > 0) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-product-id="<?= $products[0]['ProductId'] ?>" data-product-name="<?= $products[0]['Name'] ?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                </form>
            </tbody>

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