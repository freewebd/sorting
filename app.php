<?php
if (!empty($_GET)) {
   usort($array, build_sorter($_GET['key'], $_GET['sort']));
}

echo '<pre>';
print_r(sequentialSorting($array, 'city', 'abc', 'store', 'abc'));
echo '</pre>';