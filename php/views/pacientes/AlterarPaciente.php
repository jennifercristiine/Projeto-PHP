<!DOCTYPE html>
<html>
<head>
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Editar Paciente</h1>
    <form action="?controller=patient&action=edit&id=<?php echo $patient->id; ?>" method="post">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $patient->name; ?>" required>
        <label for="age">Idade:</label>
        <input type="number" name="age" value="<?php echo $patient->age; ?>" required>
        <label for="gender">Gênero:</label>
        <input type="text" name="gender" value="<?php echo $patient->gender; ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>