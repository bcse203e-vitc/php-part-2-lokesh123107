<?php
echo "Current Date & Time: ".date("d-m-Y H:i:s")."<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST["dob"];
    $today = new DateTime();
    $birth = new DateTime(date("Y")."-".date("m-d", strtotime($dob)));
    if ($birth < $today) $birth->modify("+1 year");
    $diff = $today->diff($birth);
    echo "Days until next birthday: ".$diff->days;
}
?>
<form method="post">
    Enter Date of Birth (YYYY-MM-DD): 
    <input type="date" name="dob" required>
    <input type="submit" value="Calculate">
</form>

