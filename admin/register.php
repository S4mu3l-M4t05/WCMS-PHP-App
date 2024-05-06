<?php 
$pageTitle = "Sign Up! - SB Admin"; // Set the title for this page
include 'assets/includes/header.inc.php'; 
?>
<main>
    <?php include 'assets/includes/popup.inc.php';?>
    <div class="container-fluid form-card">
        <div class="card shadow-lg rounded-lg" style="width: 50%;">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                <div class="card-body">
                    <!--Registration form-->
                    <form method="post" action="controllers/user_controllers.php" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="register">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="firstname" type="text" placeholder="Enter your first name" />
                                    <label for="inputFirstName">First name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" name="lastname" type="text" placeholder="Enter your last name" />
                                    <label for="inputLastName">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputUsername" name="username" type="text" placeholder="username" />
                            <label for="inputUsername">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPasswordConfirm" name="cpassword" type="password" placeholder="Confirm password" />
                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ms-3">
                            <div class="form-check mb-3 col-md-3">
                                <input class="form-check-input" type="radio" name="user_role" id="radioAdmin" value="1">
                                <label class="form-check-label" for="radioAdmin">Admin</label>
                            </div>
                            <div class="form-check mb-3 col-md-3">
                                <input class="form-check-input" type="radio" name="user_role" id="radioModerator" value="2" checked>
                                <label class="form-check-label" for="radioModerator">Moderator</label>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button type="submit" name="register" id="register" class="btn btn-primary">Create Account</button></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'assets/includes/footer.inc.php' ?>
