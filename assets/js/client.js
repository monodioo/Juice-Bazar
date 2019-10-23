$(document).ready(function() {
  //Shop: Select Capacity and Change Price
  $(document).on("click", ".juice-volume-btn", function() {
    $(this).addClass("juice-volume-btn-active");
    $(this)
      .siblings()
      .removeClass("juice-volume-btn-active");
    $.ajax({
      url: "templates/scripts/shop.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: $(this).attr("id"),
        action: "select_capacity"
      },
      success: function(result) {
        $("#priceCapacity" + result.productId).text(result.priceShow);
        $("#addThisPrice" + result.productId).val(result.priceValue);
        $("#addThisId" + result.productId).val(result.productDetailId);
      }
    });
  });

  // Shop: Add Product to Cart.
  $(document).on("click", ".addCartBtn", function() {
    var product_id = $(this).attr("id");
    $.ajax({
      url: "templates/scripts/shop.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: $("#addThisId" + product_id).val(),
        name: $("#addThisName" + product_id).val(),
        quantity: $("#quantity" + product_id).val(),
        price: $("#addThisPrice" + product_id).val(),
        action: "add_cart"
      },
      success: function(result) {
        $("#cart-sum").html(result.totalPrice);
        $("#cart-count").html(result.cartCount);
      }
    });
  });
  // Cart Update : Change Quantity
  $(document).on("click", ".js-btn-quantity", function() {
    let index_cart = $(this).attr("data-productDetailId");
    $.ajax({
      url: "templates/scripts/cart.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: index_cart,
        quantity: $("#quantity" + index_cart).val(),
        action: "change_quantity"
      },
      success: function(result) {
        $("#subPrice" + result.productDetailId).html(result.subPrice);
        $("#totalPrice").html(result.totalPrice);
        $("#lastPrice").html(result.lastPrice);
        $("#cart-sum").html(result.totalPrice);
      }
    });
  });

  $(document).on("change", ".js-change-quantity", function() {
    if ($(this).val() <= 0) $(this).val(parseInt(1));
    let index_cart = $(this).attr("data-productDetailId");
    $.ajax({
      url: "templates/scripts/cart.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: index_cart,
        quantity: $(this).val(),
        action: "change_quantity"
      },
      success: function(result) {
        $("#subPrice" + result.productDetailId).html(result.subPrice);
        $("#totalPrice").html(result.totalPrice);
        $("#lastPrice").html(result.lastPrice);
        $("#cart-sum").html(result.totalPrice);
      }
    });
  });

  // Cart Update: Delete Item
  $(document).on("click", ".js-cart-delete", function() {
    let index_cart = $(this).attr("data-productDetailId");
    $.ajax({
      url: "templates/scripts/cart.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: index_cart,
        action: "delete_item"
      },
      success: function(result) {
        $("#" + result.productDetailId).hide();
        if (result.cartCount == 0) $("#cart-empty").show();
        $("#totalPrice").html(result.totalPrice);
        $("#lastPrice").html(result.lastPrice);
        $("#cart-sum").html(result.totalPrice);
        $("#cart-count").html(result.cartCount);
      }
    });
  });

  //Cart Update: Delete Cart.
  $(document).on("click", "#js-cart-deleteAll", function() {
    $.ajax({
      url: "templates/scripts/cart.php",
      type: "post",
      data: {
        action: "delete_all"
      },
      success: function() {
        $(".list-cart").hide();
        $("#cart-empty").show();
        $("#totalPrice").html(0);
        $("#lastPrice").html(0);
        $("#cart-sum").html(0);
        $("#cart-count").html(0);
      }
    });
  });

  //Cart Update: Add Coupon
  $(document).on("click", "#couponBtn", function() {
    $.ajax({
      url: "templates/scripts/cart.php",
      type: "post",
      dataType: "json",
      data: {
        c_code: $("#c_code").val(),
        action: "add_coupon"
      },
      success: function(result) {
        $("#stCoupon").html(result.stCoupon);
        $("#c_code").val(result.promoName);
        $("#promovalue").html(result.promoValue * 100);
        $("#lastPrice").html(result.lastPrice);
      }
    });
  });

  //Search
  $("#searchBtn").on("click", function() {
    var search_input = $("#searchInput")
      .val()
      .toLowerCase();
    $(".search-item").filter(function() {
      $(this).toggle(
        $(this)
          .text()
          .toLowerCase()
          .indexOf(search_input) > -1
      );
    });
  //Popover profile button
  $("#profileBtn").popover({
    placement: "bottom",
    html: true,
    template:
      '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
  });

  //Profile table sorter

  var $profileTable = $("#profileTable");

  $profileTable
    .tablesorter({
      theme: "bootstrap",
      cssChildRow: "tablesorter-childRow",
      ignoreCase: true,
      sortLocaleCompare: true,
      sortTable: true,
      headerTemplate: "{content} {icon}",
      // widthFixed: false,
      widgets: ["filter", "cssStickyHeaders"],
      widgetOptions: {
        cssStickyHeaders_attachTo: ".table-wrapper",
        filter_childRows: true,
        filter_childByColumn: true,
        filter_childWithSibs: false,

        filter_ignoreCase: true
      }
    })
    .tablesorterPager({
      container: $(".ts-pager"),
      cssGoto: ".pagenum",
      removeRows: false,
      output: "{startRow} - {endRow} / {filteredRows} ({totalRows})"
    });

  $profileTable.find(".tablesorter-childRow").addClass("tablesorter-hidden");
  $profileTable.delegate(".toggle", "click", function() {
    $(this)
      .closest("tr")
      .nextUntil("tr.tablesorter-hasChildRow")
      .toggleClass("tablesorter-hidden");
    return false;
  });
});
