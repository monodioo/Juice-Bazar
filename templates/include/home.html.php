<div class="row px-0">
  <div id="carouselExampleFade" class="carousel slide carousel-fade rounded carousel-wrap" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleFade" data-slide-to="0" class="active rounded-circle mr-2"></li>
      <li data-target="#carouselExampleFade" data-slide-to="1" class="rounded-circle mr-2"></li>
      <li data-target="#carouselExampleFade" data-slide-to="2" class="rounded-circle mr-2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/image/home_carousel_01.png" class="d-block w-100" alt="Carousel Image 01" />
        <div class="carousel-caption d-none d-md-block">
          <h1>Promotion</h1>
          <p>
            Subtitle
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/image/home_carousel_02.png" class="d-block w-100" alt="Carousel Image 02" />
        <div class="carousel-caption d-none d-md-block">
          <h1>Sales</h1>
          <p>
            Subtitle
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/image/home_carousel_03.png" class="d-block w-100" alt="Carousel Image 03" />
        <div class="carousel-caption d-none d-md-block">
          <h1>Updates</h1>
          <p>
            Subtitle
          </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="row">
  <div class="page-section main-section col">
    <div class="section-title">Sản phẩm</div>
    <div class="row mb-4">
      <div class="col-4">
        <a href="?section=shop&typeid=1" class="img-wrap d-flex flex-row align-items-center justify-content-center rounded">
          <img src="assets/image/home_fruit.png" class="w-100 rounded" alt=".." />
          <div class="img-caption">
            Fruits
          </div>
        </a>
      </div>
      <div class="col-4">
        <a href="?section=shop&typeid=2" class="img-wrap d-flex flex-row align-items-center justify-content-center rounded"><img src="assets/image/home_green.png" class="w-100 rounded" alt=".." />
          <div class="img-caption">
            Green
          </div>
        </a>
      </div>
      <div class="col-4">
        <a href="?section=shop&typeid=3" class="img-wrap d-flex flex-row align-items-center justify-content-center rounded"><img src="assets/image/home_combo.png" class="w-100 rounded" alt=".." />
          <div class="img-caption">
            Combo
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="row px-0">
  <div class="page-section main-section w-100">
    <div class="section-title">Về Chúng tôi</div>
    <div class="section-body">
      <div class="gradient-wrap">
        <img src="assets/image/home_aboutus.png" alt="JB Team" class="img-gradient float-right img-fluid" />
        <div class="base-gradient float-left d-none d-lg-block"></div>
        <div class="gradient-caption d-none d-lg-block">
          <!-- <h5>Juice Bazar</h5> -->
          <p>
            Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ
            Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất,
            chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa
            nước ép tới từng hộ gia đình. Phương châm kinh doanh của chúng
            tôi tập trung vào dịch vụ cung cấp nước ép tại nhà, đặc biệt
            cho các gia đình trẻ hiện nay.
          </p>
          <p>
            Giữa một thế giới vận hành không ngừng, thời gian dành cho gia
            đình là quý báu, và chung tôi tự hào khi có thể tiết kiệm cho
            bạn 15 phút mỗi sáng mà vẫn có thể chăm lo cho sức khỏe gia
            đình mình.
          </p>
          <p>
            Hãy thử sản phẩm và dịch vụ của chúng tôi để cảm nhận sự khác
            biệt!
          </p>
          <a href="?section=aboutus" class="text-decoration-none text-dark font-weight-bold">
            <h5 style="color: #ffc634">Chi tiết</h5>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="page-section main-section col">
    <div class="section-title">Sản phẩm bán chạy nhất</div>
    <div class="section-body row">

      <?php include "templates/scripts/homeShowHotProduct.php" ?>
      <?php include "templates/scripts/shopAddToCart.php"; ?>

    </div>
  </div>
</div>
<!-- end of row -->
<div class="row">
  <div class="page-section main-section col">
    <div class="section-title">Địa điểm</div>
    <div class="section-body row row-eq-height">
      <div class="col-6 pl-0">
        <div class="card w-100 h-100">
          <img src="assets/image/home_locat1.png" class="card-img-top" alt="jB Tong Duy Tan" />
          <div class="card-body">
            <div class="text-center">20 Tống Duy Tân, Hoàn Kiếm</div>
            <div class="text-center ml-n2"><i class="fas fa-city mr-2" style="color: #ffc634"></i>Hà Nội</div>
          </div>
        </div>
      </div>
      <div class="col-6 pr-0">
        <div class="card w-100 h-100">
          <img src="assets/image/home_locat2.png" class="card-img-top" alt="jB Lotte" />
          <div class="card-body">
            <div class="text-center">60<sup>th</sup> Floor - Lotte Center, 54 Liễu Giai, Ba Đình</div>
            <div class="text-center ml-n2"><i class="fas fa-city mr-2" style="color: #ffc634"></i>Hà Nội</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of row -->