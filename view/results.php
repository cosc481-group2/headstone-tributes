<?php include 'html_header.php';?>
    <?php include 'header.php';?>
<!------------------------CODE STARTS------------------------------->

        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-xl-10 search-results"></div>
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

<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>