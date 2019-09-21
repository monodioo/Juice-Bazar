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
});
