<!-- Username -->
<label for="username">Username</label>
<input type="text" id="username" name="username" value="<?= $_SESSION['username'] ?>" readonly disabled>
<button type="button" onclick="showUpdateFields('username')">Update</button>
<!-- Hidden fields -->
<div id="usernameUpdate" class="hidden">
    <form action="userController/updateUsername" method="post" id="usernameForm">
        <label for="newUsername">New Username</label>
        <input type="text" id="newUsername" name="newUsername" required>
        <button type="submit">Save</button>
    </form>
</div> <!-- End hidden fields -->
<br> <!-- End username -->

<!-- Email -->
<label for="email">Email</label>
<input type="email" id="email" name="email" value="<?= $_SESSION['email'] ?>" readonly disabled>
<button type="button" onclick="showUpdateFields('email')">Update</button>
<!-- Hidden fields -->
<div id="emailUpdate" class="hidden">
    <form action="userController/sendEmailToUpdate" method="post" id="emailForm">
        <label for="newEmail">New Email</label>
        <input type="email" id="newEmail" name="newEmail" required>
        <button type="submit">Save</button>
    </form>
</div> <!-- End hidden fields -->
<br> <!-- End email -->

<!-- Password -->
<label for="password">Password</label>
<input type="password" id="password" name="password" value="*******" readonly disabled>
<button type="button" onclick="showUpdateFields('password')">Update</button>
<!-- Hidden fields -->
<div id="passwordUpdate" class="hidden">
    <form action="userController/updatePassword" method="post" id="passwordForm">
        <label for="newPassword">New Password</label>
        <input type="password" id="newPassword" name="newPassword" required> <br>
        <label for="newConfirmPassword">New Password Confirm</label>
        <input type="password" id="newConfirmPassword" name="newConfirmPassword" required>
        <button type="submit">Save</button>
    </form>
</div> <!-- End hidden fields -->
<br> <!-- End password -->