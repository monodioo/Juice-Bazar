<div class="page-section card col-12 p-5">
    <div class="section-title"><?= $sectionTitle ?></div>
    <div class="px-5">
        <table class="table table-hover table-striped" id='prodEditTable'>
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
                            <input class="form-control" type="text" disabled value="<?= $products[0]['ProductId'] ?>">
                            <input class="form-control" type="hidden" name="ProductId" value="<?= $products[0]['ProductId'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Name</td>
                        <td colspan="3">
                            <input class="form-control" type="text" name="Name" value="<?= $products[0]['Name'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Image</td>
                        <td colspan="3">
                            <img class="img-fluid" src="../../<?= $products[0]['Image']; ?>" alt="<?= $products[0]['Name']; ?>" style="width:200px">
                            <input class="" type="hidden" name="ImageCheck" value="<?= $products[0]['Image'] ?>">
                            <input class="form-control-file" type="file" name="Image">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Category</td>
                        <td colspan="3">
                            <select class="custom-select" name="TypeId" value=<?= $products[0]['TypeId'] ?>>
                                <option value='1' <?= ($products[0]['TypeId'] == 1) ? 'selected' : '' ?>>1.Fruits</option>
                                <option value='2' <?= ($products[0]['TypeId'] == 2) ? 'selected' : '' ?>>2.Greens</option>
                                <option value='3' <?= ($products[0]['TypeId'] == 3) ? 'selected' : '' ?>>3.Combo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Description</td>
                        <td colspan="3">
                            <textarea name="Description" id="Description" style="width:100%"><?= $products[0]['Description']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Nutrition</td>
                        <td colspan="3">
                            <textarea name="Nutrition" id="Nutrition" style="width:100%"><?= $products[0]['Nutrition']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Product by Capacity</td>
                        <th scope="col" style="width: 25%">250ml</th>
                        <th scope="col" style="width: 25%">330ml</th>
                        <th scope="col" style="width: 25%">Both</th>
                    </tr>
                    <tr>
                        <td scope="col">Entry Price</td>
                        <td>
                            <div class="input-group">
                                <input class="form-control mr-0" type="number" name="EntryPrice1" value="<?= $products[0]['EntryPrice1'] ?>" min=0 step=500 style="width: 100px" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">₫</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input class="form-control mr-0" type="number" name="EntryPrice2" value="<?= $products[0]['EntryPrice2'] ?>" min=0 step=500 style="width: 100px" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">₫</span>
                                </div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="col">SalePrice</td>
                        <td>
                            <div class="input-group">
                                <input class="form-control mr-0" type="number" name="Price1" value="<?= $products[0]['Price1'] ?>" min=0 step=500 style="width: 100px" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">₫</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input class="form-control mr-0" type="number" name="Price2" value="<?= $products[0]['Price2'] ?>" min=0 step=500 style="width: 100px" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">₫</span>
                                </div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="col">Available Quantity</td>
                        <td>
                            <input class="form-control" type="number" value="<?= $products[0]['Available1'] ?>" disabled>
                            <input class="form-control" type="hidden" name="Available1" value="<?= $products[0]['Available1'] ?>">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="<?= $products[0]['Available2'] ?>" disabled>
                            <input class="form-control" type="hidden" name="Available2" value="<?= $products[0]['Available2'] ?>">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="<?= $products[0]['Available']  ?>" disabled>
                            <input class="form-control" type="hidden" name="Available" value="<?= $products[0]['Available']  ?>">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Shipping Quantity</td>
                        <td><input class="form-control" type="number" name="Shipping1" value="<?= $products[0]['Shipping1'] ?>" disabled></td>
                        <td><input class="form-control" type="number" name="Shipping2" value="<?= $products[0]['Shipping2'] ?>" disabled></td>
                        <td><input class="form-control" type="number" name="Shipping" value="<?= $products[0]['Shipping'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td scope="col">Sold Quantity</td>
                        <td><input class="form-control" type="number" name="Sold1" value="<?= $products[0]['Sold1'] ?>" disabled></td>
                        <td><input class="form-control" type="number" name="Sold2" value="<?= $products[0]['Sold2'] ?>" disabled></td>
                        <td><input class="form-control" type="number" name="Sold" value="<?= $products[0]['Sold'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td scope="col">Total Quantity</td>
                        <td><input class="form-control" type="number" name="Total1" value="<?= $products[0]['Available1'] + $products[0]['Shipping1'] + $products[0]['Sold1'] ?>" disabled></td>
                        <td><input class="form-control" type="number" name="Total2" value="<?= $products[0]['Available2'] + $products[0]['Shipping2'] + $products[0]['Sold2'] ?>" disabled></td>
                        <td><input class="form-control" type="number" name="Total" value="<?= $products[0]['Available'] + $products[0]['Shipping'] + $products[0]['Sold'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td scope="col">New Quantity</td>
                        <td><input class="form-control" type="number" name="New1" id="newQty1" value="0" min=0></td>
                        <td><input class="form-control" type="number" name="New2" id="newQty2" value="0" min=0></td>
                        <td>
                            <input class="form-control" type="number" id="newQty" value="0" disabled>
                            <input class="form-control" type="hidden" name="New" id="newQtyHidden" value="0">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Status</td>
                        <td colspan="3">
                            <select class="custom-select" name="Status" value=<?= $products[0]['Status'] ?>>
                                <option value='0' <?= ($products[0]['Status'] == 0) ? 'selected' : '' ?>>Disabled</option>
                                <option value='1' <?= ($products[0]['Status'] == 1) ? 'selected' : '' ?>>Enabled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Action</td>
                        <td colspan=3>
                            <button class="btn btn-warning text-white" type="submit" name="SubmitProductBtn">Save</button>
                            <a class="btn btn-danger text-white delete-product <?= ($products[0]['Existed'] > 0 || empty($products[0]['ProductId'])) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-element-id="<?= $products[0]['ProductId'] ?>" data-element-name="<?= $products[0]['Name'] ?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center">
                            <a class="btn btn-primary text-white" href="admin-products.php">
                                Go back to Products List
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
                            <form method="post" action="../include/snippets/products-delete.php">
                                <input class="form-control" type="hidden" name="deleteElement" id="deleteElement" value="">
                                <button type="submit" name="deleteElementBtn" class="btn btn-danger">Delete</button>
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