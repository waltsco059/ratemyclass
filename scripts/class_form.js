// class_form.js
// The popup handler for adding a class to the database

$(document).ready(function () {
    $("#class-add-icon").click(function () {
        $("#class-add-popup").show();
    });

    $("#class-add-form").on("reset", function () {
        $("#class-add-popup").hide();
        return true;
    });

    //Contact Form validation on click event
    $("#class-add-form").on("submit", function () {
        var valid = true;
        $(".info").html("");
        $("inputBox").removeClass("input-error");
        
        var addClass = $("#add-class").val();
        var professor = $("#add-professor").val();
        var college = $("#add-college").val();
        var semester = $("#add-semester").val();

        if (addClass == "") {
            $("#add-class").addClass("input-error");
            $("#class-info").html("Required:");
        }
        if (professor == "") {
            $("#professor-info").html("Required:");
            $("#add-professor").addClass("input-error");
            valid = false;
        }

        if (college == "None") {
            $("#college-info").html("Required:");
            $("#add-college").addClass("input-error");
            valid = false;
        }

        if (semester == "None") {
            $("#semester-info").html("Required:");
            $("#add-semester").addClass("input-error");
            valid = false;
        }
        return valid;

    });
});
