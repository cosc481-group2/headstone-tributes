<?php include 'html_header.php';?>
    <?php include 'header.php';?>
<!------------------------CODE STARTS------------------------------->

    <br>
    <h1 class="center">Registration</h1>
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

            <p>Password: &nbsp
                <label id="err_password1" class="err">
                </label>
                <input type="password" id="password1" class="form-control" />

            <p>Password (again):
                <input type="password" id="password2" class="form-control" />
            </p>

            <div>
                <input type="button" value="Submit" class="btn btn-success" onclick="validateNewUser()" />
                &nbsp&nbsp&nbsp

                <input type="button" value="Go to login" class="btn btn-primary" onclick="toLogin()" />
                &nbsp&nbsp&nbsp

                <input type="button" value="Home" class="btn btn-primary" onclick="toIndex()" />
                &nbsp&nbsp&nbsp

            </div>
        </div>


    </div>
    <p id="success_msg" class="success">
    </p>

<script src="../public/js/newUser.js?ver=<?php echo date("H:i:s"); ?>"></script>
<script>

    $(document).ready(function () {
        onLoadNewUser();
    });
</script>

<!------------------------CODE ENDS------------------------------->
<?php include 'html_footer.php';?>