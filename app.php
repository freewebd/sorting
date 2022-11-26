<?php 
if (!empty($_GET['sort'])) {
    usort($array, build_sorter($_GET['key'], $_GET['sort'], 'store'));
}
