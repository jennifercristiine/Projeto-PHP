<?php
class Paciente {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPaciente() {
        $sql = 'SELECT * FROM pacientes';
        $stmt = $this->db->connect()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function createPaciente($name, $age, $gender) {
        $sql = 'INSERT INTO pacientes (name, age, gender) VALUES (:name, :age, :gender)';
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        return $stmt->execute();
    }

    public function getPacienteById($id) {
        $sql = 'SELECT * FROM pacientes WHERE id = :id';
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updatePaciente($id, $name, $age, $gender) {
        $sql = 'UPDATE pacientes SET name = :name, age = :age, gender = :gender WHERE id = :id';
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deletePaciente($id) {
        $sql = 'DELETE FROM pacientes WHERE id = :id';
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>