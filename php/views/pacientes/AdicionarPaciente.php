<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Paciente</title>
</head>
<body>
    <h1>Adicionar Paciente</h1>
    <form action="?controller=patient&action=create" method="post">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <label for="age">Idade:</label>
        <input type="number" name="age" required>
        <label for="gender">Gênero:</label>
        <input type="text" name="gender" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>