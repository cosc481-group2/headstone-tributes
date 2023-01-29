<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Users Page</title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Users Page
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#useraddModal">
                            Add User
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
                            <th>User Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
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
                            <label for="usernameInput">Username</label>
                            <input type="text" name="user_name" class="form-control" id="usernameInput" placeholder="Create Username">
                        </div>    
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" name="pw" class="form-control" id="passwordInput" placeholder="Enter a Password">
                        </div>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col">
                        <div class="form-group">
                            <label for="firstnameInput">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="firstnameInput" placeholder="Enter Firstname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lastnameInput">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="lastnameInput" placeholder="Enter Lastname">
                        </div>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col">

                        <div class="form-group">
                            <label for="useridInput">User Id</label>
                            <input type="number" name="user_id" class="form-control" id="useridInput" placeholder="Enter User Id">
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="emailInput">Email Address</label>
                            <input type="email" name="email" class="form-control" id="emailInput" placeholder="Enter Email Address">
                        </div>
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

                $.post("/src/controller/UserController.php", formdata)
                    .done(function(data) {
                        console.log(data);
                        populateUserTable();
                        $('#useraddModal').modal('hide');
                        $('<div/>').html('User Added Successfully!!!').addClass('alert alert-success').appendTo('.user-footer-msg').delay(5000).fadeOut( "slow" );
                    });                
            });

            $(document).on('click','.del-user-button', function() {

                var id = $(this).data('id');

                formdata = `user_id=${id}&func=del`;

                $.post("/src/controller/UserController.php", formdata)
                    .done(function(data) {
                        
                        populateUserTable();
                        $('<div/>').html('User Deleted Successfully!!!').addClass('alert alert-success').appendTo('.user-footer-msg').delay(5000).fadeOut( "slow" );
                    });
            });

            function populateUserTable() {
                $('.user-table-body').empty();
                $.get("/src/controller/UserController.php?func=all", function(data, status) {
                              
                    console.log(data);

                    $.each($.parseJSON(data), function(index, user) {

                        var row = `<tr>
                                    <td>${user.user_name}</td>
                                    <td>${user.first_name}</td>
                                    <td>${user.last_name}</td>
                                    <td>${user.email}</td>
                                    <td><button type="button" data-id="${user.user_id}" class="btn btn-sm btn-danger del-user-button">Delete</button></td>
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