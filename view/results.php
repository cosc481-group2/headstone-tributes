<?php include 'html_header.php';?>
    <?php include 'header.php';?>
<!------------------------CODE STARTS------------------------------->

    <div class="container-fluid text-center" style="background-image: url('/public/img/graveyard-blur.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size:cover; min-height:92vh;">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-9 col-lg-12 justify-content-center">
                <div class="search-results py-5"></div>
            </div>
        </div>
    </div>
    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const searchText = urlParams.get('search');

        $.get("/src/controller/FilterController?func=filter&search="+searchText, function(data, status) {
            
            var deceased_rec = $.parseJSON(data);

            if(deceased_rec.length != 0) {

                $.each(deceased_rec, function(index, deceased) {
                    console.log(deceased);
                    var randomNum = Math.floor(Math.random() * 3) + 1;

                    var borndt = new Date(deceased.dt_born).toLocaleDateString();
                    var deathdt = new Date(deceased.dt_passed).toLocaleDateString();

                    var row = `
                                <div class="card bg-transparent border-0">
                                    <div class="card-body bg-transparent">
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <img src="/public/img/face${randomNum}.jpg" class="img-fluid" style="height:175px;width:150px;">
                                            </div>
                                            <div class="col-xl-9 col-lg-12">
                                                <div class="card rounded-0">
                                                    <div class="card-header display-5 d-flex justify-content-between">
                                                        <div>${deceased.d_first_name} ${deceased.d_mi} ${deceased.d_last_name}</div>
                                                        <input type="button" data-pic="${randomNum}" data-id="${deceased.dec_id}" class="btn btn-success btn-small get-obituary-button" value="View Obituary">
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="row fs-5">${borndt} - ${deathdt}</div>
                                                        <div class="row fs-5">${deceased.cem_name.trim()} - ${deceased.cem_city.trim()}, ${deceased.country}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                    $('.search-results').append(row);
                });
            } else {
                $('<div/>').html('No Results Found from Search!!').addClass('alert alert-warning m-5 p-5').appendTo('.search-results'); 
            } 
        });

        $(document).on('click','.get-obituary-button', function() {

            var id = $(this).data('id');
            var picid = $(this).data('pic');

            window.location.href = "/view/obituary.php?id=" + id + "&picid=" + picid;
        });
    </script>

<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>