<?php include 'html_header.php';?>
    <?php include 'header.php';?>
<!------------------------CODE STARTS------------------------------->

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
                <input type="button" value="Home" class="btn btn-primary" onclick="toIndex()" />
                &nbsp&nbsp&nbsp&nbsp
                <input type="button" value="Logout" class="btn btn-dark" onclick="logout()" />

                <p></P>

                <input type="checkbox" id="remember" onclick="rememberCheckBox()">
                <label for="remember"> Remember me </label>
        </div>

        </form>
    </div>

    </div>
    <p id="err" class="err2">
        <!-- Error msg goes here -->
    </p>
    <p id="success_msg" class="success">
        <!-- <br> -->
        <!-- this is a test error -->

    </p>
    <script>
        $(document).ready(function () {
            onLoadLogin();
        });
    </script>  
    <script src="../public/js/login.js?ver=<?php echo date("H:i:s"); ?>"></script>  

<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>