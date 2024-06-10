<?php
require_once '../models/Patient.php';

class PatientController {
    private $patientModel;

    public function __construct() {
        $this->patientModel = new Patient();
    }

    public function index() {
        $patients = $this->patientModel->getPatients();
        require_once '../views/patients/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $age = trim($_POST['age']);
            $gender = trim($_POST['gender']);

            if ($this->patientModel->createPatient($name, $age, $gender)) {
                flash('patient_message', 'Patient added');
                redirect('patient/index');
            } else {
                flash('patient_message', 'Something went wrong', 'alert alert-danger');
                require_once '../views/patients/create.php';
            }
        } else {
            require_once '../views/patients/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $age = trim($_POST['age']);
            $gender = trim($_POST['gender']);

            if ($this->patientModel->updatePatient($id, $name, $age, $gender)) {
                flash('patient_message', 'Patient updated');
                redirect('patient/index');
            } else {
                flash('patient_message', 'Something went wrong', 'alert alert-danger');
                require_once '../views/patients/edit.php';
            }
        } else {
            $patient = $this->patientModel->getPatientById($id);
            require_once '../views/patients/edit.php';
        }
    }

    public function delete($id) {
        if ($this->patientModel->deletePatient($id)) {
            flash('patient_message', 'Patient removed');
            redirect('patient/index');
        } else {
            flash('patient_message', 'Something went wrong', 'alert alert-danger');
            redirect('patient/index');
        }
    }
}
?>