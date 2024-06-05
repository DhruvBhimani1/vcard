<?php
$connect = new  PDO("mysql:host=localhost;dbname=vcard","root","");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["action"] == "add_contact") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email_work = $_POST['email_work'];
        $email_home = $_POST['email_home'];
        $company = $_POST['company'];
        $phone_work= $_POST['phone_work'];
        $phone_home = $_POST['phone_home'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $job_title = $_POST['job_title'];
        $website = $_POST['website'];
        $note = $_POST['note'];
        try {
            $insertStmt = $connect->prepare("INSERT INTO contacts (firstname, lastname, emailwork, emailhome, phonework, phonehome, company, city, state, jobtitle, website, note) VALUES 
                (:first_name, :last_name, :email_work, :email_home, :phone_work, :phone_home, :company, :city, :state, :job_title, :website, :note)");
            $insertStmt->bindParam(':first_name', $first_name);
            $insertStmt->bindParam(':last_name', $last_name);
            $insertStmt->bindParam(':email_work', $email_work);
            $insertStmt->bindParam(':email_home', $email_home);
            $insertStmt->bindParam(':phone_work', $phone_work);
            $insertStmt->bindParam(':phone_home', $phone_home);
            $insertStmt->bindParam(':company', $company);
            $insertStmt->bindParam(':city', $city);
            $insertStmt->bindParam(':state', $state);
            $insertStmt->bindParam(':job_title', $job_title);
            $insertStmt->bindParam(':website', $website);
            $insertStmt->bindParam(':note', $note);
          
            $insertStmt->execute();
            echo json_encode(array('status' => 'success', 'message' => 'contact stored successfully'));
        } catch (PDOException $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Error storing contact: ' . $e->getMessage()));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
    }
}
?>