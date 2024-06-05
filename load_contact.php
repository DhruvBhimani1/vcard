<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vcard";

$conn = new mysqli($servername, $username, $password, $database);

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 8;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$sql = "SELECT * FROM contacts LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

require 'vendor/autoload.php';

use JeroenDesloovere\VCard\VCard;
use SimpleSoftwareIO\QrCode\Generator;

$qrCode = new Generator;
$contacts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vcard = new VCard();
        $vcard->addName($row["lastname"], $row["firstname"]);
        if (!empty($row["phonework"])) {
            $vcard->addPhoneNumber($row["phonework"], 'WORK');
        }
        if (!empty($row["phonehome"])) {
            $vcard->addPhoneNumber($row["phonehome"], 'HOME');
        }
        if (!empty($row["emailwork"])) {
            $vcard->addEmail($row["emailwork"],'WORK');
        }
        if (!empty($row["emailhome"])) {
            $vcard->addEmail($row["emailhome"],'HOME');
        }
        if (!empty($row["company"])) {
            $vcard->addCompany($row["company"]);
        }
        if (!empty($row["jobtitle"])) {
            $vcard->addJobtitle($row["jobtitle"]);
        }
        if (!empty($row["website"])) {
            $vcard->addURL($row["website"]);
        }
        if (!empty($row["city"])) {
            $vcard->addAddress($row["city"] ,$row["state"]);
        }
       
        if (!empty($row["note"])) {
            $vcard->addNote($row["note"]);
        }
        $vcardContent = $vcard->getOutput();

        $vcardFileName = 'vcard_files/contact_' . $row['id'] . '.vcf';
        file_put_contents($vcardFileName, $vcardContent);
        $qrCodePath = 'qrcodes/contact_' . $row['id'] . '.svg'; 
        $qrCode->format('svg')->generate($vcardContent, $qrCodePath);

        $contacts[] = [
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'phonework' => $row['phonework'],
            'phonehome' => $row['phonehome'],
            'emailwork' => $row['emailwork'],
            'emailhome' => $row['emailhome'],
            'company' => $row['company'],
            'jobtitle' => $row['jobtitle'],
            'city' => $row['city'],
            'state' => $row['state'],
            'website' => $row['website'],
            'note' => $row['note'],
            'vcardFileName' => $vcardFileName,
            'qrCodePath' => $qrCodePath
        ];
    }
}

echo json_encode($contacts);
$conn->close();
?>