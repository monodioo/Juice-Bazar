
<li class="nav-item">
    <a class="nav-link nav-hover <?php if ($_REQUEST['typeid'] == '0') echo 'nav-hover-active'; ?>" id="shopAll" href="?section=shop&typeid=0">Toàn bộ</a>
</li>
<?php
    $sqlType = "SELECT * FROM Type WHERE TypeStatus = 1";
    $rsType = mysqli_query($con,$sqlType);
    while($rowType = mysqli_fetch_array($rsType)) {
?>

<li class="nav-item">
    <a
        class="nav-link nav-hover <?php if ($_REQUEST['typeid'] == $rowType['TypeId']) echo 'nav-hover-active'; ?>"
        id="<?=$rowType['Type']?>"
        href="?section=shop&typeid=<?=$rowType['TypeId']?>"
    >
        <?=$rowType['Type']?>
    </a>
</li>

<?php
    }
?>