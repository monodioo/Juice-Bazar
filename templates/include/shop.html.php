      <div class="row">
        <div class="page-section">
          <ul class="nav shop-nav mt-2 mt-lg-5 mw-100">

            <?php include "templates/scripts/shopShowTypeProduct.php";?>

          </ul>
        </div>
      </div>
      <div class="row px-0">
        <div class="page-section w-100 mb-4">
          <div class="section-body">
            <div class="shop-gradient-wrap">
              <img
                src="
                <?php
                  switch($_REQUEST['typeid'])
                  {
                    case '0': echo 'assets/image/shop-banner-all.png'; break;
                    case '1': echo 'assets/image/shop-banner-fruit.png'; break;
                    case '2': echo 'assets/image/shop-banner-green.png'; break;
                    case '3': echo 'assets/image/shop-banner-combo.png';
                  }
                ?>"
                alt="shop banner"
                class="shop-img-gradient float-right img-fluid"
              />
              <div class="shop-base-gradient float-left d-none d-lg-block"></div>
              <div class="shop-gradient-caption d-none d-lg-block">
                <!-- <h5>Juice Bazar</h5> -->
                <p>
                  Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ
                  Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất,
                  chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa
                  nước ép tới từng hộ gia đình. Phương châm kinh doanh của chúng
                  tôi tập trung vào dịch vụ cung cấp nước ép tại nhà, đặc biệt
                  cho các gia đình trẻ hiện nay.
                </p>
                <a href="#!" class="text-decoration-none text-dark font-weight-bold">
                  <h5 style="color: #ffc634">Chi tiết</h5>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of row -->
      <div class="row">
        <div class="page-section px-0 col">
          <div class="section-body row">
            
            <?php include "templates/scripts/showProduct.php";?>

          </div>
        </div>
      </div>