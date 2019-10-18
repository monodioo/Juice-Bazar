<div class="page-section card col-12 py-2">
    <div class="section-title pb-2">Products List</div>
    <div class="table-wrapper">
        <table class="table table-hover table-striped table-sm tablesorter" id='prodTable'>
            <thead>
                <tr>
                    <th scope="col" rowspan="2">ID</th>
                    <th scope="col" rowspan="2" style="width:5%">Name</th>
                    <th scope="col" rowspan="2" style="width:6%" class="sorter-false filter-false">Image</th>
                    <th scope="col" rowspan="2" style="width:5%" class="filter-select filter-exact" data-placeholder="All Categories">Category</th>
                    <th scope="col" rowspan="2" class="sorter-false">Description</th>
                    <th scope="col" rowspan="2" class="sorter-false">Nutrition</th>
                    <th scope="col" colspan="2" class="sorter-false filter-false">Entry Price</th>
                    <th scope="col" colspan="2" class="sorter-false filter-false">Sale Price</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Avail. Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Shipping Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Sold Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Total Qty.</th>
                    <th scope="col" rowspan="2" class="filter-select filter-exact" data-placeholder="Pick a Status">Status</th>
                    <th scope="col" rowspan="2" class="sorter-false filter-false">Action</th>
                </tr>
                <tr>
                    <th scope="col" class="filter-exact">250ml</th>
                    <th scope="col" class="filter-exact">330ml</th>
                    <th scope="col" class="filter-exact">250ml</th>
                    <th scope="col" class="filter-exact">330ml</th>
                    <th scope="col" class="filter-exact">250ml</th>
                    <th scope="col" class="filter-exact">330ml</th>
                    <th scope="col" class="filter-exact">Both</th>
                    <th scope="col" class="filter-exact">250ml</th>
                    <th scope="col" class="filter-exact">330ml</th>
                    <th scope="col" class="filter-exact">Both</th>
                    <th scope="col" class="filter-exact">250ml</th>
                    <th scope="col" class="filter-exact">330ml</th>
                    <th scope="col" class="filter-exact">Both</th>
                    <th scope="col" class="filter-exact">250ml</th>
                    <th scope="col" class="filter-exact">330ml</th>
                    <th scope="col" class="filter-exact">Both</th>
                </tr>
            </thead>

            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($products as $product) : ?>
                    <!-- <?php $count++; ?> -->
                    <tr>
                        <th scope="row"><?= $product['ProductId'] ?></th>
                        <td><?= $product['Name']; ?></td>
                        <td><img class="img-fluid" src="../../<?= $product['Image']; ?>" alt="<?= $product['Name']; ?>"></td>
                        <td><?php switch ($product['TypeId']) {
                                    case 1:
                                        echo '1.Fruits';
                                        break;
                                    case 2:
                                        echo '2.Greens';
                                        break;
                                    case 3:
                                        echo '3.Combo';
                                        break;
                                }; ?></td>
                        <td><?= $product['Description']; ?></td>
                        <td>
                            <div class="overflow-auto" style="height:80px; width: 200px"><?= $product['Nutrition']; ?></div>
                        </td>
                        <td><?= number_format($product['EntryPrice1'], 0, '', '.'); ?>₫</td>
                        <td><?= number_format($product['EntryPrice2'], 0, '', '.'); ?>₫</td>
                        <td><?= number_format($product['Price1'], 0, '', '.'); ?>₫</td>
                        <td><?= number_format($product['Price2'], 0, '', '.'); ?>₫</td>
                        <td><?= $product['Available1']; ?></td>
                        <td><?= $product['Available2']; ?></td>
                        <td class="font-weight-bold"><?= $product['Available']; ?></td>
                        <td><?= $product['Shipping1']; ?></td>
                        <td><?= $product['Shipping2']; ?></td>
                        <td class="font-weight-bold"><?= $product['Shipping']; ?></td>
                        <td><?= $product['Sold1'] ?></td>
                        <td><?= $product['Sold2'] ?></td>
                        <td class="font-weight-bold"><?= $product['Sold'] ?></td>
                        <td><?= $product['Available1'] + $product['Shipping1'] + $product['Sold1'] ?></td>
                        <td><?= $product['Available2'] + $product['Shipping2'] + $product['Sold2'] ?></td>
                        <td class="font-weight-bold"><?= $product['Available'] + $product['Shipping'] + $product['Sold'] ?></td>
                        <td><?= ($product['Status'] == 0) ? 'Disabled' : 'Enabled' ?></td>
                        <td>
                            <a class="btn btn-warning btn-block btn-sm mb-1 text-white" href="products-edit.php?id=<?= $product['ProductId'] ?>">Edit</a>
                            <form action="productStatusSwitch.php" method="post">
                                <button type="submit" class="btn btn-<?= ($product['Status'] == 1) ? 'secondary' : 'success' ?> btn-block btn-sm mb-1" name="switchProductBtn"><?= ($product['Status'] == 1) ? 'Disable' : 'Enable' ?></button>
                                <input type="hidden" name="switchProductId" value="<?= $product['ProductId'] ?>">
                                <input type="hidden" name="switchProductStatus" value="<?= $product['Status'] ?>">
                            </form>
                            <a class="btn btn-danger btn-block btn-sm text-white delete-product <?= ($product['Existed'] > 0) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-element-id="<?= $product['ProductId'] ?>" data-element-name="<?= $product['Name'] ?> ">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="24" class="ts-pager">
                        <div class="form-inline">
                            <div class="btn-group btn-group-sm mx-1" role="group">
                                <button type="button" class="btn btn-secondary first" title="first">⇤</button>
                                <button type="button" class="btn btn-secondary prev" title="previous">←</button>
                            </div>
                            <span class="pagedisplay"></span>
                            <div class="btn-group btn-group-sm mx-1" role="group">
                                <button type="button" class="btn btn-secondary next" title="next">→</button>
                                <button type="button" class="btn btn-secondary last" title="last">⇥</button>
                            </div>
                            <select class="form-control-sm custom-select px-1 pagesize" title="Select page size">
                                <option selected="selected" value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="all">All Rows</option>
                            </select>
                            <select class="form-control-sm custom-select px-4 mx-1 pagenum" title="Select page number"></select>
                        </div>
                    </th>
                </tr>
            </tfoot>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="deleteProduct" id="deleteElement" value="">
                            <button type="submit" name="deleteProductBtn" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    </div>
</div>