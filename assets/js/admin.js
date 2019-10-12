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
      widthFixed: false,
      widgets: ["filter"],
      widgetOptions: {
        // extra css class name (string or array) added to the filter element (input or select)
        filter_cssFilter: [
          "form-control",
          "form-control",
          "form-control", // select needs custom class names :(
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
});
