/*
Andy Bodnar
COSC 481
Winter 2023
*/



function updateProfile() {
  $("#success_msg").html("");
  $("#success_msg2").html("");
  $("#err_user_name").html(""); // clears user name
  $("#err_password1").html("");
  $("#onload_err").html("");


  const ob = {
    first_name: $("#first_name").val(),
    last_name: $("#last_name").val(),
    email: $("#email").val(),
    user_name: $("#user_name").val().toLowerCase(),
    user_id: sessionStorage.getItem("user_id"),
    ok: true,
    pw1: $("#password1").val(),
    pw2: $("#password2").val(),
    pw: $("#password1").val(),
    success_msg: ""

  }

  validateUserName(ob);
  validateFLE(ob);
  updateNonPWs(ob);

  // Passwords

  if (ob.pw1 == "" && ob.pw2 == "") {// no entries
    // do nothing
  }
  else if (ob.pw1 != ob.pw2) {
    $("#err_password1").html("* Passwords blank or don't match");
  }
  else { // change password
    let url = "/src/controller/UserController.php";
    ob.func = "updatePw"
    $.post(url, ob, function (data) {
      let msg = 'Password updated'
      console.log(msg);
      $("#success_msg2").html(msg);
    }); // end postupdate login tbl


  }

} // end profile update



//UPDATE NON-PASSWORD DATA
function updateNonPWs(ob) {
  if (!ob.ok) {
    return;
  }

  else { // execute post call
    let url = "/src/controller/UserController.php";
    ob.func = "updateUser"
    $.post(url, ob, function (data) {
      let msg = 'Non-Password data updated'
      console.log(msg);
      $("#success_msg").html(msg);
    }); // end non pw updates
  }
} // NON-PW updates



// VALIDATE USER
function validateUserName(ob) {
  // is username Blank???
  if (ob.user_name == "") {
    ob.ok = false;
    $("#err_user_name").html("* Username can NOT be blank");
    return;
  }

  // Is username unchanged???   
  if (ob.user_name == localStorage.getItem("user_name"))
    return;

  // Does user exist???
  var data2
  let url = "/src/controller/UserController.php?func=getByUN&user_name=" + ob.user_name;
  $.ajax({ url: url, method: 'get', async: false }).done(function (data) {
    data2 = JSON.parse(data);
  }); // end username check

  if (data2 != false) { // found a user
    ob.ok = false;
    $("#err_user_name").html("* This user name is already taken");
  }

} // end validate User Name



// FLE -> First name, Last name, Email
function validateFLE(ob) {

  // FIRST name
  if (ob.first_name == "") { // check first name - blank
    $("#err_first_name").html("* first name is required");
    ob.ok = false;
  }
  else {
    $("#err_first_name").html("");
  }

  // LAST name
  if (ob.last_name == "") { // check last name - blank
    $("#err_last_name").html("* last name is required");
    ob.ok = false
  }
  else {
    $("#err_last_name").html("");
  }

  // Email
  if (!ob.email.includes("@")) { // check for @ in email
    $("#err_email").html("* Invalid email address");
    ob.ok = false;
  }
  else {
    $("#err_email").html("");
  }


} // end FLE






// PAGE ON-LOAD, pre-populates fields
function onLoadProfile() {

  // Logged in??????
  if (sessionStorage.getItem("is_login_ok") != "true") {
    $("#onload_err").html("Should never get here, use sessionStorage var 'user_id' == null to disable button");
    return;
  }

  // Get by user ID
  var data2
  let id = sessionStorage.getItem("user_id");
  let url = "/src/controller/UserController.php?func=get&user_id=" + id;
  $.ajax({ url: url, method: 'get', async: false }).done(function (data) {
    data2 = JSON.parse(data);
  }); // end username check

  // very rare
  if (data2 == false) { // user id exists, but is was NOT found, problem...
    alert("User id exists, but data NOT found, probably recently deleted")
    sessionStorage.removeItem("user_id")
  }

  else { // Data found... populate form
    $("#first_name").val(data2.first_name);
    $("#last_name").val(data2.last_name);
    $("#user_name").val(data2.user_name);
    $("#email").val(data2.email);
  } // end else, user name available

} // end onLoad



// REDIRECT TO HOME
function toIndex() {
  window.location.href = "index.php";
}