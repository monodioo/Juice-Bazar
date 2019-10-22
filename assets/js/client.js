$(document).ready(function() {
  $(document).on("click", ".juice-volume-btn", function() {
    $(this).addClass("juice-volume-btn-active");
    $(this)
      .siblings()
      .removeClass("juice-volume-btn-active");
    $.ajax({
      url: "templates/scripts/shopSelectCapacity.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: $(this).attr("id")
      },
      success: function(result) {
        $("#priceCapacity" + result.productId).text(result.price);
        $("#addThisPrice" + result.productId).val(result.price);
        $("#addThisId" + result.productId).val(result.productDetailId);
      }
    });
  });

  // Event add product from shop to cart.
  $(document).on("click", ".addCartBtn", function() {
    var product_id = $(this).attr("id");
    $.ajax({
      url: "templates/scripts/shopAddToCart.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: $("#addThisId" + product_id).val(),
        quantity: $("#quantity" + product_id).val(),
        price: $("#addThisPrice" + product_id).val()
      },
      success: function(result) {
        $("#cart-sum").html(result.totalPrice);
        $("#cart-count").html(result.cartCount);
      }
    });
  });
  // Update cart: Change quantity
  $(document).on("click", ".js-btn-quantity", function() {
    let index_cart = $(this).attr("data-productDetailId");
    $.ajax({
      url: "templates/scripts/cartUpdate.php",
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
      url: "templates/scripts/cartUpdate.php",
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

  // Update cart: delete item
  $(document).on("click", ".js-cart-delete", function() {
    let index_cart = $(this).attr("data-productDetailId");
    $.ajax({
      url: "templates/scripts/cartUpdate.php",
      type: "post",
      dataType: "json",
      data: {
        productDetailId: index_cart,
        action: "delete"
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

  //Update cart: add coupon
  $(document).on("click", "#couponBtn", function() {
    $.ajax({
      url: "templates/scripts/cartUpdate.php",
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
});
