<?php

include'connect.php';

// function for patient *********
// function get all patient 
function getPatients($conn)
{
    $result = $conn->query("SELECT * FROM patient");
    $patient = [];
    print_r($result);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc())
            array_push($patient, $row);
    }

    return $patient;
}
// function delete patient 
function deletePatient($conn, $patientID)
{
    $stmt = $conn->prepare("DELETE FROM `patient` WHERE `patient`.`id_patient` = ?");
    $stmt->bind_param('i', $patientID);
    return $stmt->execute();
}

// ************


// function get ALL doctors *********
function getDoctors($conn)
{
    $result = $conn->query("SELECT * FROM doctor");
    $doctor = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc())
            array_push($doctor, $row);
    }

    return $doctor;
}
// function delete doctor 
function deleteDoctor($conn, $doctorID)
{
    $stmt = $conn->prepare("DELETE FROM `doctor` WHERE `doctor`.`id_doctor` = ?");
    $stmt->bind_param('i', $doctorID);
    return $stmt->execute();
}

// ************
