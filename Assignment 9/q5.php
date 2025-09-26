<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$filename = __DIR__ . "/access.log";
$username = "admin";
$action   = "Logged In";
if (!file_exists($filename)) {
    file_put_contents($filename, "");
}
$entry = $username . " - " . date("Y-m-d H:i:s") . " - " . $action . PHP_EOL;
file_put_contents($filename, $entry, FILE_APPEND);
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$lastFive = array_slice($lines, -5);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Access Log</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; font-family: Arial; }
        th, td { border: 1px solid #555; padding: 8px; text-align: center; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Last 5 Log Entries</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Timestamp</th>
            <th>Action</th>
        </tr>
        <?php foreach ($lastFive as $line): 
            $parts = explode(" - ", $line, 3);
            $user = $parts[0] ?? "Unknown";
            $time = $parts[1] ?? "Unknown";
            $act  = $parts[2] ?? "Unknown"; ?>
        <tr>
            <td><?= htmlspecialchars($user) ?></td>
            <td><?= htmlspecialchars($time) ?></td>
            <td><?= htmlspecialchars($act) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

