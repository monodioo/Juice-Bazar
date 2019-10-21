<div class="page-section card col-12 p-5">
    <div class="section-title">All Product Categories</div>
    <div class="">
        <table class="table-order table table-hover table-sm table-sm-responsive" id='typeTable'>
            <thead>
                <tr>
                    <th scope="col" style="width: 15%" class="filter-exact">Category ID</th>
                    <th scope="col" style="">Category Name</th>
                    <th scope="col" style="" class="filter-select filter-exact" data-placeholder="All Status">Category Status</th>
                    <th scope="col" style="" class="filter-false sorter-false">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($types as $type) : ?>
                    <form method="POST">
                        <tr>
                            <td class="align-middle"><?= $type['TypeId'] ?>
                                <input type="hidden" name="TypeId" value="<?= $type['TypeId'] ?>">
                            </td>
                            <td><input class="form-control" type="text" name="Type" value="<?= $type['Type'] ?>" required>
                            </td>
                            <td>
                                <select class="custom-select" name="TypeStatus" value=<?= $type['TypeStatus'] ?>>
                                    <option value=' 0' <?= ($type['TypeStatus'] == 0) ? 'selected' : '' ?>>Disabled</option>
                                    <option value='1' <?= ($type['TypeStatus'] == 1) ? 'selected' : '' ?>>Enabled</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" name="EditTypeBtn" class="btn btn-warning text-white">Apply Change</button>
                                <a class="btn btn-danger text-white <?= ($type['Existed'] > 0) ? 'disabled' : ''; ?>" data-toggle="modal" data-target="#deleteModal" data-element-id="<?= $type['TypeId'] ?>" data-element-name="<?= $type['Type'] ?> ">
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
                        <td><input class="form-control" type="text" name="NewType" required></td>
                        <td>
                            <select class="custom-select" name="NewTypeStatus">
                                <option value='0'>Disabled</option>
                                <option value='1' selected>Enabled</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="NewTypeBtn" class="btn btn-primary btn-block text-white">Add Category</button>
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
                        <span>Are you sure you want to delete the Category: </span>
                        <span class="modal-text font-weight-bold"></span>
                        <span>?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form method="post" action="../include/snippets/types-delete.php">
                            <input type="hidden" name="deleteCategory" id="deleteElement" value="">
                            <button type="submit" name="deleteCategoryBtn" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    </div>
</div>