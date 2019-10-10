jQuery(document).ready(function($) {
  // Table sorter plugin on products table
  $.extend($.tablesorter.characterEquivalents, {
    o: "\u1ED5",
    O: "\u1ED4"
  });

  $("#prodTable").tablesorter({
    sortLocaleCompare: true,
    sortTable: true,
    ignoreCase: true,
    headerTemplate: "{content}{icon}"
  });
});
