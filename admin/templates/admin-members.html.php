<div class="page-section card col-12 py-2">
    <div class="section-title pb-2">Members List</div>
    <div class="table-wrapper">
        <table class="table table-hover table-sm tablesorter" id='orderTable'>
            <thead>
                <tr>
                    <th scope="col" style="width: 50px" class="filter-exact">Member ID</th>
                    <th scope="col" style="">Member Name</th>
                    <th scope="col" style="">Email</th>
                    <th scope="col" class="sorter-false filter-false">Password</th>
                    <th scope="col" style="width: 50px" class="sorter-false filter-false">Orders ID</th>
                    <th scope="col" class="">Date</th>
                    <th scope="col" class="">Status</th>
                    <th scope="col" class="">Spending</th>
                    <th scope="col" style="" class="">Birthday</th>
                    <th scope="col" style="" class="filter-select filter-exact" data-placeholder="All Gender">Gender</th>
                    <th scope="col" style="" class="sorter-false">Phone</th>
                    <th scope="col" style="" class="sorter-false">Address</th>
                    <th scope="col" style="" class="filter-select filter-exact" data-placeholder="All Status">Status</th>
                    <th scope="col" class="sorter-false filter-false">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member) : ?>
                    <tr>
                        <td><?= $member['MemberId'] ?></td>
                        <td><?= $member['Name'] ?></td>
                        <td><?= $member['Email'] ?></td>
                        <td><?= $member['Pass'] ?></td>
                        <td colspan=3 class="text-center"><a href="#" class="toggle admin-link d-block" style="height: 60px">Click here to expand</a></td>
                        <td><?= number_format($member['Spending']) ?> ₫</td>
                        <td><?= $member['Birthday'] ?></td>
                        <td><?php switch ($member['Gender']) {
                                    case 0:
                                        echo '0.Not disclosed';
                                        break;
                                    case 1:
                                        echo '1.Male';
                                        break;
                                    case 2:
                                        echo '2.Female';
                                        break;
                                } ?></td>
                        <td><?= $member['Phone'] ?></td>
                        <td><?= $member['Address'] ?></td>
                        <td><?= ($member['Status'] == 0) ? 'Disabled' : 'Enabled' ?></td>
                        <td>
                            <form action="../include/snippets/memberStatusSwitch.php" method="post" class="m-0">
                                <button type="submit" class="btn btn-<?= ($member['Status'] == 1) ? 'secondary' : 'success' ?> btn-block btn-sm mb-1" name="switchMemberBtn"><?= ($member['Status'] == 1) ? 'Disable' : 'Enable' ?></button>
                                <input type="hidden" name="switchMemberId" value="<?= $member['MemberId'] ?>">
                                <input type="hidden" name="switchMemberStatus" value="<?= $member['Status'] ?>">
                            </form>
                        </td>
                    </tr>
                    <?php foreach ($member['Items'] as $item) : ?>
                        <tr class="tablesorter-childRow bg-light">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="admin-orders.php">
                                    <?= $item['OrderId'] ?? "" ?>
                                </a>
                            </td>
                            <td><?= $item['PurchaseDate'] ? date_format(date_create($item['PurchaseDate']), 'M-d-Y') : "" ?></td>
                            <td><?php switch ($item['Status']) {
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
                                        } ?></td>
                            <td><?= number_format($item['Spending'])  ?? "" ?> ₫</td>
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
                        <span>Are you sure you want to delete the Order Id No.: </span>
                        <span class="modal-text font-weight-bold"></span>
                        <span>?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form method="post" action="../include/snippets/orders-delete.php" class="m-0">
                            <input type="hidden" name="deleteOrder" id="deleteElement" value="">
                            <button type="submit" name="deleteOrderBtn" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
    </div>
</div>