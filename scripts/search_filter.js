// search_filter.js
// Handles searching for classes using the search bar
// Runs every time the keyup action occurs, and hides/displays any matching content found in the content-piece div

$(document).ready(function(){
  $("#filter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".content-piece").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});