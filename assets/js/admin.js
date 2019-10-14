jQuery(document).ready(function($) {
  // Table sorter plugin on products table

  $.extend($.tablesorter.characterEquivalents, {
    o: "\u1ED5",
    O: "\u1ED4"
  });

  var $prodTable = $("#prodTable");

  $prodTable
    .tablesorter({
      theme: "bootstrap",
      sortLocaleCompare: true,
      sortTable: true,
      ignoreCase: true,
      headerTemplate: "{content} {icon}", // new in v2.7. Needed to add the bootstrap icon!
      widthFixed: true,
      widgets: ["filter"],
      widgetOptions: {
        // extra css class name (string or array) added to the filter element (input or select)
        filter_cssFilter: [
          "form-control",
          "form-control",
          "form-control",
          "form-control custom-select",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control custom-select",
          "form-control"
        ]
      }
    })
    .tablesorterPager({
      // target the pager markup - see the HTML block below
      container: $(".ts-pager"),

      // target the pager page select dropdown - choose a page
      cssGoto: ".pagenum",

      // remove rows from the table to speed up the sort of large tables.
      // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
      removeRows: false,

      // output string - default is '{page}/{totalPages}';
      // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
      output: "{startRow} - {endRow} / {filteredRows} ({totalRows})"
    });

  // Table sorter plugin on products edit table
  $("#prodEditTable").tablesorter({
    // theme: "bootstrap",
    ignoreCase: true,
    widthFixed: true
  });

  //Delete modal
  $("#deleteModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var productId = button.data("product-id");
    var productName = button.data("product-name");
    var modal = $(this);
    modal.find("input#deleteProduct").val(productId);
    modal.find(".modal-text").text(productName);
  });

  //Calculate Sum of new quantity for products
  // $("#newQty1").change(function() {
  //   // $sumNew = $("#newQty1").val() + $("#newQty2").val();
  //   // $("#newQty").val($sumNew);
  //   console.log("aa");
  // });
});
