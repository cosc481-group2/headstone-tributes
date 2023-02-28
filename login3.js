src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery


function validateUser() {

  $("#err").html(""); // clears error

  sessionStorage.setItem("is_login_ok", false);
  var un = $("#user_name").val(); // use var for global scope
  var pw = $("#password").val();
  var user_data;
  var user_id;


  if (un == "") { // check user name - blank
    $("#err").html("Username can not be blank");
    return;
  }

  if (pw == "") { // pw
    $("#err").html("Password can not be blank");
    return;
  }


  // check user name - in DB?
  $("#err").html("Passed initial checks");

  let gf = "/src/controller/UserController.php?func=getByUN&user_name=" + un;

  $.get(gf, function (data) {
    user_data = JSON.parse(data);
    user_id = user_data.user_id;
    console.log('running .get UN........');
    console.log(user_data);
  
    if (user_data == false) {
      console.log('no username match');
      $("#err").html("Username not found");
    }
    else {



      // Verify password....................................................
      let user_id = sessionStorage.getItem("user_id");
      gf = "/src/controller/UserController.php?func=getLogByIdPw&user_id=" + user_id + "&pw=" + pw;

      $.get(gf, function (data) {
        data = JSON.parse(data);
        console.log('running .get PW........');
        console.log(data);
        if (data == false) {
          $("#err").html("Incorrect password");
        }
        else {

          
          // Finally.....
          $("#err").html(""); // clears error
          $("#success_msg").html("Success.... Credentials verified");
          sessionStorage.setItem("first_name", user_data.first_name);
          sessionStorage.setItem("is_login_ok", true);
          sessionStorage.setItem("user_id", user_id);
          localStorage.setItem("user_name", un); // permanent storage, potentially pre-populate user name later
          setTimeout(toIndex, 2000); // nice fade out back to index

        }
      }); // end pw check

    } // end UN else

 }); // end username check

} // end validate





function toRegistation() {
  window.location.href = "signup.php";
}

function toIndex() {
  window.location.href = "index.php";
}
