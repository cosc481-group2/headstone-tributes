<?php include 'html_header.php';?>
    <?php include 'header.php';?>
    <!------------------------CODE STARTS------------------------------->

    <div class="container-fluid">
        <div class="row">
            <div style="background-color:#483248;" class="main-col col-md-12 col-xl-6 text-white text-end text-uppercase p-3 ">
                <div class="fw-bold p-0 d-flex flex-column align-items-end">
                    <div class="obituary-pic ob-photo" >
                        <i class="bi bi-person-bounding-box" style="font-size:20rem;"></i>
                    </div>
                    <div class="text-warp p-0">
                        <span class="lh-1 display-1 fw-bold ob-name" style="font-size:9vh;text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);"></span>
                    </div>
                </div>       
            </div>
            <div class="col-md-12 col-xl-6 bg-dark text-white">
                <div class="row mb-5">
                    <div class="col p-3">
                        <h1 class="h1">Create New Obituary</h1>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col">
                        <div class="row">
                            <div class="mb-3 col-lg-10 col-xl-5">
                                <label for="first-name" class="form-label fs-3">First Name: </label>
                                <input type="text" class="form-control form-control-lg shadow decease-name-form" id="first-name" placeholder="First Name of Deceased">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="middle-name" class="form-label fs-3">Initial: </label>
                                <input type="text" class="form-control form-control-lg shadow decease-name-form" id="middle-name" placeholder="">
                            </div>
                            <div class="mb-3 col-lg-12 col-xl-5">
                                <label for="last-name" class="form-label fs-3">Last Name: </label>
                                <input type="text" class="form-control form-control-lg shadow decease-name-form" id="last-name" placeholder="Last Name of Deceased">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="middle-name" class="form-label fs-3">Birth: </label>
                                <input type="date" class="form-control form-control-lg shadow birth-date-form" id="birth-date" placeholder="Enter Date of Birth">
                            </div>
                            <div class="mb-3 col">
                                <label for="middle-name" class="form-label fs-3">Death: </label>
                                <input type="date" class="form-control form-control-lg shadow death-date-form" id="death-date" placeholder="Enter Date of Death">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="exampleFormControlTextarea1" class="form-label fs-3">Enter Obituary:</label>
                                <textarea class="form-control form-control-lg shadow" id="exampleFormControlTextarea1" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="additionalComments" class="form-label fs-3">Additional Comments:</label>
                                <textarea class="form-control form-control-lg shadow" id="additionalComments" rows="3"></textarea>
                            </div>
                        </div>
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
        /*
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
        */
        function getMonthName(monthNumber) {
            const date = new Date();
            date.setMonth(monthNumber - 1);

            return date.toLocaleString('en-US', {
                month: 'long',
            });
        
        }

    </script>
<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>