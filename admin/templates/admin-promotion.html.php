<div class="page-section card col-12 p-5">
    <div class="section-title">Promotion</div>
    <div class="">
        <table class="table-order table table-hover table-sm table-sm-responsive" id='typeTable'>
            <thead>
                <tr>
                    <th scope="col" style="width: 15%" class="filter-exact">Promotion ID</th>
                    <th scope="col" style="">Promotion Code</th>
                    <th scope="col" style="">Promotion Value</th>
                    <th scope="col" style="" class="filter-select filter-exact" data-placeholder="All Status">Promotion Status</th>
                    <th scope="col" style="" class="filter-false sorter-false">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promos as $promo) : ?>
                    <form method="POST">
                        <tr>
                            <td class="align-middle"><?= $promo['PromoId'] ?>
                                <input type="hidden" name="PromoId" value="<?= $promo['PromoId'] ?>">
                                <input type="hidden" name="Existed" value="<?= $promo['Existed'] ?>">
                            </td>
                            <td>
                                <input class="form-control " type="text" name="PromoName" value="<?= $promo['PromoName'] ?>" placeholder="Promotion Name" required <?= ($promo['Existed'] > 0) ? 'disabled' : ''; ?>>
                                <input type="hidden" name="OldName" value="<?= $promo['PromoName'] ?>">
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Promotion value" name="PromoValue" min=0 max=100 step=0.5 value="<?= $promo['PromoValue'] * 100 ?>" required <?= ($promo['Existed'] > 0) ? 'disabled' : ''; ?>>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <select class="custom-select" name="PromoStatus" value=<?= $promo['PromoStatus'] ?>>
                                    <option value='0' <?= ($promo['PromoStatus'] == 0) ? 'selected' : '' ?>>Disabled</option>
                                    <option value='1' <?= ($promo['PromoStatus'] == 1) ? 'selected' : '' ?>>Enabled</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" name="EditPromoBtn" class="btn btn-warning text-white">Apply Change</button>
                                <a class="btn btn-danger text-white <?= ($promo['Existed'] > 0) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-element-id="<?= $promo['PromoId'] ?>" data-element-name="<?= $promo['PromoName'] ?> ">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </form>
                <?php endforeach; ?>
                <form method="POST">
                    <tr>
                        <td colspan=4 class="text-center font-weight-bold color-warning">Add New Category</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="form-control" type="text" name="NewName" placeholder="New Promotion Name" required></td>
                        <td>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="New Promotion value" name="NewValue" min=0 max=100 step=0.5 required>
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <select class="custom-select" name="NewStatus">
                                <option value='0'>Disabled</option>
                                <option value='1' selected>Enabled</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="NewPromoBtn" class="btn btn-primary btn-block text-white">Add New Promotion</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span>Are you sure you want to delete the PromoCode: </span>
                        <span class="modal-text font-weight-bold"></span>
                        <span>?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form method="post" action="../include/snippets/promos-delete.php">
                            <input type="hidden" name="deleteElement" id="deleteElement" value="">
                            <button type="submit" name="deleteElementBtn" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    </div>
</div>