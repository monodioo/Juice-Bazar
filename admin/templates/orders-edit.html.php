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
                        <td scope="col" class="align-middle">Delivery Date</td>
                        <td colspan="5">
                            <input class="form-control" name="DeliveryDate" type="datetime-local" value="<?php if ($orders[0]['DeliveryDate'] == '') {
                                                                                                                echo '';
                                                                                                            } else {
                                                                                                                echo date_format(date_create($orders[0]['DeliveryDate']), 'Y-m-d\TH:i:s');
                                                                                                            } ?>">
                        </td>
                    </tr>

                    <tr>
                        <td scope="col" style="width: 20%">Order's products</td>
                        <td style="width: 25%">Change Product</td>
                        <td>Category</td>
                        <td style="width: 15%">Sale Price</td>
                        <td>Quantity</td>
                        <td style="width: 15%">Total Price</td>
                    </tr>
                    <?php $countItem = 0; ?>
                    <?php foreach ($orders[0]['Items'] as $item) : ?>
                        <tr class="product-item">
                            <td class="align-middle"><a href="products-edit.php?id=<?= $item['ProductId'] ?>"><?= $item['Name'] ?>&nbsp;(<?= $item['CapacityId'] - 1 ? "330ml" : "250ml" ?>)</td>
                            <td><select name="newProduct" class="custom-select product-select">
                                    <option disabled="">Select New Product</option>
                                    <?php foreach ($orders[0]['List'] as $list) : ?>
                                        <option value="<?= $list['ProductDetailId']; ?>" <?= ($item['ProductDetailId'] == $list['ProductDetailId']) ? 'selected' : '' ?>>
                                            <?= $list['Name']; ?> <?= ($list['CapacityId'] == 1) ? "250ml" : "330ml" ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="align-middle product-type"><?= $item['Type']; ?></td>
                            <td class="align-middle"><span class="product-price"><?= number_format($item['SalePrice'], 0, ",", ".") ?></span> ₫</td>
                            <td>
                                <input type="number" min=1 max=100 class="form-control product-quantity" name="Quantity" value="<?= $item['Quantity']; ?>">
                            </td>
                            <td class="align-middle"><span class="product-totalPrice"><?= number_format($item['SalePrice'] * $item['Quantity'], 0, ",", ".") ?></span> ₫</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="6" class="text-center"><button class="btn btn-primary" id="addProductBtn">Add more Item</button></td>
                    </tr>
                    <tr>
                        <td scope="col">Subtotal Value</td>
                        <td colspan="4">
                        </td>
                        <td>
                            <span class="product-subtotal"><?= number_format($orders[0]['subTotalValue'], 0, ",", ".") ?> </span> ₫
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle">Promotion Code</td>
                        <td colspan="2">
                            <input class="form-control" type="text" disabled value="<?= $orders[0]['PromoName'] ?>">
                            <input class="form-control product-promo" type="hidden" name="PromoId" value="<?= $orders[0]['PromoId'] ?>">
                        </td>
                        <td class="align-middle">
                            Value</td>
                        <td>
                            <input class="form-control product-promovalue" type="text" disabled value="<?= $orders[0]['PromoValue'] * 100 ?>%">
                        </td>
                        <td class="align-middle">
                            -<span class="product-discount"><?= number_format($orders[0]['PromoValue'] * $orders[0]['subTotalValue'], 0, ",", ".") ?> </span>₫
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Total Value</td>
                        <td colspan="4">
                        </td>
                        <td>
                            <span class="product-total font-weight-bold"> <?= number_format($orders[0]['subTotalValue'] * (1 - $orders[0]['PromoValue']), 0, ",", ".") ?> </span><strong>₫</strong>
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
                                <option value="0" <?= $orders[0]['Status'] == 0 ? 'selected' : '' ?>>0.Pending</option>
                                <option value="1" <?= $orders[0]['Status'] == 1 ? 'selected' : '' ?>>1.Processing</option>
                                <option value="2" <?= $orders[0]['Status'] == 2 ? 'selected' : '' ?>>2.Shipping</option>
                                <option value="3" <?= $orders[0]['Status'] == 3 ? 'selected' : '' ?>>3.Completed</option>
                                <option value="4" <?= $orders[0]['Status'] == 4 ? 'selected' : '' ?>>4.Cancelled</option>
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
                    <td colspan="6" class="text-center">
                        <a class="btn btn-primary text-white" href="admin-orders.php">
                            Go back to Orders List
                        </a>
                    </td>
                    <tr>
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