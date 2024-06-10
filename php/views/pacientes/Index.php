<!DOCTYPE html>
<html>
<head>
    <title>Pacientes</title>
</head>
<body>
    <h1>Lista de Pacientes</h1>
    <?php flash('patient_message'); ?>
    <a href="?controller=patient&action=create">Adicionar Paciente</a>
    <ul>
        <?php foreach ($patients as $patient): ?>
            <li>
                <?php echo $patient->name; ?>
                <a href="?controller=patient&action=edit&id=<?php echo $patient->id; ?>">Editar</a>
                <a href="?controller=patient&action=delete&id=<?php echo $patient->id; ?>">Deletar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>