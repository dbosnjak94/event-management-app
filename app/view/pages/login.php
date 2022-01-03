<div class="card-deck">
    <div class="card text-white bg-dark mx-auto" style="max-width: 30rem;">
        <div class="card-header text-center"><h2>Log in</h2></div>
        <div class="card-body">
            <form action="index.php?page=authenlogin&method=login" method="POST">
                <div class="form-group">
                    <label for="user_id">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="user_id" id="user_id" required="required" />
                </div>
                <div class="form-group">
                    <label for="user_pass">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass" required="required" />
                </div>
                <div class="form-group">
                    <input class="btn btn-secondary" type="submit" value="Login" />
                    <input class="btn btn-secondary" type="reset" value="Reset" />
                </div>
            </form>
        </div>
    </div>

    <div class="card text-white bg-dark mx-auto" style="max-width: 30rem;">
        <div class="card-header text-center"><h2>Register New User</h2></div>
        <div class="card-body">
            <form action="index.php?page=userRegistration&method=registerNewUser" method="POST">
                <div class="form-group">
                    <label for="user_id">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="new_username" id="new_username" required="required" />
                </div>
                <div class="form-group">
                    <label for="user_pass">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="new_password" id="new_password" required="required" />
                </div>
                <div class="form-group">
                    <label for="user_pass">Repeat Password</label>
                    <input type="password" class="form-control" placeholder="Repeat Password" name="new_password_repeat" id="new_password_repeat" required="required" />
                </div>
                <div class="form-group">
                    <input class="btn btn-secondary" type="submit" value="Register" />
                    <input class="btn btn-secondary" type="reset" value="Reset" />
                </div>
            </form>
        </div>
    </div>
</div>

