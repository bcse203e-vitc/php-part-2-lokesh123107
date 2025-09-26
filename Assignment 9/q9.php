<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function createBackup($filePath) {
    if (!file_exists($filePath)) {
        die("File '$filePath' does not exist.");
    }
    $currentDateTime = date('Y-m-d_H-i');
    $fileInfo = pathinfo($filePath);
    $fileName = $fileInfo['filename'];
    $fileExtension = isset($fileInfo['extension']) ? '.' . $fileInfo['extension'] : '';
    $backupFileName = $fileName . '_' . $currentDateTime . $fileExtension;
    if (copy($filePath, $backupFileName)) {
        echo "Backup created successfully: $backupFileName";
    } else {
        echo "Failed to create backup.";
    }
}
$fileToBackup = 'data.txt';
createBackup($fileToBackup);
?>