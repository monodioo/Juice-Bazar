<div class="page-section card col-12 p-5">
    <div class="section-title">Quản lý sản phẩm</div>
    <div>
        <table class="table table-hover table-striped tablesorter" id='prodTable'>
            <thead>
                <tr>
                    <th scope="col" rowspan="2">#</th>
                    <th scope="col" rowspan="2" style="width:5%"><span onclick='sortTable("Name");'>Name</span></th>
                    <th scope="col" rowspan="2" style="width:6%" class="sorter-false">Image</th>
                    <th scope="col" rowspan="2" style="width:10%">Description</th>
                    <th scope="col" rowspan="2" style="width:10%">Nutrition</th>
                    <th scope="col" colspan="2" class="sorter-false">Price</th>
                    <th scope="col" colspan="3" class="sorter-false">Total Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false">Sold Qty.</th>
                    <th scope="col" colspan="3" class="sorter-false">Avail. Qty.</th>
                    <th scope="col" rowspan="2">Status</th>
                    <th scope="col" rowspan="2" class="sorter-false">Action</th>
                </tr>
                <tr>
                    <th scope="col">250ml</th>
                    <th scope="col">330ml</th>
                    <th scope="col">250ml</th>
                    <th scope="col">330ml</th>
                    <th scope="col">Both</th>
                    <th scope="col">250ml</th>
                    <th scope="col">330ml</th>
                    <th scope="col">Both</th>
                    <th scope="col">250ml</th>
                    <th scope="col">330ml</th>
                    <th scope="col">Both</th>
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
                        <td><?= $product['Total']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php if ($product['Status'] == 0) {
                                    echo 'Disabled';
                                } else {
                                    echo 'Enabled';
                                } ?></td>

                        <td><button class="btn btn-warning mb-1">Edit</button><br><button class="btn btn-danger" disabled>Delete</button></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>