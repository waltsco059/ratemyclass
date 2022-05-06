// class_delete.js
// Whenever the class-delete link is clicked on the Account Page, executes class_delete.php()
// This causes the class listing to be deleted from the users account

$(document).ready(function(){
    $("#class-delete").click("../scripts/class_delete.php", function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")
        console.log("Deleting Class");
      if(statusTxt == "error")
        alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
});
