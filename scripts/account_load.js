// account_load.js
// When the content-pieces div loads, account_fromdb.php() will execute
// This loads all of the database information when the page loads

$(document).ready(function(){
    $("#content-pieces").load("../scripts/account_fromdb.php", function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")
        console.log("External content loaded successfully!");
      if(statusTxt == "error")
        alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
});
