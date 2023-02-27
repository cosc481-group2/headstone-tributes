src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"; // JQuery


function validateUser() {


  $("#err").html(""); // clears error
  localStorage.setItem("first_name", ""); // clears first name
  sessionStorage.setItem("first_name", "Please log in");



  let un = $("#user_name").val();
  let pw = $("#password").val();

  if (un == "") { // check user name
    $("#err").html("Username can not be blank");
  }

  else if (pw == "") { // pw
    $("#err").html("Password can not be blank");
  }

  else { // get data
    $("#err").html("Passed initial checks");


    let gf = "/src/controller/UserController.php?func=getByUN&user_name=" + un; 


    $.get(gf, function(data){
      data = JSON.parse(data);
      console.log(data);
      
      if (data == false) {
        console.log('no username match');
        $("#err").html("Username not found");
        return;
      }
      else {
        sessionStorage.setItem("user_id", data.user_id);
        sessionStorage.setItem("first_name_temp", data.first_name);

      }
    });


    // check pw
    
    let user_id = sessionStorage.getItem("user_id");
    gf = "/src/controller/UserController.php?func=getLogByIdPw&user_id=" + user_id + "&pw=" + pw; 

    $.get(gf, function(data){
      data = JSON.parse(data);
      console.log(data);
      if (data == false) {
        $("#err").html("Incorrect password");
      
      }
      
      else { // Finally.....
        $("#err").html("Success.... Credentials verified");
        sessionStorage.setItem("first_name", sessionStorage.getItem("first_name_temp"));
        localStorage.setItem("user_name", un); // if us/pw successful
       
        setTimeout(toIndex, 2000);        

      }
     
    });

    } // end else

} // end validate





function toRegistation() {
  window.location.href = "signup.php";
}

function toIndex() {
  window.location.href = "index.php";
}
