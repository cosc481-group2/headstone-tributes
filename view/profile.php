<?php include 'html_header.php';?>
    <?php include 'header.php';?>
    <!------------------------CODE STARTS------------------------------->

    <br>
    <h1 class="center m-2 display-5">User Profile</h1>
    <div class="card w-50 mx-auto my-4 shadow">

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
                <input type="button" value="Update" class="btn btn-primary" onclick="updateProfile()" />
                &nbsp&nbsp&nbsp

                <input type="button" value="Home" class="btn btn-primary" onclick="toIndex()" />
                &nbsp&nbsp&nbsp

            </div>
        </div>


    </div>
    <p id="success_msg" class="success">
    </p>
    <p id="success_msg2" class="success">
    </p>
    <p id="onload_err" class="err2">
    </p>

    <script src="../public/js/profile.js?ver=<?php date("H:i:s"); ?>"></script>
    <script>

        $(document).ready(function () {
            onLoadProfile();
        });
    </script>

<!------------------------CODE ENDS------------------------------->    
<?php include 'html_footer.php';?>