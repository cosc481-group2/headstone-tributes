<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Deceased Page</title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Deceased Page
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#useraddModal">
                            Add Deceased
                        </button>
                    </div>
                    <div class="card-footer user-footer-msg"></div>
                </div>
                
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                            <th>dec_id</th>
                            <th>user_id</th>
                            <th>cem_id</th>
                            <th>last name</th>
                            <th>firtst name</th>
                            <th>mi</th>
                            <th>dt_born</th>
                            <th>dt_passed</th>
                            <th>obit</th>
                            <th>comments</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="user-table-body"> </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="useraddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-primary-subtle">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        
              <form class="user-add-form">
                  
                  <div class="row p-1">
                    <div class="col">
                        <div class="form-group">
                            <label for="dec_id">dec_id</label>
                            <input type="text" name="dec_id" class="form-control" id="dec_id" placeholder="dec_id">
                        </div>    
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="user_id">user_id</label>
                            <input type="text" name="user_id" class="form-control" id="user_id" placeholder="user_id">
                        </div>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col">
                        <div class="form-group">
                            <label for="cem_id">cem_id</label>
                            <input type="text" name="cem_id" class="form-control" id="cem_id" placeholder="cem_id">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="d_last_name">d_last_name</label>
                            <input type="text" name="d_last_name" class="form-control" id="d_last_name" placeholder="d_last_name">
                        </div>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col">

                        <div class="form-group">
                            <label for="d_mi">d_mi</label>
                            <input type="d_mi" name="user_id" class="form-control" id="d_mi" placeholder="d_mi">
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="dt_born">dt_born</label>
                            <input type="number" name="dt_born" class="form-control" id="dt_born" placeholder="Enter born on date">
                        </div>
                    </div>
                </div>


                <div class="row p-1">
                    <div class="col">

                        <div class="form-group">
                            <label for="dt_passed">dt_passed2</label>
                            <input type="text" name="dt_passed" class="form-control" id="dt_passed" placeholder="Enter date died">
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="obit">Obituary</label>
                            <input type="text" name="obit" class="form-control" id="obit" placeholder="Enter obit">
                        </div>
                    </div>
                </div>

                <div class="col">

                <div class="form-group">
                    <label for="comments">Comments2</label>
                    <input type="text" name="comments" class="form-control" id="comments" placeholder="Enter comments">
                </div>
                
              </div>








            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveuser-button">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    <script>

        $(document).ready(function() {

            populateUserTable();
            
            $(document).on('click','.saveuser-button', function() {
                
                var formdata = $(".user-add-form").serialize();
                
                formdata = formdata + "&func=add";

                console.log(formdata);

                $.post("/src/controller/DeceasedController", formdata)
                    .done(function(data) {
                        console.log(data);
                        populateUserTable();
                        $('#useraddModal').modal('hide');
                        $('<div/>').html('User Added Successfully!!!').addClass('alert alert-success').appendTo('.user-footer-msg').delay(5000).fadeOut( "slow" );
                    });                
            });

            $(document).on('click','.del-user-button', function() {

                var id = $(this).data('id');

                formdata = `dec_id=${id}&func=del`;

                $.post("/src/controller/DeceasedController", formdata)
                    .done(function(data) {
                        
                        populateUserTable();
                        $('<div/>').html('User Deleted Successfully!!!').addClass('alert alert-success').appendTo('.user-footer-msg').delay(5000).fadeOut( "slow" );
                    });
            });

            function populateUserTable() {
                $('.user-table-body').empty();
                $.get("/src/controller/DeceasedController?func=all", function(data, status) {
                              
                    console.log(data);

                    $.each($.parseJSON(data), function(index, deceased) {

                        var row = `<tr>
                                    <td>${deceased.dec_id}</td>
                                    <td>${deceased.user_id}</td>
                                    <td>${deceased.cem_id}</td>
                                    <td>${deceased.d_last_name}</td>
                                    <td>${deceased.d_first_name}</td>
                                    <td>${deceased.d_mi}</td>
                                    <td>${deceased.dt_born}</td>
                                    <td>${deceased.dt_passed}</td>
                                    <td>${deceased.obit}</td>
                                    <td>${deceased.comments}</td>
                                    <td><button type="button" data-id="${deceased.dec_id}" class="btn btn-sm btn-danger del-user-button">Delete</button></td>
                                   </tr>` 
                        
                        $('.user-table-body').append(row);

                    });
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>