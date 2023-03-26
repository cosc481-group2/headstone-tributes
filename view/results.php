<?php include 'html_header.php';?>
    <?php include 'header.php';?>
<!------------------------CODE STARTS------------------------------->

        <div class="container-fluid text-center" style="background-image: url('/public/img/graveyard-blur.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size:cover; min-height:92vh;">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-9 col-lg-12 justify-content-center">
                    <div class="search-results"></div>
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

                                  var row = ` <div class="row p-0 border-dark shadow m-5">
                                                    <div class="col-xl-3 col-lg-6 p-0"><img src="/public/img/face${randomNum}.jpg" class="img-fluid rounded-4" style="height:25vh;"></div>
                                                    <div class="col p-3 text-start bg-secondary-subtle rounded-3">
                                                        <div class="row display-5">${deceased.d_first_name} ${deceased.d_mi} ${deceased.d_last_name}</div>
                                                        <div class="row h5">Date of Birth: ${deceased.dt_born}</div>
                                                        <div class="row h5">Date of Death: ${deceased.dt_passed}</div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="button" data-pic="${randomNum}" data-id="${deceased.dec_id}" class="btn btn-success get-obituary-button" value="View Obituary">
                                                            </div>
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

<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>