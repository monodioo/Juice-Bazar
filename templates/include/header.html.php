<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="assets/css/bootstrap.min.css"      
      crossorigin="anonymous"
    />
    <!-- google font -->
    <link
    href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap"
    rel="stylesheet"
    />
    <!--  font awesome -->
    <link href="assets/css/all.min.css" rel="stylesheet" /> 
    <!-- favicon -->
    <link href="assets/image/favicon.png" sizes="32x32" rel="shortcut icon">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    
    <title>Juice Bazar</title>
  </head>
  <body>
    <div class="container-fluid site-wrap">
      <nav class="navbar navbar-expand-lg sticky-top row">
        <div class="col-4 px-0 pt-2">
          <i
          class="fas fa-bars btn-nav js-menu-toggle d-sm-block d-lg-none"
            style="color: #ffc634; cursor: pointer"
          ></i>
          <div class=" d-none d-lg-block">
            <ul class="navbar-nav js-clone-nav">
              <li class="nav-item">
                <a class="nav-link nav-hover <?php if($_REQUEST['section']=='shop') echo 'nav-hover-active'; ?> mr-lg-3" href="?section=shop&typeid=0" id="navShop"
                  >Shop <span class="sr-only">(current)</span></a
                >
              </li>

              <li class="nav-item">
                <a class="nav-link nav-hover <?php if($_REQUEST['section']=='blog') echo 'nav-hover-active'; ?> mr-lg-3" href="?section=blog" id="navBlog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-hover <?php if($_REQUEST['section']=='aboutus') echo 'nav-hover-active'; ?>" href="?section=aboutus" id="navAbout">Về chúng tôi</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-4 text-center">
          <a class="text-center js-logo-clone text-decoration-none" href="?section=home">
            <svg
              width="128"
              height="32"
              viewBox="0 0 128 32"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="img-fluid"
            >
              <path
                d="M47.5408 31.5455C46.5768 31.5455 45.748 30.7787 45.748 29.8039V5.90383C45.748 4.95637 46.5768 4.16226 47.5408 4.16226C48.5443 4.16226 49.3336 4.96185 49.3336 5.90383V29.8039C49.3392 30.7787 48.5499 31.5455 47.5408 31.5455Z"
                fill="#FFC634"
              />
              <path
                d="M8.02672 31.9288C6.94993 31.9288 6.01409 31.8248 5.12334 31.6167C2.93595 31.0909 1.2503 29.9463 0.246803 28.3416C-0.254946 27.5092 0.0325729 26.4631 0.889491 25.9429C1.71258 25.4554 2.82883 25.7293 3.32494 26.5672C3.82669 27.3339 4.68925 27.8925 5.90697 28.2102C6.48201 28.3471 7.27128 28.4457 7.98726 28.4457C9.63908 28.4457 10.8568 28.0733 11.6066 27.3011C12.6157 26.2222 12.5425 24.6887 12.5425 24.6504V5.90383C12.5425 4.92899 13.3317 4.16226 14.3352 4.16226C15.3049 4.16226 16.128 4.92899 16.128 5.90383V24.4751C16.128 25.0337 16.1618 27.6078 14.2281 29.6286C13.546 30.357 12.6834 30.9211 11.7194 31.3045C10.6426 31.7152 9.38539 31.9288 8.02672 31.9288Z"
                fill="#FFC634"
              />
              <path
                d="M30.8704 31.9617C28.2545 31.9617 25.9938 31.4414 24.1616 30.3954C22.5831 29.5246 21.3654 28.3033 20.469 26.737C18.9976 24.0918 18.9976 21.337 18.9976 20.4334V5.90383C18.9976 4.95637 19.8263 4.16226 20.7903 4.16226C21.7938 4.16226 22.5831 4.96185 22.5831 5.90383V20.4279C22.5831 21.1234 22.5831 23.2155 23.626 25.0611C24.2011 26.0688 24.9509 26.841 25.9544 27.3942C27.2116 28.0952 28.8578 28.4785 30.8704 28.4785C32.8774 28.4785 34.5292 28.0952 35.7808 27.3996C36.7504 26.841 37.5397 26.0743 38.0753 25.0995C39.1182 23.2155 39.1182 21.1289 39.1182 20.4334V5.90383C39.1182 4.95637 39.9413 4.16226 40.911 4.16226C41.9145 4.16226 42.7038 4.96185 42.7038 5.90383V20.4279C42.7038 21.337 42.7038 24.1191 41.2323 26.7315C39.9075 29.1357 37.038 31.9617 30.8704 31.9617Z"
                fill="#FFC634"
              />
              <path
                d="M66.6977 31.9946C64.6907 31.9946 62.7514 31.6112 60.9191 30.8445C59.1997 30.1106 57.6211 29.1029 56.2568 27.7775C54.8925 26.4851 53.8552 24.9516 53.0998 23.2484C52.3105 21.5068 51.9553 19.6557 51.9553 17.7772C51.9553 15.8604 52.35 14.0148 53.0998 12.2677C53.8552 10.5973 54.932 9.06387 56.2963 7.77139C57.6606 6.45152 59.273 5.43834 61.0319 4.70447C62.8641 3.97608 64.7978 3.59271 66.771 3.59271C70.0014 3.59271 73.0119 4.56755 75.5206 6.45152C76.3099 7.04299 76.4564 8.12189 75.8814 8.88862C75.2725 9.64987 74.1225 9.79774 73.3727 9.23365C71.4728 7.80425 69.2121 7.07585 66.771 7.07585C65.2658 7.07585 63.7943 7.34969 62.3962 7.91378C61.0714 8.4724 59.8536 9.23365 58.8107 10.2468C57.8072 11.2271 56.9841 12.3718 56.409 13.6643C55.834 14.9567 55.5521 16.3478 55.5521 17.7772C55.5521 19.2011 55.8396 20.5648 56.409 21.8902C56.9841 23.1772 57.7734 24.3273 58.8107 25.3021C60.9248 27.3558 63.7267 28.5114 66.7034 28.5114C68.0282 28.5114 69.2854 28.265 70.5031 27.8487C71.687 27.4325 72.7638 26.8027 73.7278 26.036C74.4833 25.4062 75.5939 25.5102 76.2422 26.2441C76.8849 26.978 76.7778 28.0897 76.028 28.6812C74.737 29.7327 73.305 30.5268 71.7603 31.0854C70.1367 31.6879 68.4172 31.9946 66.6977 31.9946Z"
                fill="#FFC634"
              />
              <path
                d="M91.4185 18.8945C90.99 18.8945 90.5728 18.8726 90.1556 18.8397C89.964 18.8288 89.7723 18.8068 89.5806 18.7849C88.6448 18.8397 87.9006 19.59 87.9006 20.5101C87.9006 21.3151 88.47 21.9888 89.2423 22.1859C89.4284 22.2078 89.6201 22.2188 89.8117 22.2407C90.3417 22.279 90.8773 22.3119 91.4185 22.3119C96.6784 22.3119 101.431 20.1924 104.83 16.7914C105.907 15.7125 106.843 14.5077 107.621 13.1933C107.142 11.8187 106.454 10.5316 105.591 9.38702C102.925 5.82721 98.6064 3.51059 93.7299 3.51059C87.1451 3.51059 81.5752 7.7276 79.7204 13.5328C79.2919 14.8637 79.0608 16.2876 79.0608 17.7608C79.0608 17.7663 79.0608 17.7663 79.0608 17.7718V17.7772C79.0608 17.7827 79.0608 17.7827 79.0608 17.7882C79.0608 19.3764 79.3201 20.9373 79.8726 22.4269C81.8627 27.9966 87.3143 32.0001 93.7243 32.0001H93.7581H93.7975C94.5022 32.0001 95.207 31.9453 95.906 31.8412C95.9568 31.8303 96.0075 31.8303 96.0582 31.8193C96.2217 31.792 96.3796 31.7646 96.5374 31.7317C96.6445 31.7153 96.7573 31.6879 96.8644 31.666C96.9546 31.6496 97.0392 31.6277 97.1237 31.6112C97.2929 31.5729 97.4564 31.5291 97.6199 31.4853C97.6255 31.4853 97.6311 31.4798 97.6368 31.4798C97.8735 31.4141 98.1103 31.3429 98.3527 31.2662C98.4937 31.2169 98.629 31.1731 98.7699 31.1293C98.7981 31.1183 98.8319 31.1074 98.8601 31.0909C98.8827 31.08 98.9052 31.069 98.9278 31.0581C99.2379 30.9486 99.5423 30.8226 99.8411 30.6912C99.9031 30.6583 99.9595 30.6419 100.021 30.609C100.354 30.4502 100.687 30.2914 101.008 30.1106C101.053 30.0832 101.104 30.0613 101.155 30.034C101.273 29.9628 101.391 29.897 101.504 29.8258C101.589 29.7711 101.679 29.7218 101.764 29.667C101.848 29.6123 101.938 29.552 102.023 29.4918C102.141 29.4151 102.26 29.3384 102.372 29.2508C102.429 29.2179 102.485 29.1741 102.541 29.1303C102.705 29.0153 102.863 28.8893 103.021 28.7634C103.032 28.7524 103.043 28.7469 103.055 28.7415C103.077 28.7196 103.1 28.7031 103.122 28.6867C103.133 28.6812 103.145 28.6648 103.156 28.6538C103.872 28.0514 103.968 26.967 103.336 26.2496C102.767 25.6088 101.842 25.45 101.115 25.8498C101.014 25.8991 100.918 25.9703 100.828 26.047C99.8636 26.8137 98.7812 27.4435 97.6029 27.8597C96.3852 28.276 95.128 28.5224 93.8032 28.5224C90.8265 28.5224 88.0302 27.3723 85.9105 25.3131C84.8732 24.3437 84.0839 23.1882 83.5089 21.9011C83.289 21.3863 83.1086 20.877 82.9733 20.3567C82.7534 19.5243 82.6463 18.6699 82.6463 17.7937C82.6463 17.2789 82.6858 16.7641 82.7591 16.2602C82.8944 15.3675 83.1368 14.5022 83.5089 13.6807C84.0839 12.3882 84.907 11.2436 85.9105 10.2633C86.9535 9.25558 88.1712 8.48885 89.496 7.93024C90.8942 7.37162 92.3656 7.09231 93.8708 7.09231C96.3119 7.09231 98.567 7.8207 100.467 9.25011C100.591 9.34321 100.737 9.41441 100.878 9.46917C102.017 10.3947 102.964 11.5448 103.646 12.8428C100.895 16.5067 96.4416 18.8945 91.4185 18.8945Z"
                fill="#FFC634"
              />
              <path
                d="M108.45 12.5196C108.45 12.5196 109.34 0.317645 127.95 0C127.95 0 123.282 17.936 108.45 12.5196Z"
                fill="#FFC634"
              />
              <path
                d="M108.715 13.6368C108.715 13.6368 116.405 14.1681 116.608 25.2364C116.602 25.2364 105.298 22.4652 108.715 13.6368Z"
                fill="#FFC634"
              />
            </svg>
            <svg
              width="129"
              height="28"
              viewBox="0 0 129 28"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="img-fluid"
            >
              <path
                d="M74.6507 27.9124H55.1051C54.423 27.9124 53.8141 27.529 53.4928 26.8992C53.2052 26.3077 53.2785 25.5738 53.707 25.0536L70.9186 4.04517H55.6745C54.7048 4.04517 53.8817 3.27844 53.8817 2.3036C53.8817 1.33423 54.7048 0.567505 55.6745 0.567505H74.6451C75.3272 0.567505 75.9361 0.950869 76.2631 1.54235C76.5506 2.16668 76.4773 2.86222 76.0489 3.3825L58.8372 24.4292H74.6507C75.6204 24.4292 76.4435 25.196 76.4435 26.1653C76.4435 27.1073 75.6204 27.9124 74.6507 27.9124Z"
                fill="#FFC634"
              />
              <path
                d="M126.365 27.9124C125.536 27.9124 124.786 27.3209 124.606 26.483C124.178 24.3526 123.495 22.6493 122.565 21.3623C121.883 20.3875 121.02 19.6865 120.056 19.2374C119.301 18.854 118.551 18.7116 117.976 18.6788C117.508 18.6788 117.006 18.7116 116.505 18.7116C115.608 18.7116 114.819 18.0161 114.746 17.1124C114.639 16.2417 115.281 15.3983 116.178 15.2668C116.319 15.2285 117.001 15.0861 118.004 15.1573C119.87 15.0532 121.342 14.6699 122.419 14.0784C123.997 13.2131 124.753 11.8494 124.753 9.79566C124.753 8.4046 124.465 7.24902 123.963 6.34538C123.569 5.68271 122.994 5.15695 122.317 4.74072C121.026 4.04519 119.701 4.01233 119.588 4.01233H110.732V26.1653C110.732 27.1073 109.942 27.9124 108.939 27.9124C107.969 27.9124 107.146 27.1073 107.146 26.1653V2.26528C107.146 1.29044 107.969 0.523712 108.939 0.523712H119.588C119.735 0.523712 120.592 0.523712 121.703 0.803021C123.281 1.18639 124.679 1.91478 125.756 2.96082C126.545 3.72207 127.188 4.66405 127.616 5.74843C128.084 6.93138 128.338 8.28959 128.338 9.79018C128.338 13.0652 126.906 15.6064 124.217 17.107C124.037 17.2056 123.856 17.2767 123.642 17.3863C124.285 17.9066 124.86 18.498 125.401 19.1936C126.692 20.9023 127.588 23.1313 128.124 25.8148C128.304 26.7568 127.695 27.6988 126.726 27.874C126.579 27.874 126.472 27.9124 126.365 27.9124Z"
                fill="#FFC634"
              />
              <path
                d="M50.967 25.4862L39.7933 1.54782C39.5396 0.956339 38.8631 0.534637 38.1753 0.534637C37.4537 0.534637 36.8448 0.923479 36.5235 1.54782L25.1749 25.4862C24.8141 26.2858 24.707 27.2661 25.4963 27.7535C26.2517 28.2081 27.1481 27.9945 27.8303 27.3318C29.1946 26.0448 31.0606 24.6099 32.859 23.531C34.6179 22.4795 36.4163 21.8223 38.2429 21.4773C38.8292 21.3459 39.4156 21.2582 40.0075 21.198C40.0583 21.2035 40.1146 21.2035 40.171 21.2035C40.3119 21.2035 40.4416 21.1925 40.5713 21.1542C41.2873 20.9844 41.8115 20.3491 41.8115 19.6098C41.8115 18.739 41.0899 18.027 40.1992 18.0106H40.1654C40.0752 18.0106 39.9906 18.0215 39.906 18.0325C39.1562 18.0982 38.4064 18.2077 37.6623 18.3666C35.6496 18.7499 33.1352 19.6919 31.2354 20.7434L38.1302 6.47131L47.6465 26.9539C48.1482 27.8959 49.225 28.1752 50.0537 27.8247C50.967 27.4085 51.3617 26.3953 50.967 25.4862Z"
                fill="#FFC634"
              />
              <path
                d="M104.762 25.4862L93.5934 1.54782C93.3397 0.956339 92.6575 0.534637 91.9754 0.534637C91.2594 0.534637 90.6449 0.923479 90.3235 1.54782L78.975 25.4862C78.6142 26.2858 78.507 27.2661 79.2963 27.7535C80.0518 28.2081 80.9481 27.9945 81.6303 27.3318C82.9946 26.0448 84.8607 24.6099 86.6591 23.531C88.418 22.4795 90.2164 21.8223 92.043 21.4773C92.6237 21.3459 93.2156 21.2582 93.8019 21.198C93.8583 21.2035 93.9147 21.2035 93.9654 21.2035C94.1064 21.2035 94.2417 21.1925 94.3714 21.1542C95.0873 20.9844 95.6116 20.3491 95.6116 19.6098C95.6116 18.739 94.8956 18.027 93.9993 18.0106H93.9654C93.8752 18.0106 93.7907 18.0215 93.7061 18.0325C92.9563 18.0982 92.2121 18.2077 91.468 18.3666C89.461 18.7499 86.9409 19.6919 85.0411 20.7434L91.9359 6.47131L101.452 26.9539C101.954 27.8959 103.036 28.1752 103.859 27.8247C104.761 27.4085 105.156 26.3953 104.762 25.4862Z"
                fill="#FFC634"
              />
              <path
                d="M19.2724 13.3117C20.9581 12.1233 22.3901 10.1024 21.9278 6.83282C21.3189 2.61581 18.0547 0.562073 13.3586 0.562073H2.74295C1.77328 0.562073 0.950195 1.3288 0.950195 2.29817V26.1763C0.950195 26.1654 0.95583 26.1599 0.95583 26.1489C0.95583 26.1599 0.95583 26.1763 0.95583 26.1873C0.95583 26.1818 0.95583 26.1763 0.95583 26.1763V26.1982V26.2037C0.95583 26.2092 0.95583 26.2092 0.95583 26.2092C0.95583 26.4447 1.00657 26.6802 1.09677 26.8883V26.8938C1.18697 27.1019 1.32228 27.299 1.49141 27.4578C1.49705 27.4688 1.50832 27.4688 1.51959 27.4798C1.67181 27.6221 1.85222 27.7426 2.05517 27.8248C2.16229 27.8686 2.26939 27.896 2.38215 27.9179C2.51745 27.9453 2.65276 27.9672 2.7937 27.9672C2.85008 27.9672 2.90645 27.9562 2.96846 27.9507H2.93464C3.84793 27.8631 4.53572 27.1183 4.53572 26.2092C4.53572 26.1489 4.55264 26.0942 4.547 26.0339V4.04521H13.3699C16.4142 4.04521 18.1055 4.98172 18.3874 7.24905C18.7087 10.075 17.3106 11.8111 14.6553 12.0904L11.9323 12.1233C10.9626 12.1233 10.1395 12.89 10.1395 13.8648C10.179 14.8068 10.9682 15.6064 11.9323 15.6064H11.9661L14.7624 15.579H14.8695C18.3873 15.579 20.321 17.2439 19.9602 20.6613C19.7122 23.2408 17.9871 24.4293 15.0837 24.4293H8.53279H7.86756C7.01064 24.5826 6.36231 25.3 6.36231 26.1818C6.36231 27.1073 7.0952 27.8631 8.02541 27.9453H8.37494H15.0837C19.8531 27.9453 23.1906 25.2946 23.5514 20.979C23.8615 17.0413 21.6346 14.1113 19.2724 13.3117Z"
                fill="#FFC634"
              />
            </svg>
          </a>
        </div>
        <div class="col-4 pr-0">
          <div
            class="float-right nav-icon-group d-flex flex-row align-items-center justify-content-end"
          >
            <form class="search-input-wrap d-flex flex-row align-items-center ">
              <input type="text" class="form-control pb-0 px-0 d-none d-lg-block" name="search" id="searchInput" placeholder="Search">
              <button type="submit" class="btn pb-0 px-0 d-none d-lg-block"><i class="fas fa-search nav-icon" aria-hidden="true"></i></button>
            </form>
            <a href="?section=profile" class="text-decoration-none"
              ><i class="far fa-user-circle  nav-icon  d-none d-lg-block"></i
            ></a>
            <a
              href="?section=cart"
              class="d-flex justify-content-center align-items-center btn-cart text-decoration-none px-3 py-2 text-white"
            >
              <span class="cart-sum d-none d-lg-block mr-2"
                >40.000₫</span
              >
              <span>
                <svg
                  class="cart-icon mr-2"
                  width="30"
                  height="24"
                  viewBox="0 0 30 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="img-fluid"
                >
                  <path
                    d="M26.04 15.6718L29.5424 5.18898C29.7181 4.68503 29.5851 4.38209 29.4433 4.18206C29.0802 3.67035 28.3335 3.66549 28.1888 3.66549L8.39518 3.66161L7.86696 1.15548C7.72423 0.564146 7.30282 0 6.4532 0H0.890398C0.31363 0 0 0.269936 0 0.808836V2.25561C0 2.77704 0.312659 2.91297 0.910789 2.91297H5.60747L9.20207 18.1741C8.63113 18.779 8.32041 19.6606 8.32041 20.4831C8.32041 22.293 9.76136 23.9612 11.6024 23.9612C13.3404 23.9612 14.6435 22.3328 14.8552 21.3618H21.856C22.0677 22.3328 23.1232 24 25.1079 24C26.9168 24 28.3879 22.4328 28.3879 20.6258C28.3879 18.8285 27.2955 17.2351 25.1263 17.2351C24.2243 17.2351 23.1542 17.7206 22.6571 18.4488H14.0551C13.4307 17.4778 12.5782 17.1768 11.716 17.1429L11.5965 16.5069H24.6845C25.671 16.5069 25.8652 16.1476 26.04 15.6718ZM25.1321 19.3528C25.8128 19.3528 26.3653 19.9053 26.3653 20.586C26.3653 21.2667 25.8128 21.8192 25.1321 21.8192C24.4515 21.8192 23.898 21.2676 23.898 20.586C23.899 19.9053 24.4515 19.3528 25.1321 19.3528ZM12.8219 20.586C12.8219 21.2744 12.2626 21.8347 11.5761 21.8347C10.8877 21.8327 10.3274 21.2744 10.3274 20.586C10.3274 19.8976 10.8877 19.3373 11.5761 19.3373C12.2626 19.3373 12.8219 19.8976 12.8219 20.586Z"
                    fill="white"
                  />
                </svg>
              </span>
              <span class="cart-count">1</span>
            </a>
          </div>
        </div>
      </nav>
      <!--END OF NAVIGATION -->