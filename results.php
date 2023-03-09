<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <title>HeadStone-Tributes.com</title>
</head>

<body>

    <div class="container-fluid text-center p-0">
    <div class="row px-2">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Welcome to headstones.com</span>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2">
                            <li class="nav-item">
                                <a href="#" class="nav-item active">Homee</a>
                            </li>
                            <li class="nav-item">HeadStones</li>
                            <li class="nav-item">Advice</li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="login.php" role="button" class="btn btn-success ">log in</a>
                <a href="signup.php" role="button" class="btn btn-success">sign up</a>
                <a href="create_new.php" role="button" class="btn btn-success">add a new deceased</a>
                <a href="profile.php" role="button" class="btn btn-success">profile</a>
            </div>
            <div class="row p-0">


            </div>
        </div>
        <div class="row">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
            <div class="col-7 search-results">
            </div>  
</div>
</div>
        </div>
    </div>
    <script>
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const searchText = urlParams.get('search');
        $.get("/src/controller/FilterController?func=filter&search="+searchText, function(data, status) {
                              
                              console.log(data);
                              console.log($.parseJSON(data));
          
                              $.each($.parseJSON(data), function(index, deceased) {
                                var randomNum = Math.floor(Math.random() * 3) + 1;

                                  var row = ` <div class="row border p-2 border-dark m-3">
                                                    <div class="col-3"><img src="/public/img/face${randomNum}.jpg" class="img-fluid" style="height:25vh;"></div>
                                                    <div class="col m-2 text-start">
                                                        <div class="row h5 ">${deceased.d_first_name}</div>
                                                        <div class="row h5">${deceased.d_mi}</div>
                                                        <div class="row h5">${deceased.d_last_name}</div>
                                                        <div class="row h5">Date of Birth: ${deceased.dt_born}</div>
                                                        <div class="row h5">Date of Death: ${deceased.dt_passed}</div>
                                                        <div class="row"><input type="button" data-pic="${randomNum}" data-id="${deceased.dec_id}" class="btn btn-success get-obituary-button" value="View Obituary"></div>
                                                    </div>
                                                </div>`
                                
                                  console.log(deceased.d_first_name);
                                  $('.search-results').append(row);
          
                              }); 
                          });

                          $(document).on('click','.get-obituary-button', function() {

                            var id = $(this).data('id');
                            var picid = $(this).data('pic');

                            window.location.href = "/view/obituary.php?id=" + id + "&picid=" + picid;
});
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>