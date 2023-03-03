<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

 <a href="index.php" role="button" class = "btn btn-primary">Home</a>

<div class="card w-50 mx-auto my-5">
<div class="card-body">
<form action=""> 
    <div class="mt-3">
        <label for="first_name" class="form-label">user name</label>
        <input type="text" id = "first_name" class="form-control">
    </div>
    <div class="mt-3">
        <label for="last_name" class="form-label">password</label>
        <input type="password" id = "last_name" class="form-control">
    </div>



    <div class="mt-3 d-flex justify-content-between" >
    <button class = "btn btn-success"> submit </button>
        <a href="signup.php" role="button" class = "btn btn-primary">click here to sign up</a>
</div>
</form>

</div>

</div>
</body>
</html>