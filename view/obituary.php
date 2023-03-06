<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeadStone.com | Obituary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Petit+Formal+Script&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>

    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">
            <div style="background-color:#483248;" class="main-col col-md-12 col-xl-6 text-white text-end text-uppercase p-3 min-vh-100">
                <div class="fw-bold p-0 d-flex flex-column align-items-end">
                    <div class="obituary-pic ob-photo" >
                        <i class="bi bi-person-bounding-box" style="font-size:20rem;"></i>
                    </div>
                    <div class="text-warp p-0">
                        <span class="lh-1 display-1 fw-bold ob-name" style="font-size:9vh;text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);"></span>
                    </div>
                </div>
                <div class="mt-4 fs-1 lh-1">
                    <p>
                        <span class="fw-bold">Birth:</span>
                        <span class="birth-date"></span>
                    </p>
                    <p>
                        <span class="fw-bold">Death:</span>
                        <span class="death-date"></span>
                    </p>
                </div>
            </div>
            <div class="col-md-12 col-xl-6 min-vh-100">
                <div class="row h-25">
                    <div class="col bg-dark d-flex align-items-end p-3 text-white">
                        <div>
                            <button class="btn btn-light btn-lg rounded-0 mb-5">Send Flowers</button>
                            <h5 class="fs-3 fw-bold">Cementary Info:</h5>
                            <p>
                                <span class="cem-name fs-5"></span><br>
                                <span class="cem-city fs-5"></span>, <span class="cem-country fs-5"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-12">
                        <h3 style="color:#D4AF37;" class="p-3 fs-1 fw-bold">Obituary for:<br> <span class="ob-name"></span></h3>
                        <p class="h4 p-3 lead fs-1 obituary"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-secondary-subtle p-4 justify-content-center">
            <div class="col-xl-1 col-lg-12 p-0">
               
                    <button type="button" class="btn btn-lg btn-secondary rounded-0 my-1 w-100">Edit Obituary</button>
                    <button type="button" class="btn btn-lg btn-secondary rounded-0 my-1 w-100">Add Tribute</button>
                    <button type="button" class="btn btn-lg btn-secondary rounded-0 my-1 w-100">Edit Tribute</button>
                    <button type="button" class="btn btn-lg btn-secondary rounded-0 my-1 w-100">Delete Tribute</button>
                
            </div>
            <div class="col-xl-6 col-lg-12 p-0">
                <div class="card border border-0 mx-xl-3 mx-md-0 my-xl-0 my-md-2">
                    <div style="background-color:#483248;" class="tribute-header card-header p-md-1 p-xl-4 d-flex justify-content-evenly">
                        <div>
                            <h1 style="font-family: 'Dancing Script', cursive;" class="text-white h1">Obituary Tributes:</h1>
                        </div>
                    </div>
                    <div class="card-body tribute-list"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        $(document).ready(function() {

            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const obituaryId = urlParams.get('id');

            var scheme = ["#483248","#8B8000","#4863A0","#838996","#B86500","#BAB86C"]

            var randomNum = Math.floor(Math.random() * 6);

            $(".main-col, .tribute-header").css("background-color", scheme[randomNum]);
            
            $.get("/src/controller/FilterController?func=get&id=" + obituaryId,function(data) {
                //console.log(data);
                // turn data into JS Object
                var ob = $.parseJSON(data);
                console.log(ob);

                $(".ob-name").html(ob.d_first_name + " " + ob.d_mi + " " + ob.d_last_name);

                let b = new Date(ob.dt_born);
                let d = new Date(ob.dt_passed);

                $(".birth-date").html(getMonthName(b.getMonth()) + " " + b.getDate() + ", " + b.getFullYear());
                $(".death-date").html(getMonthName(d.getMonth()) + " " + d.getDate() + ", " + d.getFullYear());

                $(".cem-name").html(ob.cem_name);
                $(".cem-city").html(ob.cem_city);
                $(".cem-country").html(ob.country);
                
                $(".obituary").html(ob.obit);

                var randomNum = Math.floor(Math.random() * 3) + 1;

                $(".ob-photo").html("<img src='/public/img/face" + randomNum + ".jpg' class='img-thumbnail' style='max-height:50vh;'  />");
            });

            $.get("/src/controller/TributeController?func=getByDec&dec_id=" + obituaryId, function(data) {
                var tributes = $.parseJSON(data);
                console.log(tributes);

                $.each(tributes, function(index, t) {

                    var card = `<div class="card m-md-2 m-xl-3 shadow">
                                    <div class="card-body">
                                        <figure>
                                            <blockquote class="blockquote">
                                                ${t.tribute}
                                            </blockquote>
                                            <figcaption class="blockquote-footer">
                                                ${t.dt_post}
                                            </figcaption>
                                        </figure>
                                        
                                    </div>
                                </div>`

                    $('.tribute-list').append(card);
                });
            });
        });

        function getMonthName(monthNumber) {
            const date = new Date();
            date.setMonth(monthNumber - 1);

            return date.toLocaleString('en-US', {
                month: 'long',
            });
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>