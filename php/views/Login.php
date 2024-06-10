<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php flash('login_message'); ?>
    <form action="?controller=auth&action=login" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <a href="?controller=auth&action=register">Cadastrar</a>
</body>
</html>