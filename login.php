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
    <title>Login</title>
    <script>
        $(document).ready(function () {
            onLoadLogin();
        });
    </script>
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
            text-align: center;
        }

        .card {
            card-body;
            bg-secondary-subtle;

        }
    </style>
</head>


<body>
    <br>
    <h1 class="center"> Login </h1>
    <div class="card w-50 mx-auto my-4">
        
    <div class="card-body bg-secondary-subtle">
            
        
        
        <form action="">
                <div class="mt-3">
                    <label class="form-label">user name</label>
                    <input type="text" id="user_name" class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label">password</label>
                    <input type="password" id="password" class="form-control">
                </div>
                
                <br />
                <input type="button" value="Submit" class="btn btn-success" onclick="validateUser()" />
                &nbsp&nbsp&nbsp
                <input type="button" value="Register" class="btn btn-primary" onclick="toRegistation()" />
                &nbsp&nbsp&nbsp&nbsp
                <input type="button" value="Cancel" class="btn btn-primary" onclick="toIndex()" />
                &nbsp&nbsp&nbsp&nbsp
                <input type="button" value="Logout" class="btn btn-dark" onclick="logout()" />

                <p></P>

                <input type="checkbox" id="remember" onclick="rememberCheckBox()">
                <label for="remember"> Remember me </label>
        </div>

        </form>
    </div>
    </div>
    <p id="err" class="err">
        <!-- Error msg goes here -->
    </p>
    <p id="success_msg" class="success" >
        <!-- <br> -->
        <!-- this is a test error -->

    </p>

</body>

</html>