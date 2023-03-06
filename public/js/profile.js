/*
Andy Bodnar
COSC 481
*/

function updateProfile() {
  $("#success_msg").html("");
  $("#success_msg2").html("");
  $("#err_user_name").html(""); // clears user name
  $("#err_password1").html("");
  $("#onload_err").html("");


  const ob = {
    firstName: $("#first_name").val(),
    lastName: $("#last_name").val(),
    email: $("#email").val(),
    userName: $("#user_name").val().toLowerCase(),
    id: sessionStorage.getItem("user_id"),
    ok: true,
    err1: "No updates made",
    pw1: $("#password1").val(),
    pw2: $("#password2").val(),
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
    $.ajax({ url: url, method: 'post', async: false }).done({
      func: "updatePw", pw: ob.pw1, user_id: ob.id
    }, function (data) {
      let msg = 'Password updated'
      console.log(ob.success_msg);
      $("#success_msg2").html(msg);
    }); // end postupdate login tbl

  }

} // end profile update



// VALIDATE USER
function validateUserName(ob) {
  // is username Blank???
  if (ob.userName == "") {
    ob.ok = false;
    $("#err_user_name").html("* Username can NOT be blank");
    return;
  }

  // Is username unchanged???   
  if (ob.userName == localStorage.getItem("user_name"))
    return;

  // Does user exist???
  var data2
  let url = "/src/controller/UserController.php?func=getByUN&user_name=" + ob.userName;
  $.ajax({ url: url, method: 'get', async: false }).done(function (data) {
    data2 = JSON.parse(data);
  }); // end username check

  if (data2 != false) { // found a user
    ob.ok = false;
    $("#err_user_name").html("* This user name is already taken");
  }

} // end validate User Name



function updateNonPWs(ob) {
  if (!ob.ok) return;

  let url = "/src/controller/UserController.php";
  $.ajax({url:url, method: 'post', async:false }).done({
    func: "updateUser", user_id: ob.id, user_name: ob.userName, first_name: ob.firstName,
    last_name: ob.lastName, email: ob.email
  }, function (data) {

    let msg = 'Non-password data updated';
    $("#success_msg").html(msg);
    console.log(msg);
    sessionStorage.setItem("first_name", ob.firstName);
    localStorage.setItem("user_name", ob.userName);
  }); // end postupdate login tbl

}





// FLE -> First name, Last name, Email
function validateFLE(ob) {

  // FIRST name
  if (ob.firstName == "") { // check first name - blank
    $("#err_first_name").html("* first name is required");
    ob.ok = false;
  }
  else {
    $("#err_first_name").html("");
  }

  // LAST name
  if (ob.lastName == "") { // check last name - blank
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