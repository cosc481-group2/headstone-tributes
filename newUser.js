src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery


function validateProfNonPw() {
  $("#success_msg").html("");
  $("#err_user_name").html(""); // clears user name
  $("#onload_err").html("");


  const ob = {
    fName: $("#first_name").val(),
    lName: $("#last_name").val(),
    email: $("#email").val(),
    uName: $("#user_name").val(),
    id: sessionStorage.getItem("user_id"),
    ok: true,
    err1: "No updates made"
  }

  validateFLE(ob);

  let gf = "/src/controller/UserController.php?func=getByUN&user_name=" + ob.uName;
  $.get(gf, function (data) {
    data = JSON.parse(data);
    console.log('verifying user name: ' + data);

    if (data != false && ob.uName != localStorage.getItem("user_name")) { // user name exists, problem...
      $("#err_user_name").html("* This user name is already taken");
      ob.ok = false;
      $("#onload_err").html(ob.err1);
    }
    else { // user name available... good
      updateTablesProfile(ob);
    } // end else, user name available

  }); // end username check

}


function updateTablesProfile(ob) {
  if (!ob.ok) return;

    let gf2 = "/src/controller/UserController.php";
    $.post(gf2, {
      func: "updateUser", user_id: ob.id, user_name: ob.uName, first_name: ob.fName,
      last_name: ob.lName, email: ob.email
    }, function (data) {

      let msg = 'Success... Non-pw profile data updated'
      console.log(msg);
      $("#success_msg").html(msg);
    }); // end postupdate login tbl

}





function validateNewUser() {

  $("#success_msg").html("");

  const ob = {
    fName: $("#first_name").val(),
    lName: $("#last_name").val(),
    email: $("#email").val(),
    uName: $("#user_name").val(),
    pw1: $("#password1").val(),
    pw2: $("#password2").val(),
    ok: true
  }

  validateFLE(ob);

  // Password validation
  if (ob.pw1 != ob.pw2 || ob.pw1 == "") {
    $("#err_password1").html("* Passwords blank or don't match");
    ob.ok = false;
  }
  else {
    $("#err_password1").html("");
  }

  // User Name

  if (ob.uName == "") {
    $("#err_user_name").html("* Username is required");
    ob.ok = false;
  }
  else {

    let gf = "/src/controller/UserController.php?func=getByUN&user_name=" + ob.uName;
    $.get(gf, function (data) {
      data = JSON.parse(data);
      console.log('verifying user name: ' + data);

      if (data != false) { // user name exists, problem...
        $("#err_user_name").html("* This user name is already taken");
        ob.ok = false;
      }
      else { // user name available... good
        $("#err_user_name").html(""); // resets error text
        updateTables(ob);
      } // end else, user name available

    }); // end username check

  }

} // end validate







// FLE -> First name, Last name, Email
function validateFLE(ob) {

  // FIRST name
  if (ob.fName == "") { // check first name - blank
    $("#err_first_name").html("* first name is required");
    ob.ok = false;
  }
  else {
    $("#err_first_name").html("");
  }

  // LAST name
  if (ob.lName == "") { // check last name - blank
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



} // end FLEP



function updateTables(ob) {
  if (!ob.ok) return;

  let gf = "/src/controller/UserController.php?func=nextId";

  $.get(gf, function (data) {
    data = JSON.parse(data);
    console.log('Getting next id: ' + data);
    ob.id = data.max_current_id + 1;

    let gf2 = "/src/controller/UserController.php";
    $.post(gf2, {
      func: "add", user_id: ob.id, pw: ob.pw1, user_name: ob.uName, first_name: ob.fName,
      last_name: ob.lName, email: ob.email
    }, function (data) {
      let msg = 'Success... User entered into database'
      console.log(msg);
      $("#success_msg").html(msg);



    }); // end update login tbl

  }); // end next id


}



function onLoadNewUser() {
  validateNewUser();
}


function onLoadProfile() {
  // load current
  
  if (sessionStorage.getItem("is_login_ok") != "true") {
    $("#onload_err").html("Should never get here, use sessionStorage var 'user_id' == null to disable button");
  }

  else {

    let id = sessionStorage.getItem("user_id");
    let gf = "/src/controller/UserController.php?func=get&user_id=" + id;
    $.get(gf, function (data) {
      data = JSON.parse(data);
      console.log('Retrieved logged in user name: ' + data);

      if (data == false) { // user id exists, but is was NOT found, problem...
        alert("User id exists, but data NOT found, probably recently deleted")
        sessionStorage.removeItem("user_id")
      }
      else { // data found... good
        $("#first_name").val(data.first_name);
        $("#last_name").val(data.last_name);
        $("#user_name").val(data.user_name);
        $("#email").val(data.email);
      } // end else, user name available

    }); // end username check

  }

}


function toLogin() {
  window.location.href = "login.php";
}

function toIndex() {
  window.location.href = "index.php";
}