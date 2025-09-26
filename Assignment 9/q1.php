<?php
$students = ["Lokesh"=>85, "Chidvi"=>92, "Gnanith"=>78, "Uma"=>95, "Deepthi"=>88];
arsort($students);
$top = array_slice($students, 0, 3, true);
echo "<table border='1'><tr><th>Name</th><th>Marks</th></tr>";
foreach ($top as $name=>$marks) {
    echo "<tr><td>$name</td><td>$marks</td></tr>";
}
echo "</table>";
?>
