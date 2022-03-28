<?php if (!empty($error)) { ?>
    <p><?= $error ?></p>
<?php } ?>
<form action="login" method="post">
    <label>
        Email :
        <input type="email" name="email">
    </label>
    <br><br>
    <label>
        Password :
        <input type="password" name="password">
    </label>
    <br><br>
    <button type="submit" name="login-submit">Login</button>
</form>
<a href="home"><button type="button">Go back</button></a>