$(document).ready(function(){
    $("#content-pieces").load("scripts/class_fromdb.php", function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")
        console.log("External content loaded successfully!");
      if(statusTxt == "error")
        alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
});
