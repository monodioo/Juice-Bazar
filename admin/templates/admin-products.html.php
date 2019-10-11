<div class="page-section card col-12 p-5">
    <div class="section-title">Quản lý sản phẩm</div>
    <div>
        <table class="table table-hover table-striped table-responsive tablesorter " id='prodTable'>
            <thead>
                <tr>
                    <th scope="col" rowspan="2">#</th>
                    <th scope="col" rowspan="2" style="width:5%"><span onclick='sortTable("Name");'>Name</span></th>
                    <th scope="col" rowspan="2" style="width:6%" class="sorter-false filter-false">Image</th>
                    <th scope="col" rowspan="2" style="width:10%">Description</th>
                    <th scope="col" rowspan="2" style="width:10%">Nutrition</th>
                    <th scope="col" colspan="2" class="sorter-false filter-false">Price</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Total Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Sold Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false filter-false">Avail. Qty.</th>
                    <th scope="col" rowspan="2" class="filter-select filter-exact" data-placeholder="Pick a Status">Status</th>
                    <th scope="col" rowspan="2" class="sorter-false filter-false">Action</th>
                </tr>
                <tr>
                    <th scope="col" class="filter-false">250ml</th>
                    <th scope="col" class="filter-false">330ml</th>
                    <th scope="col" class="filter-false">250ml</th>
                    <th scope="col" class="filter-false">330ml</th>
                    <th scope="col" class="filter-false">Both</th>
                    <th scope="col" class="filter-false">250ml</th>
                    <th scope="col" class="filter-false">330ml</th>
                    <th scope="col" class="filter-false">Both</th>
                    <th scope="col" class="filter-false">250ml</th>
                    <th scope="col" class="filter-false">330ml</th>
                    <th scope="col" class="filter-false">Both</th>
                </tr>
            </thead>

            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($products as $product) : ?>
                    <?php $count++; ?>
                    <tr>
                        <th scope="row"><?= $count; ?></th>
                        <td><?= $product['Name']; ?></td>
                        <td><img class="img-fluid" src="../../<?= $product['Image']; ?>" alt="<?= $product['Name']; ?>"></td>
                        <td><?= $product['Description']; ?></td>
                        <td>
                            <div class="overflow-auto" style="height:200px"><?= $product['Nutrition']; ?></div>
                        </td>
                        <td><?= number_format($product['Price1'], 0, '', '.'); ?>₫</td>
                        <td><?= number_format($product['Price2'], 0, '', '.'); ?>₫</td>
                        <td><?= $product['Total1']; ?></td>
                        <td><?= $product['Total2']; ?></td>
                        <td class="font-weight-bold"><?= $product['Total']; ?></td>
                        <td><?= $product['Sold1']; ?></td>
                        <td><?= $product['Sold2']; ?></td>
                        <td class="font-weight-bold"><?= $product['Sold']; ?></td>
                        <td><?= $product['Total1'] - $product['Sold1'] ?></td>
                        <td><?= $product['Total2'] - $product['Sold2'] ?></td>
                        <td class="font-weight-bold"><?= $product['Total'] - $product['Sold'] ?></td>
                        <td><?php if ($product['Status'] == 0) {
                                    echo 'Disabled';
                                } else {
                                    echo 'Enabled';
                                } ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm mb-1">Edit</button>
                            <br>
                            <button class="btn btn-secondary btn-sm mb-1" action="disable.php?productId=<?= $product['ProductId'] ?>">Disable</button>
                            <br>
                            <button class="btn btn-danger btn-sm" action="delete.php?productId=<?= $product['ProductId'] ?>" <?= ($product['Sold'] + $product['Pending'] > 0) ? 'disabled' : ''; ?> <?= $product['Sold'] ?> <?= $product['Pending']; ?>>Delete</button></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="18" class="ts-pager">
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
                                <option selected="selected" value="10">10</option>
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
    </div>
</div>