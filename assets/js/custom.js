jQuery(document).ready(function($) {
  var siteMenuClone = function() {
    $('<div class="site-mobile-menu pt-4"></div>').prependTo(".site-wrap");

    $('<div class="site-mobile-menu-header px-4"></div>').prependTo(
      ".site-mobile-menu"
    );
    $(
      '<div class="site-mobile-menu-close fixed-top mt-4 ml-4"></div>'
    ).prependTo(".site-mobile-menu-header");
    $('<div class="site-mobile-menu-logo"></div>').prependTo(
      ".site-mobile-menu-header"
    );

    $('<div class="site-mobile-menu-body"></div>').appendTo(
      ".site-mobile-menu"
    );

    $(".js-logo-clone")
      .clone()
      .appendTo(".site-mobile-menu-logo");

    $('<span class="fas fa-times js-menu-toggle"></div>').prependTo(
      ".site-mobile-menu-close"
    );

    $(".js-clone-nav").each(function() {
      var $this = $(this);
      $this
        .clone()
        .attr("class", "site-nav-wrap")
        .appendTo(".site-mobile-menu-body");
    });

    $(window).resize(function() {
      var $this = $(this),
        w = $this.width();

      if (w > 768) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });

    $("body").on("click", ".js-menu-toggle", function(e) {
      var $this = $(this);
      e.preventDefault();

      if ($("body").hasClass("offcanvas-menu")) {
        $("body").removeClass("offcanvas-menu");
        $this.removeClass("active");
      } else {
        $("body").addClass("offcanvas-menu");
        $this.addClass("active");
      }
    });

    // click outisde offcanvas
    $(document).mouseup(function(e) {
      var container = $(".site-mobile-menu");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });
  };
  siteMenuClone();

  var sitePlusMinus = function() {
    $(".js-btn-minus").on("click", function(e) {
      e.preventDefault();
      if (
        $(this)
          .closest(".input-group")
          .find(".form-control")
          .val() != 0
      ) {
        $(this)
          .closest(".input-group")
          .find(".form-control")
          .val(
            parseInt(
              $(this)
                .closest(".input-group")
                .find(".form-control")
                .val()
            ) - 1
          );
      } else {
        $(this)
          .closest(".input-group")
          .find(".form-control")
          .val(parseInt(0));
      }
    });
    $(".js-btn-plus").on("click", function(e) {
      e.preventDefault();
      $(this)
        .closest(".input-group")
        .find(".form-control")
        .val(
          parseInt(
            $(this)
              .closest(".input-group")
              .find(".form-control")
              .val()
          ) + 1
        );
    });
  };
  sitePlusMinus();

  $(".navbar-nav").on("click", e => {
    $(".navbar-nav")
      .find(".nav-link")
      .removeClass("nav-hover-active");
    console.log($(`#${e.target.id}`));
    $(`#${e.target.id}`).addClass("nav-hover-active");
  });

  $(".shop-nav").on("click", e => {
    $(".shop-nav")
      .find(".nav-link")
      .removeClass("nav-hover-active");
    // $(`#${e.target.id}`).addClass("nav-hover-active");
  });

  let $query = $(location)
    .attr("search")
    .slice(9);

  switch ($query) {
    case "shopAll":
      $(".shop-img-gradient").attr(
        "src",
        "../assets/image/shop-banner-all.png"
      );
      $(".shop-gradient-caption p").text(
        "Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất, chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa nước ép tới từng hộ gia đình."
      );

      $(`#${$query}`).addClass("nav-hover-active");
      break;
    case "shopFruits":
      $(".shop-img-gradient").attr(
        "src",
        "../assets/image/shop-banner-fruit.png"
      );
      $(".shop-gradient-caption p").text(
        "Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất, chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa nước ép tới từng hộ gia đình."
      );
      $(`#${$query}`).addClass("nav-hover-active");
      break;
    case "shopGreen":
      $(".shop-img-gradient").attr(
        "src",
        "../assets/image/shop-banner-green.png"
      );
      $(".shop-gradient-caption p").text(
        "Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất, chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa nước ép tới từng hộ gia đình."
      );
      $(`#${$query}`).addClass("nav-hover-active");
      break;
    case "shopCombo":
      $(".shop-img-gradient").attr(
        "src",
        "../assets/image/shop-banner-combo.png"
      );
      $(".shop-gradient-caption p").text(
        "Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất, chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa nước ép tới từng hộ gia đình."
      );
      $(`#${$query}`).addClass("nav-hover-active");
      break;
    default:
      $(".shop-img-gradient").attr(
        "src",
        "../assets/image/shop-banner-all.png"
      );
      $(".shop-gradient-caption p").text(
        "Juice Bazar là thương hiệu nước ép trái cây sử dụng công nghệ Cold-Pressed. Không chỉ hướng tới sản phẩm chất lượng nhất, chúng tôi đầu tư và áp dụng công nghệ hàng đầu để có thể đưa nước ép tới từng hộ gia đình."
      );
      $(`#shopAll`).addClass("nav-hover-active");
      break;
  }

  $("#loginForm").validate({
    rules: {
      emailLogin: {
        required: true,
        email: true
      },
      passwordLogin: {
        required: true,
        minlength: 6
      }
    },
    messages: {
      emailLogin: {
        required: "Xin điền địa chỉ email",
        email: "Xin điền đúng định dạng email"
      },
      passwordLogin: {
        required: "Xin điền lại mật khẩu",
        minlength: "Mật khẩu có tối thiểu 6 ký tự"
      }
    }
  });

  $("#signupForm").validate({
    rules: {
      emailSignup: {
        required: true,
        email: true
      },
      passwordSignup: {
        required: true,
        minlength: 6
      },
      password2Signup: {
        required: true,
        minlength: 6,
        equalTo: passwordSignup
      },
      genderSignup: "required",
      birthdaySignup: "required",
      addSignup: "required",
      distSignup: "required",
      telSignup: "required"
    },
    messages: {
      emailSignup: {
        required: "Xin điền địa chỉ email",
        email: "Xin điền đúng định dạng email"
      },
      passwordSignup: {
        required: "Xin điền lại mật khẩu",
        minlength: "Mật khẩu có tối thiểu 6 ký tự",
        equalTo: "Mật khẩu không trùng"
      }
    }
  });
});
