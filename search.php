<?php
require('data.php');
$searchQuery = trim($_POST["search"]);

$result = array_filter($array, function ($value) use ($searchQuery) {
    return array_search($searchQuery, $value);
}, ARRAY_FILTER_USE_BOTH);

echo '<pre>';
print_r($result);
echo '</pre>';
