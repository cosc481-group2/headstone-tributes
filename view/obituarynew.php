<?php include 'html_header.php';?>
    <?php include 'header.php';?>
    <!------------------------CODE STARTS------------------------------->

    <div class="container-fluid">
        <div class="row" style="min-height:91vh;">
            <div style="background-color:#BAB86C;" class="main-col col-md-12 col-xl-4 text-white text-end text-uppercase p-3 ">
                <div class="fw-bold p-0 d-flex flex-column align-items-end">
                    <div class="obituary-pic ob-photo" >
                        <i class="bi bi-person-bounding-box" style="font-size:20rem;"></i>
                    </div>
                    <div class="text-warp p-0">
                        <span class="lh-1 display-1 fw-bold ob-name" style="font-size:9vh;text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);"></span>
                    </div>
                </div>       
            </div>
            <div class="col-md-12 col-xl-8">
                <div class="row mb-5">
                    <div class="col p-3">
                        <h1 class="h1">Create New Obituary</h1>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col">
                    <form class="obituary-add-form">
                        <div class="row">
                            <div class="mb-3 col-lg-10 col-xl-5">
                                <label for="first-name" class="form-label fs-3">First Name: </label>
                                <input type="text" class="form-control form-control-lg shadow decease-name-form req" name="d_first_name" id="first-name" placeholder="First Name of Deceased">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="middle-name" class="form-label fs-3">Initial: </label>
                                <input type="text" class="form-control form-control-lg shadow decease-name-form req" name="d_mi" id="middle-name" placeholder="" maxlength="1">
                            </div>
                            <div class="mb-3 col-lg-12 col-xl-5">
                                <label for="last-name" class="form-label fs-3">Last Name: </label>
                                <input type="text" class="form-control form-control-lg shadow decease-name-form req" name="d_last_name" id="last-name" placeholder="Last Name of Deceased">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="middle-name" class="form-label fs-3">Birth: </label>
                                <input type="date" class="form-control form-control-lg shadow birth-date-form req" name="dt_born" id="birth-date" placeholder="Enter Date of Birth">
                            </div>
                            <div class="mb-3 col">
                                <label for="middle-name" class="form-label fs-3">Death: </label>
                                <input type="date" class="form-control form-control-lg shadow death-date-form req" name="dt_passed" id="death-date" placeholder="Enter Date of Death">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="exampleFormControlTextarea1" class="form-label fs-3">Obituary:</label>
                                <textarea class="form-control form-control-lg shadow req" id="exampleFormControlTextarea1" name="obit"  rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="cemetery" class="form-label fs-3">Cemetery: </label>
                                <input type="text" class="form-control form-control-lg shadow req cem-name-input" data-cemid="" name="cem_name" id="cemetery" placeholder="Enter Cemetery">
                            </div>
                            <div class="mb-3 col">
                                <label for="cem_city" class="form-label fs-3">City: </label>
                                <input type="text" class="form-control form-control-lg shadow req" name="cem_city" id="cem_city" placeholder="Enter City">
                            </div>
                            <div class="mb-3 col">
                                <label for="middle-name" class="form-label fs-3">Country: </label>
                                <select class="form-select form-control-lg country-selections shadow req" name="con_id" aria-label="Default select example">
                                    <option value="" selected>Select Country</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="additionalComments" class="form-label fs-3">Additional Comments:</label>
                                <textarea class="form-control form-control-lg shadow req" id="additionalComments" name="comments" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <button type="button" data-func="" data-user="" data-id="" class="btn btn-lg btn-success create-obituary-button">Create</button>
                                <button type="button" class="btn btn-lg btn-success reset-obituary-button">Reset</button>
                                <div class="dec-msg mt-3"></div>
                            </div>
                        </div>
                    </form>
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

            if(obituaryId != null) {
                $('.create-obituary-button').text("Update").attr('data-func','update');
                $('.reset-obituary-button').text("Cancel Update")

                $.get("/src/controller/DeceasedController?func=get&dec_id=" + obituaryId,function(data) {
                    var obj = $.parseJSON(data);
                    
                    if(sessionStorage.getItem("user_id") != obj.user_id) {
                        $('.create-obituary-button').hide();
                        $('<div/>').html('Must be orginial creator to edit!!').addClass('alert alert-danger').appendTo('.dec-msg');
                    }   

                    $("input[name='d_first_name']").val(obj.d_first_name);
                    $("input[name='d_last_name']").val(obj.d_last_name);
                    $("input[name='d_mi']").val(obj.d_mi);
                    $("input[name='dt_born']").val(obj.dt_born);
                    $("input[name='dt_passed']").val(obj.dt_passed);
                    $("textarea[name='obit']").val(obj.obit);
                    $("textarea[name='comments']").val(obj.comments);
                    $('.create-obituary-button').attr('data-user',obj.user_id);
                    $('.create-obituary-button').attr('data-id',obj.dec_id);

                    $(".cem-name-input").attr("data-cemid",(obj.cem_id == null) ? 0 : obj.cem_id);

                    if(obj.cem_id != null) {
                        $.get("/src/controller/CemController?func=get&cem_id=" + obj.cem_id, function(data2) {
                            var obj2 = $.parseJSON(data2);
                            $("input[name='cem_name']").val(obj2.cem_name);
                            $("input[name='cem_city']").val(obj2.cem_city);

                            $(".country-selections option").each(function() {
                                if($(this).val() == obj2.con_id) {
                                    $(this).attr("selected","");
                                } else {
                                    $(this).removeAttr("selected");
                                }
                            });
                        });
                    }   
                });
            } else {
                $('.reset-obituary-button').hide();
            }
            
            $.get("../src/controller/CountryController?func=all", function(data) {
                $.each($.parseJSON(data), function(index, t) {
                    var opt = "<option value='" + t.con_id + "'>" + t.country + "</option>";
                    $('.country-selections').append(opt);
                });
            });

            $(document).on('click','.create-obituary-button',function() {
                var save = true;
                $(".obituary-add-form .req").each(function(index) {
                    if($(this).val() == '') {
                       save = false;
                    }
                });

                if(save) {
                    if($(".create-obituary-button").data("func") == "update") {
                        updateObituary();
                    } else {
                        createNewObituary();
                    }
                } else {
                    $('<div/>').html('All Fields Are Required!!!').addClass('alert alert-danger').appendTo('.dec-msg').delay(5000).fadeOut( "slow" );
                }
            });
            

            // function creates a new obituary
            function createNewObituary() {
                var userId = sessionStorage.getItem("user_id");
                if(userId != null) {

                    var formdata = $(".obituary-add-form").serialize();
                    formdata += "&func=add&user_id=" + userId;

                    $.post("../src/controller/DeceasedController.php",formdata)
                        .done(function(data) {
                            $('<div/>').html('User Added Successfully!!!').addClass('alert alert-success').appendTo('.dec-msg').delay(5000).fadeOut( "slow" );
                            window.location.href = "obituary.php?id=" + $('.create-obituary-button').data("id") + "&picid=1";
                        });
                }
            }

            $(document).on('click','.reset-obituary-button',function() {
                window.location.href = "obituary.php?id=" + $('.create-obituary-button').data("id") + "&picid=" + pictureId;
            });

            // function creates a new obituary
            function updateObituary() {
                                
                var formdata = $(".obituary-add-form").serialize();
                formdata += "&func=update&user_id=" + sessionStorage.getItem("user_id") + "&cem_id=" + $(".cem-name-input").data("cemid") + "&dec_id=" + $('.create-obituary-button').data("id");

                console.log(formdata);

                $.post("../src/controller/DeceasedController.php",formdata)
                    .done(function(data) {
                        $('<div/>').html('User Added Successfully!!!').addClass('alert alert-success').appendTo('.dec-msg').delay(5000).fadeOut( "slow" );

                        window.location.href = "obituary.php?id=" + $('.create-obituary-button').data("id") + "&picid=" + pictureId;
                    });
            }

        });

    </script>
<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>