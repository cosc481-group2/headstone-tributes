<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="login3.js"></script>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <script>
        $(document).ready(function () {
            onLoadLogin();
        });
    </script>
    <style>
        .success {
            text-align: center;
            color: green;
        }

        .center {
            text-align: center;
        }

        .err {
            color: red;
        }
    </style>
</head>



<body>
    <br>
    <h1>Login </h1>
    <div class="card w-50 mx-auto my-4">
        <div class="card-body">
            <form action="">
                <div class="mt-3">
                    <label class="form-label">user name</label>
                    <input type="text" id="user_name" class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label">password</label>
                    <input type="password" id="password" class="form-control">
                </div>
                <p></p>

                <label id="err" style="color:red">
                    <!-- <br> -->
                    <!-- this is a test error -->

                </label>
                <label id="success_msg" style="color:green">
                    <!-- <br> -->
                    <!-- this is a test error -->

                </label>


                <div>
                    <input type="button" value="Submit" class="btn btn-primary" onclick="validateUser()" />
                    &nbsp&nbsp&nbsp
                    <input type="button" value="Register" class="btn btn-primary" onclick="toRegistation()" />
                    &nbsp&nbsp&nbsp
                    <input type="checkbox" id="remember" onclick="rememberCheckBox()">
                    <label for="remember"> Remember Me </label>
                    &nbsp&nbsp&nbsp&nbsp
                    <input type="button" value="Cancel" class="btn btn-primary" onclick="toIndex()" />
                </div>


            </form>
        </div>
    </div>
</body>

</html>