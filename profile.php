<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Profile</title>



    <style>
        .success {
            text-align: center;
            color: green;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .err {
            color: red;
        }

        .err2 {
            text-align: center;
            color: red;
            font-weight: bold;
        }



        hr {
            position: relative;
            top: 20px;
            border: none;
            height: 12px;
            background: black;
            margin-bottom: 50px;
        }
    </style>

<body>
    <br>
    <h1 class="center">Profile</h1>
    <div class="card w-50 mx-auto my-4">

        <div class="card-body bg-secondary-subtle">
            <p>First Name: &nbsp
                <label id="err_first_name" class="err">
                </label>
                <input type="text" id="first_name" class="form-control" />

            </p>

            <p>Last Name: &nbsp
                <label id="err_last_name" class="err">
                </label>
                <input type="text" id="last_name" class="form-control" />

            </p>

            <p>User Name: &nbsp
                <label id="err_user_name" class="err">
                </label>
                <input type="text" id="user_name" class="form-control" />

            </p>

            <p>E-mail: &nbsp
                <label id="err_email" class="err">
                </label>
                <input type="text" id="email" class="form-control" />

            </p>
            <hr>

            <p>Password: &nbsp
                <label id="err_password1" class="err">
                </label>
                <input type="password" id="password1" class="form-control" />

            <p>Password (again):
                <input type="password" id="password2" class="form-control" />
            </p>

            <div>
                <input type="button" value="Update non-PW" class="btn btn-primary" onclick="validateProfNonPw()" />
                &nbsp&nbsp&nbsp

                <input type="button" value="Update PW" class="btn btn-primary" onclick="updatePw()" />
                &nbsp&nbsp&nbsp

                <input type="button" value="Cancel" class="btn btn-primary" onclick="toIndex()" />
                &nbsp&nbsp&nbsp

            </div>
        </div>


    </div>
    <p id="success_msg" class="success">
    </p>
    <p id="onload_err" class="err2">
    </p>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/public/js/newUser.js"></script>
<script>

    $(document).ready(function () {
        onLoadProfile();
    });
</script>