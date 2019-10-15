jQuery(document).ready(function($) {
  // Table sorter plugin on products table

  $.extend($.tablesorter.characterEquivalents, {
    o: "\u1ED5",
    O: "\u1ED4"
  });

  var $prodTable = $("#prodTable");
  var $orderTable = $("#orderTable");

  $prodTable
    .tablesorter({
      theme: "bootstrap",
      sortLocaleCompare: true,
      sortTable: true,
      ignoreCase: true,
      headerTemplate: "{content} {icon}", // new in v2.7. Needed to add the bootstrap icon!
      widthFixed: true,
      widgets: ["filter", "cssStickyHeaders"],
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
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control",
          "form-control custom-select",
          "form-control"
        ],
        cssStickyHeaders_offset: 145,
        // Set this option to false to make the searches case sensitive
        filter_ignoreCase: true
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

  $orderTable
    .tablesorter({
      theme: "bootstrap",
      cssChildRow: "tablesorter-childRow",
      ignoreCase: true,
      sortLocaleCompare: true,
      sortTable: true,
      headerTemplate: "{content} {icon}", // new in v2.7. Needed to add the bootstrap icon!
      widthFixed: true,
      widgets: ["filter", "cssStickyHeaders"],
      widgetOptions: {
        // extra css class name (string or array) added to the filter element (input or select)
        filter_cssFilter: [
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
          "form-control",
          "form-control",
          "form-control",
          "form-control custom-select",
          "form-control"
        ],
        cssStickyHeaders_offset: 70,
        // include child row content while filtering, if true
        filter_childRows: true,
        // filter child row content by column; filter_childRows must also be true
        filter_childByColumn: true,
        // Set this option to false to make the searches case sensitive
        filter_ignoreCase: true
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

  // hide child rows - don't use .hide() because filtered rows get a "filtered" class
  // added to them, and style="display: table-row;" will override this
  $orderTable.find(".tablesorter-childRow").addClass("tablesorter-hidden");

  // Toggle child row content (td), not hiding the row since we are using rowspan
  $orderTable.delegate(".toggle", "click", function() {
    // use "nextUntil" to toggle multiple child rows
    // toggle table cells instead of the row
    $(this)
      .closest("tr")
      .nextUntil("tr.tablesorter-hasChildRow")
      .toggleClass("tablesorter-hidden");
    return false;
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
  $("#newQty1").change(function() {
    $sumNew = Number($("#newQty1").val()) + Number($("#newQty2").val());
    $("#newQty").val($sumNew);
    $("#newQtyHidden").val($sumNew);
  });
  $("#newQty2").change(function() {
    $sumNew = Number($("#newQty1").val()) + Number($("#newQty2").val());
    $("#newQty").val($sumNew);
    $("#newQtyHidden").val($sumNew);
  });

  // SummerNote Editor
  $("#Description").summernote({
    toolbar: [
      ["style", ["bold", "italic", "underline", "clear"]],
      ["color", ["color"]],
      ["view", ["codeview", "help"]]
    ],
    popover: []
  });
  $("#Nutrition").summernote({
    toolbar: [
      ["style", ["bold", "italic", "underline", "clear"]],
      ["color", ["color"]],
      ["view", ["codeview", "help"]]
    ],
    popover: []
  });
});
