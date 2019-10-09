<?php
    if ($_REQUEST["typeid"]=='0')
    {
        $sql = "SELECT * FROM Product JOIN PriceByCapacity ON Product.ProductId = PriceByCapacity.ProductId
                WHERE CapacityId = 1 AND Status = 1";
    }
    else
    {
        $typeid = $_REQUEST['typeid'];
        $sql = "SELECT * FROM Product  JOIN PriceByCapacity ON Product.ProductId = PriceByCapacity.ProductId
        WHERE CapacityId = 1 AND TypeId = $typeid AND Status = 1";
    }
    $result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($result))
        {
?>

<div class="col-6 col-md-4 col-lg-2">
    <div class="card juice-card px-1 px-xl-4 pt-3 mt-4" data-toggle="modal" data-target="#exampleModal" >
        <img
        src="<?php echo $row['Image']?>"
        class="card-img-top"
        alt="..."
        />
        <div class="card-body">
        <h6 class="card-title text-center"><?php echo $row['Name']?></h6>
        <p
            class="juice-card-price py-1 text-center font-weight-bold mb-0"
        >
            <?php echo $row['Price']/1000?>.000₫
        </p>
        </div>
    </div>
</div>
<?php   } ?>