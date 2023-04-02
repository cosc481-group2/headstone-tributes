<?php include 'html_header.php';?>
    <?php include 'header.php';?>
    <!------------------------CODE STARTS------------------------------->

    <div class="container-fluid">
        <div class="row" style="min-height:91vh;">
            <div style="background-color:#483248;" class="main-col col-md-12 col-xl-5 text-white text-end text-uppercase p-3">
                <div class="fw-bold p-0 d-flex flex-column align-items-end">
                    <div class="obituary-pic ob-photo" >
                        <i class="bi bi-person-bounding-box" style="font-size:20rem;"></i>
                    </div>
                    <div class="text-warp p-0">
                        <span class="lh-1 display-1 fw-bold ob-name" style="font-size:8vh;text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);"></span>
                    </div>
                </div>
                <div class="mt-4 fs-1 lh-1">
                    <p>
                        <span class="fw-bold fs-2">Birth:</span>
                        <span class="birth-date "></span>
                    </p>
                    <p>
                        <span class="fw-bold fs-2">Death:</span>
                        <span class="death-date"></span>
                    </p>
                </div>
            </div>
            <div class="col-lg-12 col-xl-7">
                <div class="row" style="height:250px;">
                    <div class="col bg-dark d-flex align-items-end p-3 text-white">
                        <div>
                            <button class="btn btn-light btn-lg rounded-0 mb-5 edit-obituary-button">Edit Obituary</button>
                            <h5 class="fs-3 fw-bold">Cementary Info:</h5>
                            <p>
                                <span class="cem-name fs-5"></span><br>
                                <span class="cem-city fs-5"></span>, <span class="cem-country fs-5"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" style="min-height:75vh;">
                    <div class="col-xl-11 col-lg-12">
                        <h3 style="color:#702963;" class="p-3 display-5">Obituary for:<br> <span class="ob-name"></span></h3>
                        <p class="h4 p-3 lead fs-1 obituary"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-secondary-subtle p-4 justify-content-center">
            <div class="col-xl-9 col-lg-12 p-0">
                <div class="card border border-0 mx-xl-3 mx-md-0 my-xl-0 my-md-2">
                    <div style="background-color:#483248;" class="tribute-header card-header p-md-1 p-xl-4">
                        <div class="row">
                            <h1 style="font-family: 'Dancing Script', cursive;" class="text-white h1">Obituary Tributes:</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row tribute-msg"></div>
                            <div class="row add-tribute-form">
                                <div class="col mb-3">
                                    <textarea class="form-control shadow deceased-tribute" rows="3"></textarea>
                                    <button type="button" class="btn btn-small btn-secondary my-3 rounded-0 add-tribute-btn">Add A Tribute</button>
                                </div>
                            </div>
                            <div class="row  p-0 m-0">
                                <div class="col tribute-list"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        $(document).ready(function() {

            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const obituaryId = urlParams.get('id');
            const pictureId = urlParams.get('picid');

            if (!sessionStorage.getItem("is_login_ok")) {
                $('.edit-obituary-button').hide();
                $('.tribute-msg').html($('<div/>').html('Login first To add Tribute!!').addClass('alert alert-secondary rounded-0')).show();
                $('.add-tribute-form').hide();
            } else {
                $('.tribute-msg').empty().hide();
            }

            var scheme = ["#483248","#8B8000","#4863A0","#838996","#B86500","#BAB86C"]

            var randomNum = Math.floor(Math.random() * 6);

            $(".main-col, .tribute-header").css("background-color", scheme[randomNum]);
            
            $.get("/src/controller/FilterController?func=get&id=" + obituaryId,function(data) {
                // turn data into JS Object
                var ob = $.parseJSON(data);

                $(".ob-name").html(ob.d_first_name + " " + ob.d_mi + " " + ob.d_last_name);

                let b = new Date(ob.dt_born);
                let d = new Date(ob.dt_passed);

                $(".birth-date").html(getMonthName(b.getMonth()) + " " + b.getDate() + ", " + b.getFullYear());
                $(".death-date").html(getMonthName(d.getMonth()) + " " + d.getDate() + ", " + d.getFullYear());

                $(".cem-name").html(ob.cem_name);
                $(".cem-city").html(ob.cem_city);
                $(".cem-country").html(ob.country);
                
                $(".obituary").html(ob.obit);
                
                $(".edit-obituary-button").data("id","j");

                if(pictureId != null) {   
                    var randomNum = Math.floor(Math.random() * 3) + 1;
                   $(".ob-photo").html("<img src='/public/img/face" + pictureId + ".jpg' class='img-thumbnail' style='max-height:50vh;'  />");
                }
            });

            getDeceasedTributes(obituaryId);

            
            $(document).on('click','.edit-obituary-button', function() {
                window.location.href = 'obituarynew?id=' + obituaryId + "&picid=" + pictureId;
            });

            $(document).on('click','.add-tribute-btn', function() {
                var formdata = "func=add&user_id=" + sessionStorage.getItem("user_id") +"&dec_id="+ obituaryId +"&tribute=" + $(".deceased-tribute").val();

                $.post("/src/controller/TributeController",formdata)
                    .done(function(x) {
                        getDeceasedTributes(obituaryId);
                        $(".deceased-tribute").val('');
                    });
            });

            $(document).on('click','.del-tribute-btn', function() {
                var formdata = "func=del&id=" + $(this).data("id");
                var obid = $(this).data("decid");
                $.post("/src/controller/TributeController",formdata)
                    .done(function(x) {
                        getDeceasedTributes(obid);
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

        function getDeceasedTributes(id) {
            $('.tribute-list').empty();
            $.get("/src/controller/TributeController?func=getByDec&dec_id=" + id, function(data) {
                var tributes = $.parseJSON(data);
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
                                        <div>
                                            <i class="bi bi-trash del-tribute-btn" data-id="${t.id}" data-userid="${t.user_id}" data-decid="${t.dec_id}" title="Delete Tribute" style="cursor:pointer;${(!sessionStorage.getItem("is_login_ok") || (sessionStorage.getItem("user_id") != t.user_id)) ? 'display:none;' : '' }" ></i>    
                                        </div>
                                    </div>
                                </div>`

                    $('.tribute-list').append(card);
                });
            });
        }

        

    </script>

<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>