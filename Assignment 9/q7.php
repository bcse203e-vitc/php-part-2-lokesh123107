<?php
class EmptyArrayException extends Exception {}
function average($arr) {
    if (empty($arr)) throw new EmptyArrayException("No numbers provided");
    return array_sum($arr)/count($arr);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST["numbers"]);
    $nums = array_filter(array_map("trim", explode(",", $input)), "is_numeric");
    try {
        echo "Average: ".average($nums);
    } catch (EmptyArrayException $e) {
        echo $e->getMessage();
    }
}
?>
<form method="post">
    Enter numbers (comma separated): 
    <input type="text" name="numbers" placeholder="10,20,30,40,50">
    <input type="submit" value="Calculate">
</form>

