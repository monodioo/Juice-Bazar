<?php
include "templates/scripts/testForm.php";
include "templates/scripts/profile.php";
$memberId = $_SESSION['memberId'];
$sql = "SELECT * FROM Member WHERE MemberId = $memberId";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_array($rs);
?>

<div class="row my-5">
    <div class="page-section card col-12 p-5">
        <div class="section-title">Quản lý tài khoản</div>
        <div class="h4 mb-3 textBazar">Thông tin tài khoản</div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-1">
                    <span>Họ tên:&nbsp;</span>
                    <span class="font-weight-bold"><?= $row['Name'] ?></span>
                </div>
                <div class="mb-1">
                    <span>Email:&nbsp;</span>
                    <span class="font-weight-bold"><?= $row['Email'] ?></span>
                </div>
                <!-- <div class="mb-1">
                    <span>Mật khẩu:&nbsp;</span>
                    <span class="font-weight-bold"><?= $row['Pass'] ?></span>
                </div> -->
                <div class="mb-1">
                    <span>Giới tính:&nbsp;</span>
                    <span class="font-weight-bold"><?php switch ($row['Gender']) {
                                                        case 1:
                                                            echo 'Nam';
                                                            break;
                                                        case 2:
                                                            echo 'Nữ';
                                                            break;
                                                        default:
                                                            echo 'Khác';
                                                    } ?>
                    </span>
                </div>
                <div class="mb-1">
                    <span>Ngày sinh:&nbsp;</span>
                    <span class="font-weight-bold"><?= date('d/m/Y', strtotime($row['Birthday'])) ?></span>
                </div>

            </div>
            <div class="col-12 col-md-6 align-top">
                <div class="mb-1">
                    <span>Số điện thoại:&nbsp;</span>
                    <span class="font-weight-bold"><?= $row['Phone'] ?></span>
                </div>
                <div class="mb-1">
                    <span>Địa chỉ:&nbsp;</span>
                    <span class="font-weight-bold"><?= $row['Address'] ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
                <button type="button" class="btn btn-cart text-white" data-toggle="modal" data-target="#changeProfile">
                    Thay đổi thông tin
                </button>
                <!-- Modal -->
                <div class="modal fade" id="changeProfile" tabindex="-1" role="dialog" aria-labelledby="changeProfileTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeProfileTitle">Thay đổi thông tin tài khoản</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="changeForm">
                                    <div class="form-group">
                                        <label for="fnameChange">Họ tên<span class="text-danger"> * </span>:
                                        </label>
                                        <input type="text" class="form-control" id="fnameChange" name="fnameChange" aria-describedby="fnameChange" placeholder="Họ tên" value="<?= $row['Name'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordChange">Mật khẩu<span class="text-danger"> * </span>:
                                        </label>
                                        <input type="password" class="form-control" name="passwordChange" id="passwordChange" placeholder="Mật khẩu mới" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password2Change">Nhập lại Mật khẩu<span class="text-danger"> * </span>:
                                        </label>
                                        <input type="password" class="form-control" name="password2Change" id="password2Change" placeholder="Nhập lại Mật khẩu mới" />
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-2">Giới tính: </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genderChange" id="radioGender1" value="1" <?= ($row['Gender'] == 1) ? 'checked' : ''; ?> />
                                            <label class="form-check-label" for="radioGender1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genderChange" id="radioGender2" value="2" <?= ($row['Gender'] == 2) ? 'checked' : ''; ?> />
                                            <label class="form-check-label" for="radioGender2">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genderChange" id="radioGender3" value="0" <?= ($row['Gender'] == 0) ? 'checked' : ''; ?> />
                                            <label class="form-check-label" for="radioGender3">Khác</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdayChange" class="">Ngày sinh:</label>
                                        <input type="date" name="birthdayChange" class="form-control" value="<?= $row['Birthday'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="telChange" class="">Số điện thoại<span class="text-danger"> * </span>:</label>
                                        <input type="text" class="form-control" id="telChange" name="telChange" placeholder="" value="<?= $row['Phone'] ?>" />
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="addChange" class="">Địa chỉ:</label>
                                            <input type="text" class="form-control" id="addChange" name="addChange" placeholder="Số nhà, Tên đường, Xã / Phường, Quận" value="<?= $row['Address'] ?>" />
                                        </div>
                                    </div>

                                    <button class="btn btn-cart mt-1" name="profile_update">Thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of modal -->
            </div>
        </div>

        <?php
        $orders = array();
        $sqlOrder = "SELECT * FROM Orders LEFT JOIN Promotion ON Orders.PromoId = Promotion.PromoId WHERE MemberId =" . $_SESSION['memberId'];
        $rsOrder = mysqli_query($con, $sqlOrder);
        while ($rowOrder = mysqli_fetch_array($rsOrder)) {
            $orders[$rowOrder['OrderId']]['PurchaseDate'] = $rowOrder['PurchaseDate'];
            $orders[$rowOrder['OrderId']]['DeliveryDate'] = $rowOrder['DeliveryDate'];

            $orders[$rowOrder['OrderId']]['OrderDetail'] = array();
            $sqlDetail = "SELECT * FROM OrderDetail
                                    JOIN ProductDetail ON OrderDetail.ProductDetailId = ProductDetail.ProductDetailId
                                    JOIN Product       ON ProductDetail.ProductId = Product.ProductId
                                    JOIN Capacity      ON ProductDetail.CapacityId = Capacity.CapacityId
                            WHERE OrderId = " . $rowOrder['OrderId'];
            $rsDetail = mysqli_query($con, $sqlDetail);
            $subTotalValue = 0;
            while ($rowDetail = mysqli_fetch_array($rsDetail)) {
                $OrderDetail[] = array(
                    'ProductId' => $rowDetail['ProductId'],
                    'Name'      => $rowDetail['Name'] . '(' . $rowDetail['Capacity'] . 'ml)',
                    'Quantity'  => $rowDetail['Quantity'],
                    'SalePrice' => $rowDetail['SalePrice']
                );

                $subTotalValue += $rowDetail['Quantity'] * $rowDetail['SalePrice'];
            }
            $orders[$rowOrder['OrderId']]['OrderDetail'] = $OrderDetail;
            $orders[$rowOrder['OrderId']]['totalPrice'] = $subTotalValue;
            $orders[$rowOrder['OrderId']]['PromoName'] = $rowOrder['PromoName'];
            $orders[$rowOrder['OrderId']]['PromoValue'] = $rowOrder['PromoValue'];
            $orders[$rowOrder['OrderId']]['LastPrice'] = $subTotalValue * (1 - $rowOrder['PromoValue']);
            $orders[$rowOrder['OrderId']]['Note'] = $rowOrder['Note'];
            $orders[$rowOrder['OrderId']]['Status'] = $rowOrder['Status'];
        }
        ?>
        <div class="">
            <div class="h4 textBazar my-3">Quản lý đơn hàng</div>
            <div class="table-wrapper">
                <table class="table table-hover table-sm tablesorter" id='profileTable'>
                    <thead>
                        <tr>
                            <th scope="col" style="width: 80px" class="filter-exact">Mã đơn</th>
                            <th scope="col" style="width: 10%">Ngày đặt hàng</th>
                            <th scope="col" style="width: 10%">Ngày giao hàng</th>
                            <th scope="col" style="width:5%" class="sorter-false">Tên SP</th>
                            <th scope="col" style="width:5%" class="sorter-false filter-false">SLg.</th>
                            <th scope="col" style="width: 8%" class="sorter-false">Giá</th>
                            <th scope="col" style="width: 8%">Tổng giá</th>
                            <th scope="col" style="" class="">Khuyến mại</th>
                            <th scope="col" style="">Giảm giá</th>
                            <th scope="col" style="width: 5%">Tổng tiền</th>
                            <th scope="col" style="" class="sorter-false">Chú ý</th>
                            <th scope="col" style="" class="sorter-false">Trạng thái</th>
                            <th scope="col" class="sorter-false filter-false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $key => $order) : ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= date_format(date_create($order['PurchaseDate']), 'M-d-Y H:i') ?></td>
                                <td><?php if (($order['Status'] == 4)) {
                                            echo '<i>Đơn đã hủy</i>';
                                        } else if ($order['DeliveryDate'] == '') {
                                            echo '<i>Sẽ cập nhật khi đơn hoàn thành.</i>';
                                        } else {
                                            echo date_format(date_create($order['DeliveryDate']), 'M-d-Y H:i');
                                        } ?></td>
                                <td colspan=3 class="text-center">
                                    <a href="#" class="toggle admin-link d-block" style="height: 120px">
                                        Bấm để xem
                                    </a>
                                </td>
                                <td><?= number_format($order['totalPrice'], 0, '.', '.') ?> ₫</td>
                                <td><?= empty($order['PromoName']) ?  'N/A' : $order['PromoName'] ?></td>
                                <td><?= $order['PromoValue'] * 100 ?>%</td>
                                <td><?= number_format($order['totalPrice'], 0, '.', '.') ?> ₫</td>
                                <td><?= $order['Note'] ?></td>
                                <td>
                                    <?php switch ($order['Status']) {
                                            case 0:
                                                echo '0.Chưa xử lý';
                                                break;
                                            case 1:
                                                echo '1.Đang xử lý';
                                                break;
                                            case 2:
                                                echo '2.Đang vận chuyển';
                                                break;
                                            case 3:
                                                echo '3.Thành công';
                                                break;
                                            case 4:
                                                echo '4.Đơn đã hủy';
                                        } ?>
                                </td>
                                <td>
                                    <form method="POST" action="">

                                        <input type="hidden" name="oldStatus" value="<?= $order['Status'] ?>">
                                        <input type="hidden" name="OrderId" value="<?= $key ?>">
                                        <button type="submit" class="btn btn-danger btn-sm text-white" id="cancel-order" name="cancel-order" <?= ($order['Status'] == 0 || $order['Status'] == 1) ? '' : 'disabled'; ?>>
                                            Hủy Đơn
                                        </button>

                                    </form>
                                </td>
                            </tr>
                            <?php foreach ($order['OrderDetail'] as $item) : ?>
                                <tr class="tablesorter-childRow bg-light">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="?section=shop&typeid=0&id=<?= $item['ProductId'] ?>">
                                            <?= $item['Name'] ?>
                                        </a>
                                    </td>
                                    <td><?= $item['Quantity']; ?></td>
                                    <td><?= number_format($item['SalePrice'], 0, '.', '.') ?> ₫</td>
                                    <td><?= number_format($item['SalePrice'] * $item['Quantity'], 0, '.', '.') ?> ₫</td>
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
                            <th colspan="13" class="ts-pager">
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

    </div>
</div>


<!-- 
    function getOrders($pdo, $id = '')
{
    if ($id == '') {
        $sql = 'SELECT * FROM `orders` ORDER BY `OrderId` DESC';
        $query = query($pdo, $sql);
        $results = $query->fetchAll();
    } else {
        $sql = 'SELECT * FROM `orders` WHERE `OrderId` = :OrderId';
        $parameters = [':OrderId' => $id];
        $query = query($pdo, $sql, $parameters);
        $results = $query->fetchAll();
    }

    $orders = [];
    foreach ($results as $result) {
        $promo = empty($result['PromoId']) ? ['PromoName' => '', 'PromoValue' => 0] : getOrderInfo($pdo, 'promotion', 'PromoId', $result['PromoId']);

        $member = getOrderInfo($pdo, 'member', 'MemberId', $result['MemberId']);
        $items = getOrderDetail($pdo, $result['OrderId']);
        $subTotalValue = 0;
        foreach ($items as $item) {
            $subTotalValue += ($item['SalePrice'] * $item['Quantity']);
        }

        $orders[] = [
            'OrderId' => $result['OrderId'],
            'MemberId' => $result['MemberId'],
            'MemberName' => $member['Name'],
            'PurchaseDate' => $result['PurchaseDate'],
            'DeliveryDate' => $result['DeliveryDate'] ?? "",
            'Items' => getOrderDetail($pdo, $result['OrderId']),
            'List' => getListProducts($pdo),
            'PromoId' => $result['PromoId'],
            'PromoName' => $promo['PromoName'],
            'PromoValue' => $promo['PromoValue'],
            'subTotalValue' => $subTotalValue,
            'Status' => $result['Status'],
            'Note' => $result['Note']
        ];
    }
    return $orders;
}

function getOrderDetail($pdo, $OrderId)
{
    $sql = 'SELECT pd.`ProductDetailId`, p.`ProductId`, p.`Name`, od.`SalePrice`, od.`Quantity`, pd.`CapacityId`, p.`TypeId`, t.`Type` FROM `orderdetail` od JOIN `productdetail` pd ON od.`ProductDetailId` = pd.`ProductDetailId` JOIN  `product` p ON pd.`ProductId` = p.`ProductId` JOIN `Type` t ON t.`TypeId` = p.`TypeId` WHERE `OrderID` = :OrderId';
    $parameters = [':OrderId' => $OrderId];
    $results = query($pdo, $sql, $parameters)->fetchAll();
    return $results;
}

function getOrderInfo($pdo, $table, $primaryKey, $keyValue)
{
    $sql = 'SELECT * FROM `' . $table . '` WHERE `' . $primaryKey . '` = :keyValue';
    $parameters = [':keyValue' => $keyValue];
    $results = query($pdo, $sql, $parameters)->fetch();
    return $results;
}
 -->