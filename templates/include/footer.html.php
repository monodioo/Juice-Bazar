<div class="row px-0">
  <div class="page-section newsletter-section col py-3">
    <div class="section-body row row-eq-height newsletter-text">
      <div class="col-12 col-md-7 d-flex flex-column justify-content-center pl-0 pr-4 pl-lg-0">
        <h5 class="text-uppercase font-weight-bold">
          Cập nhật thông tin từ Juice Bazar
        </h5>
        <p class="mb-0">
          Đăng ký ngay để nhận các thông báo mới nhất về dinh dưỡng và khuyến mãi
          từ chúng tôi!
        </p>
      </div>
      <div class="col-12 col-md-5 d-flex flex-column justify-content-center mt-3 mt-lg-0">
        <!-- <form class="newsletter-input-wrap d-flex flex-row"> -->
        <!-- <input type="text" class="form-control py-1 mr-n4" placeholder="email@domain.com" aria-label="Newsletter email" aria-describedby="sendEmailBtn" /> -->
        <a class="btn btn-light btn-lg btn-link text-decoration-none" href="index.php?section=signup" id="sendEmailBtn" <?= isset($_SESSION['memberId']) ? 'hidden' : '' ?>>
          Đăng ký
          <i class="fas fa-paper-plane" aria-hidden="true"></i>
        </a>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>
<!-- end of row -->
<div class="row footer">
  <div class="page-section col pt-5 px-3 px-md-2 px-lg-0 mb-4">
    <div class="row">
      <div class="col-6 col-lg-8">
        <div class="row">
          <div class="col-12 col-lg-3">
            <div class="footer-title pl-0 mb-0">
              <a href="index.php?section=shop&typeid=0" class="text-decoration-none text-dark">Cửa hàng</a>
            </div>
            <ul class="footer-list">
              <li><a href="index.php?section=shop&typeid=1" class="text-decoration-none text-dark">Fruits</a></li>
              <li><a href="index.php?section=shop&typeid=2" class="text-decoration-none text-dark">Green</a></li>
              <li><a href="index.php?section=shop&typeid=3" class="text-decoration-none text-dark">Combo</a></li>
            </ul>
          </div>
          <div class="col-12 col-lg-3">
            <a href="index.php?section=aboutus" class="footer-title text-decoration-none text-dark">Về chúng tôi</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-4">
        <div class="d-flex flex-column align-items-end">
          <svg width="128" height="65" viewBox="0 0 128 65" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M47.5678 32.4795C46.6016 32.4795 45.7734 31.6913 45.7734 30.6888V6.07679C45.7734 5.10336 46.6016 4.28247 47.5678 4.28247C48.5739 4.28247 49.3621 5.10336 49.3621 6.07679V30.6888C49.3621 31.6913 48.5739 32.4795 47.5678 32.4795Z" fill="#FFC634" />
            <path d="M8.03826 32.8754C6.96312 32.8754 6.026 32.7701 5.13247 32.5522C2.94587 32.0146 1.25688 30.8305 0.254383 29.1778C-0.250498 28.317 0.0364484 27.2418 0.897288 26.7043C1.72181 26.203 2.83327 26.4863 3.33452 27.3472C3.8394 28.139 4.69661 28.7129 5.91704 29.0362C6.49093 29.1742 7.27913 29.2795 7.99831 29.2795C9.65098 29.2795 10.8678 28.8945 11.6196 28.1027C12.6258 26.9912 12.5568 25.4112 12.5568 25.3712V6.0768C12.5568 5.0743 13.345 4.28247 14.3511 4.28247C15.3173 4.28247 16.1418 5.0743 16.1418 6.0768V25.1969C16.1418 25.7708 16.1781 28.4223 14.2421 30.5036C13.5593 31.2555 12.6984 31.833 11.7322 32.2289C10.6535 32.6575 9.40035 32.8754 8.03826 32.8754Z" fill="#FFC634" />
            <path d="M30.8884 32.9081C28.2696 32.9081 26.0103 32.3706 24.1797 31.2954C22.5997 30.3982 21.3829 29.1415 20.4857 27.5251C19.0146 24.7973 19.0146 21.9678 19.0146 21.0343V6.0768C19.0146 5.10336 19.8428 4.28247 20.809 4.28247C21.8151 4.28247 22.6033 5.10336 22.6033 6.0768V21.0343C22.6033 21.7499 22.6033 23.9038 23.6457 25.8071C24.2196 26.8459 24.9715 27.6377 25.9776 28.2116C27.2344 28.9272 28.8834 29.3231 30.8921 29.3231C32.9007 29.3231 34.5534 28.9272 35.8065 28.2116C36.7763 27.6377 37.5645 26.8459 38.102 25.8434C39.1445 23.9038 39.1445 21.7535 39.1445 21.038V6.0768C39.1445 5.10336 39.969 4.28247 40.9388 4.28247C41.9413 4.28247 42.7295 5.10336 42.7295 6.0768V21.0343C42.7295 21.9678 42.7295 24.8373 41.2585 27.5251C39.9291 30.0023 37.0596 32.9081 30.8884 32.9081Z" fill="#FFC634" />
            <path d="M66.7242 32.9443C64.7155 32.9443 62.7759 32.5484 60.9453 31.7602C59.2272 31.0047 57.6472 29.9659 56.2815 28.6038C54.9194 27.2744 53.877 25.6944 53.1251 23.94C52.3369 22.1457 51.9773 20.2424 51.9773 18.3064C51.9773 16.3341 52.3732 14.4308 53.1251 12.6365C53.8806 10.9148 54.9594 9.33843 56.3215 8.00903C57.6835 6.64694 59.2963 5.60813 61.0579 4.85262C62.8885 4.10075 64.8245 3.70483 66.7968 3.70483C70.0259 3.70483 73.0406 4.71096 75.5505 6.65058C76.3387 7.26079 76.484 8.37226 75.9101 9.16045C75.2999 9.94502 74.1521 10.0939 73.3966 9.51641C71.4933 8.04172 69.2341 7.29348 66.7932 7.29348C65.2894 7.29348 63.8184 7.5768 62.4163 8.15432C61.0906 8.72822 59.8701 9.51641 58.8277 10.5552C57.8216 11.565 56.997 12.7418 56.4232 14.0712C55.8493 15.4006 55.5623 16.8354 55.5623 18.3064C55.5623 19.7738 55.8493 21.1759 56.4232 22.538C56.997 23.8637 57.7852 25.0479 58.8277 26.0504C60.9417 28.1679 63.7457 29.3521 66.7205 29.3521C68.0463 29.3521 69.3031 29.0978 70.5235 28.6728C71.7076 28.2442 72.7827 27.5941 73.7489 26.8059C74.5044 26.1557 75.6159 26.2683 76.2624 27.0202C76.909 27.7757 76.8 28.9235 76.0481 29.53C74.7587 30.6088 73.3239 31.4333 71.7802 32.0072C70.1675 32.6247 68.4459 32.9443 66.7242 32.9443Z" fill="#FFC634" />
            <path d="M74.2974 64.7445H54.7488C54.0659 64.7445 53.4557 64.3486 53.1324 63.7057C52.8455 63.0955 52.9181 62.34 53.3467 61.806L70.5635 40.1724H55.3154C54.3456 40.1724 53.5211 39.3806 53.5211 38.3781C53.5211 37.3792 54.3456 36.5874 55.3154 36.5874H74.2938C74.9767 36.5874 75.5833 36.9833 75.9102 37.5935C76.1971 38.2364 76.1245 38.952 75.6922 39.4896L58.4754 61.1631H74.2938C75.2636 61.1631 76.0881 61.9549 76.0881 62.9538C76.0918 63.9163 75.2636 64.7445 74.2974 64.7445Z" fill="#FFC634" />
            <path d="M126.024 64.7444C125.196 64.7444 124.444 64.1342 124.266 63.2734C123.837 61.0795 123.155 59.3251 122.221 57.9994C121.538 56.9932 120.677 56.2741 119.711 55.8128C118.959 55.4169 118.204 55.2716 117.63 55.2352C117.161 55.2352 116.66 55.2716 116.159 55.2716C115.262 55.2716 114.473 54.556 114.401 53.6262C114.292 52.729 114.938 51.8609 115.836 51.7229C115.981 51.6829 116.66 51.5376 117.666 51.6139C119.53 51.5049 121.004 51.109 122.079 50.5024C123.659 49.6089 124.411 48.2105 124.411 46.0929C124.411 44.6582 124.124 43.4704 123.619 42.5406C123.224 41.8577 122.65 41.3202 121.97 40.8879C120.677 40.1724 119.352 40.136 119.243 40.136H110.384V62.9501C110.384 63.9199 109.595 64.7481 108.589 64.7481C107.619 64.7481 106.795 63.9236 106.795 62.9501V38.3417C106.795 37.3356 107.619 36.551 108.589 36.551H119.243C119.388 36.551 120.245 36.551 121.36 36.838C122.94 37.2339 124.339 37.9858 125.417 39.0609C126.206 39.8491 126.852 40.8153 127.281 41.934C127.749 43.1508 128 44.5528 128 46.0929C128 49.4636 126.565 52.0825 123.877 53.6298C123.696 53.7315 123.518 53.8078 123.303 53.9131C123.95 54.4507 124.52 55.0609 125.061 55.7764C126.351 57.5381 127.248 59.83 127.789 62.5905C127.971 63.564 127.361 64.5338 126.391 64.7118C126.238 64.7081 126.133 64.7444 126.024 64.7444Z" fill="#FFC634" />
            <path d="M50.6079 62.2494L39.4315 37.601C39.1773 36.9945 38.4981 36.5586 37.8152 36.5586C37.096 36.5586 36.4858 36.9581 36.1625 37.601L24.8118 62.2494C24.4522 63.0739 24.3432 64.08 25.1351 64.5849C25.8906 65.0499 26.7877 64.8319 27.4706 64.1491C28.8363 62.8233 30.7033 61.3486 32.5012 60.2371C34.2592 59.1584 36.0608 58.4755 37.8878 58.1232C38.4726 57.9888 39.0611 57.898 39.6531 57.8399C39.7076 57.8435 39.7621 57.8435 39.8166 57.8435C39.9546 57.8435 40.089 57.8326 40.2197 57.7963C40.9317 57.6183 41.462 56.9681 41.462 56.2054C41.462 55.3082 40.7428 54.5781 39.8493 54.56H39.8166C39.7258 54.56 39.6422 54.5672 39.5587 54.5817C38.8068 54.6471 38.0586 54.7597 37.314 54.9232C35.3017 55.3191 32.7882 56.2889 30.8849 57.3677L37.7789 42.668L47.299 63.7568C47.8002 64.7266 48.879 65.0135 49.7071 64.6539C50.6079 64.2253 51.0002 63.1829 50.6079 62.2494Z" fill="#FFC634" />
            <path d="M104.412 62.2494L93.2396 37.601C92.989 36.9945 92.3061 36.5586 91.6233 36.5586C90.9041 36.5586 90.2939 36.9581 89.967 37.601L78.6162 62.2494C78.2566 63.0739 78.1477 64.08 78.9395 64.5849C79.695 65.0499 80.5922 64.8319 81.275 64.1491C82.6408 62.8233 84.5077 61.3486 86.3057 60.2371C88.0673 59.1584 89.8616 58.4755 91.6923 58.1232C92.2771 57.9888 92.8655 57.898 93.4539 57.8399C93.5084 57.8435 93.5629 57.8435 93.6174 57.8435C93.7554 57.8435 93.8934 57.8326 94.0206 57.7963C94.7325 57.6183 95.2628 56.9681 95.2628 56.2054C95.2628 55.3082 94.5436 54.5781 93.6537 54.56H93.6174C93.5302 54.56 93.443 54.5672 93.3595 54.5817C92.6112 54.6471 91.863 54.7597 91.1184 54.9232C89.1098 55.3191 86.5926 56.2889 84.6893 57.3677L91.587 42.6716L101.107 63.7604C101.608 64.7302 102.691 65.0172 103.515 64.6576C104.412 64.2253 104.808 63.1829 104.412 62.2494Z" fill="#FFC634" />
            <path d="M18.3355 49.7145C20.0209 48.4905 21.4556 46.4128 20.9907 43.0421C20.3805 38.6979 17.1151 36.584 12.4186 36.584H1.79796C0.831782 36.584 0.00363224 37.3758 0.00363224 38.3747V62.9613C0.00363224 62.9468 0.00726447 62.9431 0.00726447 62.9359C0.00726447 62.9504 0.00363224 62.9613 0.00363224 62.9758C0.00363224 62.9722 0 62.9685 0 62.9613V62.9831L0.00363224 62.9867C0.00363224 62.9903 0 62.9903 0 62.9903C0 63.2337 0.0508513 63.4734 0.141657 63.6877V63.695C0.232463 63.9129 0.366856 64.1127 0.537571 64.2762C0.544835 64.2834 0.555732 64.2907 0.566629 64.2979C0.722815 64.4432 0.900794 64.5667 1.10057 64.6539C1.2059 64.6975 1.3185 64.7229 1.4311 64.7483C1.56549 64.7774 1.69989 64.7956 1.84154 64.7956C1.89966 64.7956 1.95777 64.781 2.01589 64.7774H1.97957C2.89489 64.6866 3.58138 63.9202 3.58138 62.9831C3.58138 62.9213 3.59591 62.8632 3.58865 62.8015V40.169H12.415C15.4624 40.169 17.1478 41.1352 17.4347 43.4671C17.758 46.3765 16.3596 48.1672 13.7044 48.4541L10.9766 48.4905C10.0104 48.4905 9.18229 49.2823 9.18229 50.2848C9.21861 51.2546 10.0104 52.0755 10.9766 52.0755H11.0129L13.8098 52.0464H13.9151C17.4311 52.0464 19.3671 53.7608 19.0075 57.2805C18.7569 59.9356 17.0352 61.1597 14.1294 61.1597H7.58774H6.91941C6.06583 61.3195 5.41566 62.0569 5.41566 62.9649C5.41566 63.9166 6.14574 64.6939 7.07923 64.7847H7.42792H14.1367C18.9094 64.7847 22.2474 62.0569 22.6034 57.611C22.9267 53.5502 20.7037 50.5354 18.3355 49.7145Z" fill="#FFC634" />
            <path d="M91.4559 19.4544C91.0273 19.4544 90.6132 19.4326 90.1919 19.3963C89.9994 19.3817 89.8069 19.3599 89.6144 19.3381C88.6773 19.3963 87.9327 20.1699 87.9327 21.1143C87.9327 21.9461 88.5066 22.6398 89.273 22.8396C89.4618 22.8614 89.6507 22.8723 89.8396 22.8941C90.3699 22.9341 90.9038 22.9704 91.4487 22.9704C96.7118 22.9704 101.466 20.7874 104.863 17.2859C105.938 16.1745 106.878 14.9322 107.656 13.5811C107.176 12.1645 106.49 10.8423 105.629 9.65824C102.963 5.99331 98.6405 3.60693 93.7624 3.60693C87.1772 3.60693 81.6053 7.95109 79.7492 13.9261C79.3206 15.2991 79.0918 16.7629 79.0918 18.2775C79.0918 18.2812 79.0954 18.2848 79.0954 18.2921V18.2957C79.0954 18.2993 79.0918 18.303 79.0918 18.3066C79.0918 19.9411 79.3533 21.5465 79.9054 23.0866C81.8995 28.8219 87.3479 32.9445 93.7624 32.9445H93.7987H93.8387C94.5433 32.9445 95.248 32.8864 95.9454 32.7811C95.9962 32.7738 96.0471 32.7702 96.0979 32.7593C96.2614 32.7338 96.4212 32.7048 96.5774 32.6685C96.6863 32.6539 96.7953 32.6249 96.9006 32.6031C96.9878 32.5849 97.075 32.5631 97.1585 32.545C97.3256 32.505 97.4927 32.4614 97.6562 32.4178C97.6634 32.4178 97.667 32.4142 97.6743 32.4142C97.914 32.3488 98.1501 32.2725 98.3862 32.1926C98.5279 32.1454 98.6623 32.0946 98.8039 32.051C98.833 32.0364 98.8621 32.0255 98.8911 32.0147C98.9165 32.0074 98.9383 31.9929 98.9565 31.982C99.2652 31.8694 99.574 31.7386 99.8682 31.6042C99.9263 31.5715 99.988 31.5497 100.05 31.5207C100.384 31.3608 100.714 31.1938 101.038 31.0085C101.085 30.9831 101.136 30.954 101.183 30.9286C101.299 30.856 101.419 30.787 101.535 30.7107C101.623 30.6562 101.71 30.6017 101.793 30.5472C101.88 30.4891 101.968 30.431 102.055 30.3692C102.175 30.2893 102.287 30.2094 102.407 30.1223C102.462 30.0859 102.52 30.0423 102.578 29.9988C102.741 29.8789 102.901 29.7481 103.057 29.621C103.068 29.6137 103.079 29.6028 103.09 29.5992C103.112 29.5774 103.134 29.5593 103.159 29.5411C103.17 29.5338 103.181 29.5193 103.192 29.5084C103.911 28.8909 104.005 27.7722 103.373 27.0312C102.807 26.3738 101.88 26.2103 101.15 26.6171C101.049 26.6716 100.951 26.7406 100.86 26.8169C99.8936 27.6051 98.8148 28.2517 97.6307 28.6839C96.4103 29.1125 95.1535 29.3631 93.8278 29.3631C90.8493 29.3631 88.0525 28.1754 85.9349 26.0614C84.8961 25.0589 84.1079 23.8748 83.534 22.549C83.3125 22.0187 83.1345 21.4957 83.0001 20.9581C82.7821 20.1009 82.6732 19.2183 82.6732 18.3175C82.6732 17.7836 82.7095 17.2569 82.7858 16.7375C82.9202 15.8221 83.1672 14.9286 83.534 14.0823C84.1079 12.7529 84.9324 11.5761 85.9349 10.5663C86.9774 9.52748 88.1942 8.73928 89.5236 8.16539C90.9256 7.58786 92.393 7.30455 93.9004 7.30455C96.3413 7.30455 98.6005 8.05642 100.5 9.52748C100.627 9.62555 100.769 9.69456 100.914 9.75268C102.055 10.708 102.999 11.8884 103.686 13.2287C100.936 16.9954 96.4757 19.4544 91.4559 19.4544Z" fill="#FFC634" />
            <path d="M108.491 12.8908C108.491 12.8908 109.385 0.326901 128 0C127.996 0 123.329 18.4663 108.491 12.8908Z" fill="#FFC634" />
            <path d="M108.753 14.0422C108.753 14.0422 116.446 14.5871 116.646 25.9887C116.646 25.9887 105.338 23.1301 108.753 14.0422Z" fill="#FFC634" />
          </svg>
          <div class="mt-4 text-right">
            Hotline:
            <a href="tel:0966001084" class="text-decoration-none font-weight-bold text-dark text-nowrap">096 600 1084</a>
          </div>
          <div class="mt-2 text-right">
            Email:
            <a href="mailto:hello@juicebazar.com" class="text-decoration-none font-weight-bold text-dark text-nowrap">hello@juicebazar.com</a>
          </div>
          <div class="social-btn-group mt-3">
            <a href="www.facebook.com" class="fab fa-facebook-square text-decoration-none text-dark" style="font-size:24px"></a>
            <a href="www.instagram.com" class="fab fa-instagram text-decoration-none text-dark" style="font-size:24px"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of row -->
</div>

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Font awesome  -->
<script src="assets/js/all.min.js"></script>

<!-- jQuery Validate -->
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>

<!-- jQuery TableSorter -->
<script type="text/javascript" src="assets/js/jquery.tablesorter.combined.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.tablesorter.pager.min.js"></script>
<script type="text/javascript" src="assets/js/widget-cssStickyHeaders.min.js"></script>

<!-- SummerNote Editor -->
<script type="text/javascript" src="assets/js/summernote.min.js"></script>

<!-- custom script -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/client.js"></script>
</body>

</html>