<div class="page-section card col-12 p-5">
    <div class="section-title"><?= $sectionTitle ?></div>
    <div class="px-5">
        <form method="post" action="" id='formOrderProduct'>
            <table class="table table-hover table-striped" id='prodEditTable'>
                <thead>
                    <tr>
                        <th scope="col" width=15%>Key</th>
                        <th scope="col" colspan="6">Info</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr>
                        <td scope="col">Member Name</td>
                        <td colspan="6">
                            <select name="MemberId" class="custom-select product-select" required>
                                <option disabled>Select Member</option>
                                <?php foreach ($members as $member) : ?>
                                    <option value="<?= $member['MemberId']; ?>">
                                        <?= $member['Name'] . ' - ' . $member['Phone']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Purchase Date</td>
                        <td colspan="6">
                            <input class="form-control" name="PurchaseDate" type="datetime-local" required>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle">Delivery Date</td>
                        <td colspan="6">
                            <input class="form-control" name="DeliveryDate" type="datetime-local">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 20%">Order's products</td>
                        <td style="width: 25%">Change Product</td>
                        <td>Category</td>
                        <td style="width: 15%">Sale Price</td>
                        <td>Quantity</td>
                        <td style="width: 15%">Total Price</td>
                        <td></td>
                    </tr>
                    <tr>

                        <td colspan="7" class="text-center"><a class="btn btn-primary btn-link text-white" id="addProductBtn">Add Item</a></td>
                    </tr>
                    <tr>
                        <td scope="col">Subtotal Value</td>
                        <td colspan="4">
                        </td>
                        <td colspan="2">
                            <span class="product-subtotal"> </span> ₫
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle">Promotion Code</td>
                        <td colspan="2">
                            <select name="PromoId" class="custom-select promo-select" value="">
                                <option>None</option>
                                <?php foreach ($promos as $promo) : ?>
                                    <option value="<?= $promo['PromoId']; ?>">
                                        <?= $promo['PromoName'] . ' - ' . $promo['PromoValue'] * 100 . '%'; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="align-middle">
                            Value (%)</td>
                        <td>
                            <input class="form-control promo-value" type="text" disabled value="0">
                        </td>
                        <td class="align-middle" colspan="2">
                            -<span class="product-discount"> </span>₫
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Total Value</td>
                        <td colspan="4">
                        </td>
                        <td colspan="2">
                            <span class="product-total font-weight-bold"> </span><strong>₫</strong>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Note</td>
                        <td colspan="6">
                            <input class="form-control" name="Note" type="text" value="">
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Status</td>
                        <td colspan="6">
                            <select class="custom-select" name="Status" value="" required>
                                <option value="0" selected>0.Pending</option>
                                <option value="1">1.Processing</option>
                                <option value="2">2.Shipping</option>
                                <option value="3">3.Completed</option>
                                <!-- <option value="4" >4.Cancelled</option> -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-center">
                            <button class="btn btn-warning text-white px-3 mr-3" type="submit" name="EditOrderBtn">Save</button>
                            <a class="btn btn-primary text-white" href="admin-orders.php">
                                Cancel
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>

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


    </div>
</div>