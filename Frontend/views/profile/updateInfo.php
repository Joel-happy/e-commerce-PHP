<div class="container">
    <!-- Username -->
    <div class="row">
        <div class="col">
            <label for="username">Username</label>
            <div class="input-group">
                <input type="text" id="username" name="username" value="<?= $_SESSION['username'] ?>" class="form-control" readonly disabled>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="showUpdateFields('username')">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden fields -->
    <div id="usernameUpdate" class="row hidden">
        <div class="col">
            <form action="userController/updateUsername" method="post" id="usernameForm">
                <label for="newUsername">New Username</label>
                <input type="text" id="newUsername" name="newUsername" class="form-control" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <br> <!-- End username -->

    <!-- Email -->
    <div class="row">
        <div class="col">
            <label for="email">Email</label>
            <div class="input-group">
                <input type="email" id="email" name="email" value="<?= $_SESSION['email'] ?>" class="form-control" readonly disabled>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="showUpdateFields('email')">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden fields -->
    <div id="emailUpdate" class="row hidden">
        <div class="col">
            <form action="userController/sendEmailToUpdate" method="post" id="emailForm">
                <label for="newEmail">New Email</label>
                <input type="email" id="newEmail" name="newEmail" class="form-control" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <br> <!-- End email -->

    <!-- Password -->
    <div class="row">
        <div class="col">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" id="password" name="password" value="*******" class="form-control" readonly disabled>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="showUpdateFields('password')">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden fields -->
    <div id="passwordUpdate" class="row hidden">
        <div class="col">
            <form action="userController/updatePassword" method="post" id="passwordForm">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="newPassword" class="form-control" required> <br>

                <label for="newPasswordConfirm">New Password Confirm</label>
                <input type="password" id="newPasswordConfirm" name="newPasswordConfirm" class="form-control" required>

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <br> <!-- End password -->
</div>
