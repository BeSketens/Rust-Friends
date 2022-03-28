<?php if (!empty($error)) { ?>
    <p><?= $error ?></p>
<?php } ?>
<form action="login" method="post">
    <label>
        Email :
        <input type="email" name="email">
    </label>
    <label>
        Password :
        <input type="password" name="password">
    </label>
    <button type="submit" name="login-submit">Login</button>
</form>