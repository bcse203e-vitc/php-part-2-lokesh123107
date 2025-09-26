<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$inputFile = 'data.txt';
$outputFile = 'numbers.txt';
if (!file_exists($inputFile)) {
    die("Input file 'data.txt' does not exist.");
}
$content = file_get_contents($inputFile);
$pattern = '/\b\d{10}\b/';
preg_match_all($pattern, $content, $matches);
$numbers = $matches[0];
file_put_contents($outputFile, implode(PHP_EOL, $numbers));
echo "Mobile numbers have been extracted and saved to 'numbers.txt'.";
?>