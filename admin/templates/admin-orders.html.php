<div class="page-section card col-12 py-2">
    <div class="section-title pb-2">All Orders</div>
    <div class="table-wrapper">
        <table class="table table-hover table-striped table-sm tablesorter" id='orderTable'>
            <thead>
                <tr>
                    <th scope="col" style="" class="filter-exact">Order ID</th>
                    <th scope="col" style="width: 10%">Customer</th>
                    <th scope="col" style="width: 10%">Purchase Date</th>
                    <th scope="col" style="width: 10%">Delivery Date</th>
                    <th scope="col" style="width:5%" class="sorter-false">Product</th>
                    <th scope="col" style="" class="sorter-false">Cat.</th>
                    <th scope="col" style="width:5%" class="sorter-false filter-exact">Qty.</th>
                    <th scope="col" style="" class="sorter-false">Unit Price</th>
                    <th scope="col" style="width: 8%">Value</th>
                    <th scope="col" style="" class="filter-select filter-exact" data-placeholder="All Codes">Promotion Code</th>
                    <th scope="col" style="">Promotion Value</th>
                    <th scope="col" style="width: 5%">Total Value</th>
                    <th scope="col" style="" class="sorter-false">Note</th>
                    <th scope="col" style="" class="filter-select filter-exact" data-placeholder="All Status">Status</th>
                    <th scope="col" style="width:20%" class="sorter-false filter-false">Change Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order['OrderId'] ?></td>
                        <td><a class="admin-link" href="member-edit.php?id=<?= $order['MemberId'] ?>"><?= $order['MemberName'] ?></td>
                        <td><?= date_format(date_create($order['PurchaseDate']), 'M-d-Y H:i') ?></td>
                        <td><?php if ($order['DeliveryDate'] == '') {
                                    echo '<i>Will update when order is completed.</i>';
                                } else {
                                    echo date_format(date_create($order['DeliveryDate']), 'M-d-Y H:i');
                                } ?></td>
                        <td colspan=4 class="text-center align-middle p-0" style="width: 300px"><a href="#" class="toggle admin-link d-block h-100 py-3">
                                Click here to expand
                            </a></td>
                        <td><?= number_format($order['TotalPrice']) ?> ₫</td>
                        <td><?= empty($order['PromoName']) ?  'N/A' : $order['PromoName'] ?></td>
                        <td><?= $order['PromoValue'] * 100 ?>%</td>
                        <td><?= number_format($order['TotalPrice'] * (1 - $order['PromoValue'])) ?> ₫</td>
                        <td><?= $order['Note'] ?></td>
                        <td>
                            <?php switch ($order['Status']) {
                                    case 0:
                                        echo '0.Not processed';
                                        break;
                                    case 1:
                                        echo '1.Processing';
                                        break;
                                    case 2:
                                        echo '2.Shipping';
                                        break;
                                    case 3:
                                        echo '3.Completed';
                                        break;
                                    case 4:
                                        echo '4.Cancelled';
                                        break;
                                } ?>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm mb-1 text-white" href="orders-edit.php?id=<?= $order['OrderId'] ?>">Edit</a>
                            <form method="POST" action="orderStatusSwitch.php">
                                <select class="custom-select" name="newStatus">
                                    <option selected>Select Status</option>
                                    <option value="0" disabled <?= $order['Status'] == 0 ? 'selected' : '' ?>>0.Processed</option>
                                    <option value="1" <?= $order['Status'] >= 1 ? 'disabled' : '' ?> <?= $order['Status'] == 1 ? 'selected' : '' ?>>1.Processing</option>
                                    <option value="2" <?= $order['Status'] >= 2 ? 'disabled' : '' ?>>2.Shipping</option>
                                    <option value="3" <?= $order['Status'] >= 3 ? 'disabled' : '' ?>>3.Completed</option>
                                    <option value="4" <?= $order['Status'] > 2 ? 'disabled' : '' ?>>4.Cancelled</option>
                                </select>
                                <input type="hidden" name="oldStatus" value="<?= $order['Status'] ?>">
                                <input type="hidden" name="OrderId" value="<?= $order['OrderId'] ?>">
                                <button type="submit" class="btn btn-warning btn-sm text-white mt-1" name="OrderStatusBtn">Apply</button>
                            </form>

                        </td>
                    </tr>
                    <?php foreach ($order['Items'] as $item) : ?>
                        <tr class="tablesorter-childRow">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="products-edit.php?id=<?= $item['ProductId'] ?>"><?= $item['Name'] ?></td>
                            <td><?= $item['Type']; ?></td>
                            <td><?= $item['Quantity']; ?></td>
                            <td><?= number_format($item['Price']) ?> ₫</td>
                            <td><?= number_format($item['Price'] * $item['Quantity']) ?> ₫</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="15" class="ts-pager">
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