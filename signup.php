<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    h1 {
        text-align: center;
    }
</style>

<body>

    <a href="index.php" role="button" class="btn btn-primary">Home</a>
    <h1> New User Sign Up</h1>
    <div class="card w-50 mx-auto my-5">

        <div class="card-body">
            <form action="">
                <div class="mt-3">
                    <label for="first_name" class="form-label">first name</label>
                    <input type="text" id="first_name" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="last_name" class="form-label">last name</label>
                    <input type="text" id="last_name" class="form-control">
                    <div class="mt-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" id="email" class="form-control">
                        <div class="mt-3">
                            <label for="username" class="form-label">user name</label>
                            <input type="text" id="last_name" class="form-control">
                            <div class="mt-3">
                                <label for="password" class="form-label">password</label>
                                <input type="password" id="password" class="form-control">
                            </div>



                            <div class="mt-3">
                                <a href="login.php" role="button" class="btn btn-primary">already have an account? log
                                    in here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</body>

</html>