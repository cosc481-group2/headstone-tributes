src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery


function validateUser() {
                        

  $("#err").html(""); // clears error

  if ($("#user_name").val() == "") {
      $("#err").html("Username can not be blank");
  }
  else if ($("#password").val() == "") {
    $("#err").html("Password can not be blank");
  }
  else { // get data
    $("#err").html("Passed initial checks");
    $.get("/src/controller/UserController.php?func=all", function(data) {
      console.log(data);
    
    });

  }

}
