<?php
$lines = file("products.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$products = [];
foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) == 2) {
        $products[] = ["name"=>trim($parts[0]), "price"=>(int)trim($parts[1])];
    }
}
usort($products, function($a,$b){ return $a["price"] - $b["price"]; });
echo "<table border='1'><tr><th>Product</th><th>Price</th></tr>";
foreach ($products as $p) {
    echo "<tr><td>{$p['name']}</td><td>{$p['price']}</td></tr>";
}
echo "</table>";
?>

