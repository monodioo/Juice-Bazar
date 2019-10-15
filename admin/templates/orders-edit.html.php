<div class="page-section card col-12 p-5">
    <div class="section-title"><?= $sectionTitle ?></div>
    <div class="px-5">
        <table class="table table-hover table-striped" id='prodEditTable'>
            <thead>
                <tr>
                    <th scope="col" width=15%>Key</th>
                    <th scope="col" colspan="5">Info</th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="">
                    <tr>
                        <td scope="col">Order ID</td>
                        <td colspan="5">
                            <?= $orders[0]['OrderId'] ?>
                            <input class="form-control" type="hidden" name="OrderId" value="<?= $orders[0]['OrderId'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Member Name</td>
                        <td colspan="5">
                            <a class="admin-link" href="member-edit.php?id=<?= $orders[0]['MemberId'] ?>"><?= $orders[0]['MemberName'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Order Date</td>
                        <td colspan="5">
                            <?= date_format(date_create($orders[0]['PurchaseDate']), 'M-d-Y H:i') ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Delivery Date</td>
                        <td colspan="5">
                            <input class="form-control" name="DeliveryDate" type="datetime-local" value="<?php if ($orders[0]['DeliveryDate'] == '') {
                                                                                                                echo '';
                                                                                                            } else {
                                                                                                                echo date_format(date_create($orders[0]['DeliveryDate']), 'Y-m-d\TH:i:s');
                                                                                                            } ?>">
                        </td>
                    </tr>

                    <tr>
                        <td scope="col">Order`s products</td>
                        <td>Product</td>
                        <td>Category</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Subtotal Price</td>
                    </tr>
                    <?php $countItem = 0; ?>
                    <?php foreach ($orders[0]['Items'] as $item) : ?>
                        <tr>
                            <td>#<?= ++$countItem ?> </td>
                            <td><a href="products-edit.php?id=<?= $item['ProductId'] ?>"><?= $item['Name'] ?></td>
                            <td><?= $item['Type']; ?></td>
                            <td><?= number_format($item['Price']) ?> ₫</td>
                            <td><?= $item['Quantity']; ?></td>
                            <td><?= number_format($item['Price'] * $item['Quantity']) ?> ₫</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td scope="col">Subtotal Value</td>
                        <td colspan="5">
                            <?= number_format($orders[0]['TotalPrice']) ?> ₫
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Promotion</td>
                        <td colspan="3">
                            <input class="form-control" type="text" disabled value="Name: <?= $orders[0]['PromoName'] ?>">
                            <input class="form-control" type="hidden" name="PromoId" value="<?= $orders[0]['PromoId'] ?>">
                        </td>
                        <td colspan="2">
                            <input class="form-control" type="text" disabled value="Discount:  <?= $orders[0]['PromoValue'] * 100 ?>%">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Total Value</td>
                        <td colspan="5">
                            <?= number_format($orders[0]['TotalPrice'] * (1 - $orders[0]['PromoValue'])) ?> ₫
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Note</td>
                        <td colspan="5">
                            <input class="form-control" name="Note" type="text" value="<?= $orders[0]['Note'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Status</td>
                        <td colspan="5">
                            <select class="custom-select" name="Status" value="<?= $orders[0]['Status'] ?>">
                                <option value="0" <?= $orders[0]['Status'] > 0 ? 'disabled' : '' ?> <?= $orders[0]['Status'] == 0 ? 'selected' : '' ?>>0.Processed</option>
                                <option value="1" <?= $orders[0]['Status'] >= 1 ? 'disabled' : '' ?> <?= $orders[0]['Status'] == 1 ? 'selected' : '' ?>>1.Processing</option>
                                <option value="2" <?= $orders[0]['Status'] >= 2 ? 'disabled' : '' ?> <?= $orders[0]['Status'] == 2 ? 'selected' : '' ?>>2.Shipping</option>
                                <option value="3" <?= $orders[0]['Status'] >= 3 ? 'disabled' : '' ?> <?= $orders[0]['Status'] == 3 ? 'selected' : '' ?>>3.Completed</option>
                                <option value="4" <?= $orders[0]['Status'] == 3 ? 'disabled' : '' ?> <?= $orders[0]['Status'] == 4 ? 'selected' : '' ?>>4.Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Action</td>
                        <td colspan="5"><button class="btn btn-warning text-white" type="submit" name="EditOrderBtn">Save</button>
                            <a class="btn btn-danger text-white delete-product <?= ($orders[0]['Status'] != 4) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-element-id="<?= $orders[0]['OrderId'] ?>" data-element-name="<?= $orders[0]['OrderId'] ?>">
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>Are you sure you want to delete the Order No.: </span>
                            <span class="modal-text font-weight-bold"></span>
                            <span>?</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="post" action="orders-delete.php">
                                <input class="form-control" type="hidden" name="deleteOrder" id="deleteElement" value="">
                                <button type="submit" name="deleteOrderBtn" class="btn btn-danger">Delete</button>
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