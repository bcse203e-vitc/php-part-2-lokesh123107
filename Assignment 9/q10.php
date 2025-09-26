<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST["students"]);
    $lines = explode("\n", $input);
    $errors = [];
    echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Age</th></tr>";
    foreach ($lines as $line) {
        $parts = array_map("trim", explode(",", $line));
        if (count($parts) != 3) {
            $errors[] = $line;
            continue;
        }
        list($name, $email, $dob) = $parts;
        if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
            $errors[] = $line;
            continue;
        }
        $birth = DateTime::createFromFormat("Y-m-d", $dob);
        if (!$birth) {
            $errors[] = $line;
            continue;
        }
        $today = new DateTime();
        $age = $today->diff($birth)->y;
        echo "<tr><td>$name</td><td>$email</td><td>$age</td></tr>";
    }
    echo "</table>";
    if (!empty($errors)) {
        file_put_contents("errors.log", implode("\n", $errors)."\n", FILE_APPEND);
        echo "Some invalid records were saved into errors.log";
    }
}
?>
<form method="post">
    Enter student records (one per line, format: Name,Email,YYYY-MM-DD):<br>
    <textarea name="students" rows="6" cols="50" placeholder="Lokesh,loki123@gmail.com,2006-07-11"></textarea><br>
    <input type="submit" value="Validate">
</form>

