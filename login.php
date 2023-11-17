<?php session_start(); if (isset($_POST['login'])) {

    //  Connect to the database
}

<form action="login.php" method="post">
    <label for="username">Username: </label>
    <input id="username" name="username" required="" type="text" />
    <label for="password">Password: </label>
    <input id="password" name="password" required="" type="password" />
    <input name="login" type="submit" value="Login" />
</form>