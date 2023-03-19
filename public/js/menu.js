$(document).ready( function () {

    if(window.location.pathname == '/' || window.location.pathname == '/index.php' || window.location.pathname == '/index') {
        $(".header-include .btn-group a").each(function() {
            $(this).attr('href', 'view/' + $(this).attr('href'));
        });
    }

    // Disable buttons if user is not logged in
    if (sessionStorage.getItem("is_login_ok") != "true") {
        console.log("No User Logged In!");
        $(".user-logout-button").hide();

        $(".user-profile-button").attr('href','javascript:void(0)').attr('title','Please Login First to Visit!!');
        $(".new-obituary-button").attr('href','javascript:void(0)').attr('title','Please Login First to Visit!!');
    } else {
        console.log("User Logged In!");
        $(".user-logout-button").show();
    }

    // Make Current Page Button Active
    $(".header-include .btn-group a").each(function() {
        if(getFilePath() == $(this).attr('href').replace(".php","")) {
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
    })

    function getFilePath() {
        var path = window.location.pathname;
        var pathStart = path.lastIndexOf("/") + 1;
        return path.slice(pathStart,path.length);
    }

    $(document).on('click','.user-logout-button', function() {
        if (sessionStorage.getItem("is_login_ok")){
            sessionStorage.removeItem("is_login_ok");
            window.location.href = "../index";
        }
    });
});