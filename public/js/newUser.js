src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery




function validateNewUser() {

  $("#success_msg").html("");

  const ob = {
    first_name: $("#first_name").val(),
    last_name: $("#last_name").val(),
    email: $("#email").val(),
    user_name: $("#user_name").val().toLowerCase(),
    pw1: $("#password1").val(),
    pw2: $("#password2").val(),
    pw: $("#password1").val(),
    ok: true,
    user_id: -1 // updated later
  }
  validateUserName(ob);
  validateFLE(ob);

  // Password validation
  if (ob.pw1 != ob.pw2 || ob.pw1 == "") {
    $("#err_password1").html("* Passwords blank or don't match");
    ob.ok = false;
  }
  else {
    $("#err_password1").html("");
  }

  updateTables(ob)

} // end validate











function updateTables(ob) {
  if (!ob.ok) return;

  var current_max_id
  let url = "/src/controller/UserController.php?func=nextId";
  $.ajax({ url: url, method: 'get', async: false }).done(function (data) {
    data = JSON.parse(data);
    current_max_id = data.max_current_id
    console.log("Current max id: " + current_max_id);
  }); // end username check
  ob.user_id = current_max_id + 1;



  ob.func = "add"
  url = "/src/controller/UserController.php";
  $.post(url, ob, function (data) {
    let msg = 'Success... User entered into database'
    console.log(msg);
    $("#success_msg").html(msg);
  }); // end update login tbl


}



function onLoadNewUser() {
  validateNewUser();
}


function toLogin() {
  window.location.href = "login.php";
}

function toIndex() {
  window.location.href = "index.php";
}


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


// VALIDATE USER
function validateUserName(ob) {
  // is username Blank???
  if (ob.user_name == "") {
    ob.ok = false;
    $("#err_user_name").html("* Username can NOT be blank");
    return;
  }


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

  else { // user name is available
    $("#err_user_name").html("");
  }

} // end validate User Name