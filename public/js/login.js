src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery


function validateUser() {

  $("#err").html(""); // clears error
  $("#success_msg").html("");

  sessionStorage.setItem("is_login_ok", false);
  var un = $("#user_name").val(); // use var for global scope
  var pw = $("#password").val();


  if (un == "") { // check user name - blank
    $("#err").html("Username can not be blank");
    return;
  }

  if (pw == "") { // pw
    $("#err").html("Password can not be blank");
    return;
  }


  // check user name / PW in DB?

  let gf = "/src/controller/UserController.php?func=getLog2&user_name=" + un + "&pw=" + pw;

  $.get(gf, function (data) {
    data = JSON.parse(data);
    console.log('running .get 2........');
    console.log(data);

    if (data == false) {
      let e = 'No username / password match'
      console.log(e);
      $("#err").html(e);
    }
    else { // SUCCESS

      // Finally.....
      $("#err").html(""); // clears error
      $("#success_msg").html("Success.... Credentials verified");
      sessionStorage.setItem("first_name", data.first_name);
      sessionStorage.setItem("is_login_ok", true);
      sessionStorage.setItem("user_id", data.user_id);
      localStorage.setItem("user_name", un); // permanent storage, potentially pre-populate user name later
      setTimeout(toIndex, 2000); // nice fade out back to index

    } // end else, success

  }); // end username check

} // end validate

function onLoadLogin() {
  let un = $("#user_name").val(); // use var for global scope
  let checked = localStorage.getItem("rememberMe");

  let LastUsert = localStorage.getItem("user_name");
  if (checked != "true") {
    return
  }
  else {
    if (LastUsert) {
      $("#user_name").val(LastUsert);
      document.getElementById("remember").checked = true;
      console.log('Defaulted to last known user');
    }
  }
}


function rememberCheckBox() {
  let LastUsert = localStorage.getItem("user_name");
  let checked = document.getElementById("remember").checked;
  if (checked) {
    $("#user_name").val(LastUsert);
    localStorage.setItem("rememberMe", true);
  }
  else {
    $("#user_name").val("");
    localStorage.setItem("rememberMe", false);
  }
}



function toRegistation() {
  window.location.href = "signup.php";
}

function toIndex() {
  window.location.href = "index.php";
}

function logout() {
  if (sessionStorage.getItem("is_login_ok")){
    sessionStorage.removeItem("is_login_ok");
  $("#success_msg").html("Success.... Member logged out");
  }
  else {
    $("#success_msg").html("Nobody currently logged in");
  }
  
  
}