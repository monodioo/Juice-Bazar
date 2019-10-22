<?php
if (empty($_SESSION['cart'])) echo "<tr><td><strong>ĐƠN HÀNG TRỐNG</strong></td></tr>";
else {
    foreach ($_SESSION['cart'] as $key => $value) {
        ?>

        <tr>
            <td><?= $value['name'] ?><strong class="mx-2"> x </strong><?= $value['quantity'] ?></td>
            <td class="text-right"><?= number_format($value['price'] * $value['quantity'], 0, '.', '.') ?>₫</td>
        </tr>

<?php
    }
}
?>