src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery


function updatePw(){
  $("#success_msg").html("");
  $("#err_password1").html(""); // clears user name
  $("#onload_err").html("");


  const ob = {
    pw1: $("#password1").val(),
    pw2: $("#password2").val(),
    id: sessionStorage.getItem("user_id"),
    err1: "No updates made"
    
  }

  // Password validation
  if (sessionStorage.getItem("is_login_ok") != "true") {
    $("#onload_err").html("No user is logged in, No action taken");
  }
  
  else if (ob.pw1 != ob.pw2 || ob.pw1 == "") {
    $("#err_password1").html("* Passwords blank or don't match");
    $("#onload_err").html(ob.err1);
  }
  else {
    let gf = "/src/controller/UserController.php";
    $.post(gf, {
      func: "updatePw", pw: ob.pw1, user_id: ob.id}, function (data) {

      let msg = 'Success... Password updated'
      console.log(msg);
      $("#success_msg").html(msg);
    }); // end postupdate login tbl



  } // end else
  
} // end update pw



function validateProfNonPwxxxxxxxxxxxxxxxxx() {
  $("#success_msg").html("");
  $("#err_user_name").html(""); // clears user name
  $("#onload_err").html("");


  const ob = {
    fName: $("#first_name").val(),
    lName: $("#last_name").val(),
    email: $("#email").val(),
    uName: $("#user_name").val().toLowerCase(),
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







function validateNewUser() {

  $("#success_msg").html("");

  const ob = {
    fName: $("#first_name").val(),
    lName: $("#last_name").val(),
    email: $("#email").val(),
    uName: $("#user_name").val().toLowerCase(),
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





function toLogin() {
  window.location.href = "login.php";
}

function toIndex() {
  window.location.href = "index.php";
}