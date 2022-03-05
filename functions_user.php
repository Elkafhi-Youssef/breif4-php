<?php

include'connect.php';

// **************************function for patient *********
// function get all patient 
function getPatients($conn)
{
    $result = $conn->query("SELECT * FROM patient");
    $patient = [];
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
// function get patient x 
function getPatient($conn ,$idPatient)
{
    $result = $conn->query("SELECT * FROM patient where id_patient = $idPatient ");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();   
    }
    return $row;
}
// function for update information about doctor x 
function updatePatient($conn,$values0,$values1,$values2,$values3,$values4,$id){
    
    $stmt = $conn->prepare("UPDATE `patient` SET `fn_patient` = ?, `email_patient` = ?, `passwod` = ?, `date_birth` = ? ,`type_sickness`= ? WHERE `patient`.`id_patient` = ?");
     $stmt->bind_param('sssssi',$values0,$values1,$values2,$values3,$values4,$id );
     return $stmt->execute();
     
 }
 function addPatient($conn,$values0,$values1,$values2,$values3,$values4){
    $stmt = $conn->prepare("INSERT INTO `patient` (`id_patient`, `fn_patient`, `email_patient`, `passwod`, `date_birth`, `type_sickness`, `img_patient`) VALUES (NULL, ?, ?, ?, ?, ?, 'img')");
    $stmt->bind_param('sssss',$values0,$values1,$values2,$values3,$values4 );
    return $stmt->execute();
}

function searchPatient($conn,$name){
    $stmt=$conn->prepare("SELECT * FROM patient where fn_patient like ? ");
    $stmt->bind_param('s',$name);
    $stmt->execute();
    $result = $stmt->get_result();
   
    $patient = [];
    while($row =$result->fetch_assoc()){
        array_push($patient,$row);
    }
   
   
    return $patient;
}

// ************


// function get ALL doctors *********
function getDoctors($conn)
{
    // $result = $conn->query("SELECT * FROM doctor");
    // $doctor = [];
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc())
    //         array_push($doctor, $row);
    // }
        $doctor = [];
        $sql = 'SELECT * FROM doctor';
        foreach ($conn->query($sql) as $row) {
            array_push($doctor, $row);
            
        }
        return $doctor;
}
// function for search doctor 
function searchDoctor($conn,$name){
    $stmt=$conn->prepare("SELECT * FROM doctor where fn_doctor like ? ");
    $stmt->bind_param('s',$name);
    $stmt->execute();
    $result = $stmt->get_result();
   
   
    $doctors = [];
    while($row =$result->fetch_assoc()){
        array_push($doctors,$row);
    }
   
   
    return $doctors;
}
// function delete doctor 
function deleteDoctor($conn, $doctorID)
{
    $stmt = $conn->prepare("DELETE FROM `doctor` WHERE `doctor`.`id_doctor` = ?");
    $stmt->bind_param('i', $doctorID);
    return $stmt->execute();
}

// function get dictor x 
function getDoctor($conn ,$idDoctor)
{
    $result = $conn->query("SELECT * FROM doctor where id_doctor = $idDoctor ");
     

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
            
    }
    return $row;
}
// function for update information about doctor x 
 function updateDoctor($conn,$values0,$values1,$values2,$values3,$values4,$id){
    
   $stmt = $conn->prepare("UPDATE `doctor` SET `fn_doctor` = ?, `email_doctor` = ?, `passwod` = ?, `date_birth` = ? ,`type_Compence`= ? WHERE `doctor`.`id_doctor` = ?");
    $stmt->bind_param('sssssi',$values0,$values1,$values2,$values3,$values4,$id );
    return $stmt->execute();
    
}

// function for add doctor 
function addDoctor($conn,$values0,$values1,$values2,$values3,$values4){
    $stmt = $conn->prepare("INSERT INTO `doctor` (`id_doctor`, `fn_doctor`, `email_doctor`, `passwod`, `date_birth`, `type_Compence`, `img_doctor`) VALUES (NULL, ?, ?, ?, ?, ?, 'img')");
    $stmt->bind_param('sssss',$values0,$values1,$values2,$values3,$values4 );
    return $stmt->execute();
}

// ************

// function login 


function login($conn ,$user,$email,$password){
    if($user == "admin"){
        $stmt =$conn->prepare("SELECT  * FROM  `admin` where `email_admin` = ? AND  `password` =?");
    }else if($user=="doctor"){
        $stmt =$conn->prepare("SELECT  * FROM  `doctor` where `email_doctor` = ? AND  `password` =?");
    }else{
        $stmt =$conn->prepare("SELECT  * FROM  `patient` where `email_doctor` = ? AND  `password` =?");
    }
    $stmt->bind_param('ss',$email,$password);
     $stmt->execute();
     $result=$stmt->get_result();
    $row =[];
    if ($result->num_rows >0) {
        $row = $result->fetch_assoc();      
    }
    return $row;
   
}