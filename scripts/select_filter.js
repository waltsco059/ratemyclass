// select_filter.js
// Handles searching for classes using the dropdown selections
// Runs every time the selections are changed
// Is pretty broken and cannot handle multiple selections at once

$(document).ready(function(){
  $("#filter-prating").on("change", function() {
    var value = $(this).val();
    $(".content-piece").filter(function() {
      $(this).toggle($(this).find(".professor-rating").text().indexOf(value) > -1)
    });
  });

  $("#filter-crating").on("change", function() {
    var value = $(this).val();
    $(".content-piece").filter(function() {
      $(this).toggle($(this).find(".class-rating").text().indexOf(value) > -1)
    });
  });

  $("#filter-difficulty").on("change", function() {
    $difficulty_list = {
    0 : "Easy",
    1 : "Medium",
    2 : "Hard"
    };

    var value = $(this).val();
    var value = $difficulty_list[value];
    $(".content-piece").filter(function() {
      $(this).toggle($(this).find(".difficulty").text().indexOf(value) > -1)
    });
  });

  $("#filter-semester").on("change", function() {
    $semester_list = {
    "s22" : "Spring 2022",
    "f21" : "Fall 2021",
    "s21" : "Spring 2021",
    "f20" : "Fall 2020"
    };

    var value = $(this).val();
    var value = $semester_list[value];
    $(".content-piece").filter(function() {
      $(this).toggle($(this).find(".info").text().indexOf(value) > -1)
    });
  });

  $("#filter-college").on("change", function() {
    $college_list = {
    "ns" : "Natural Sciences",
    "la" : "Liberal Arts",
    "en" : "Engineering",
    "bu" : "Business",
    "ed" : "Education",
    "co" : "Communication",
    "fa" : "Fine Arts",
    "lw" : "Law",
    "un" : "Undergraduate"
    };

    var value = $(this).val();
    console.log(value);
    var value = $college_list[value];
    console.log(value);
    $(".content-piece").filter(function() {
      $(this).toggle($(this).find(".info").text().indexOf(value) > -1)
    });
  });



});