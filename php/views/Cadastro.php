<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar</title>
</head>
<body>
    <h1>Cadastrar</h1>
    <?php flash('register_message'); ?>
    <form action="?controller=auth&action=register" method="post">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="?controller=auth&action=login">Login</a>
</body>
</html>
