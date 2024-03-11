<?php

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

$dbHost = 'localhost';
$dbName = 'vision_concept';
$dbUser = 'root';
$dbPass = 'MTrw@20021022';
// $tables = array("category", "city");

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all tables in the database
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);
$tables = array();
$result = $mysqli->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

date_default_timezone_set("Asia/Colombo");
// Create a backup file
$backupFile = 'visionconcept_database_backup_' . date('Ymd_His') . '.sql';
$handle = fopen("db_backup/$backupFile", 'w');

// Loop through each table and export its structure and data
foreach ($tables as $table) {

    $structure = $mysqli->query("SHOW CREATE TABLE $table");

    if ($structure === false) {
        die("Error: " . $mysqli->error);
    }

    $structureRow = $structure->fetch_row();

    if ($structureRow === false) {
        die("Error fetching structure row: " . $mysqli->error);
    }

    fwrite($handle, "\n\n" . $structureRow[1] . ";\n\n");

    $data = $mysqli->query("SELECT * FROM $table");

    if ($data === false) {
        die("Error: " . $mysqli->error);
    }

    while ($row = $data->fetch_assoc()) {
        $insert = "INSERT INTO $table VALUES (";
        foreach ($row as $value) {
            if (isset($value)) {
                $insert .= "'" . $mysqli->real_escape_string($value) . "',";
            } else {
                $insert .= "NULL,";
            }
        }
        $insert = rtrim($insert, ',') . ");\n";
        fwrite($handle, $insert);
    }
}

// Close the file handle
fclose($handle);

// Close the database connection
$conn->close();

$dbdate = date('Y-m-d');
$dbtime = date('H:i:s');
// Email configuration
$emailFrom = 'thinuka1@gmail.com';
$emailTo = 'thinuka1@gmail.com';
$emailSubject = 'Database Backup__ Date: ' . $dbdate . ' __Time: ' . $dbtime;
$emailMessage = 'Please find the database backup attached.';

// Create a PHPMailer instance
use PHPMailer\PHPMailer\PHPMailer;

try {

    // SMTP configuration
    $mail = new PHPMailer;
    $mail->IsSMTP();
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'thinuka1@gmail.com';
    $mail->Password = 'yarl eucj ixou ritx';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom($emailTo, 'Vision Concept');
    $mail->addReplyTo($emailTo, 'Vision Concept');
    $mail->addAddress($emailFrom);
    $mail->isHTML(true);
    $mail->Subject = $emailSubject;
    $bodyContent = $emailMessage;
    $mail->Body    = $bodyContent;
    $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    // include "$rootDir/$backupFileName";

    $file = "./db_backup/$backupFile";
    $mail->addAttachment($file);

    if (!$mail->send()) {
        echo 'Verification code sending failed' . $mail->ErrorInfo;
    } else {
        echo 'Success';
    }
} catch (Exception $e) {
    $result = $e->getMessage();
    echo $result;
}
