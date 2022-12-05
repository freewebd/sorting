<?php 
function build_sorter($key, $sorting_direction)
{
    return function ($a, $b) use ($key, $sorting_direction) {
        if ($sorting_direction === 'abc') {
            return strnatcmp($a[$key], $b[$key]);
        }
        if ($sorting_direction === 'cba') {
            return strnatcmp($b[$key], $a[$key]);
        }
    };
}

function sequentialSorting($array, $primaryKey, $primarySort, $dependentKey = '', $dependentSort = '')
{
    $result = [];
    $uniqueValue = array_count_values(array_column($array, $primaryKey)); 
    foreach ($uniqueValue as $v) {
        $output = array_splice($array, 0, $v);
        usort($output, build_sorter($dependentKey, $dependentSort));
        $result = array_merge($result, $output);
    }
    return $result;
}

function sorting_direction($columnHeader)
{
    if ($_GET['key2'] === $columnHeader && $_GET['sort2'] === 'cba') { //натиск на другу колонку третій раз
        return "?key1=".$_GET['key1']."&sort1=".$_GET['sort1'];
    }
    if ($_GET['key2'] === $columnHeader && $_GET['sort2'] === 'abc') { //натиск на другу колонку другий раз
        return "?key1=".$_GET['key1']."&sort1=".$_GET['sort1']."&key2=".$_GET['key2']."&sort2=cba";
    }
    if ($_GET['key1'] !== $columnHeader && $_GET['sort1'] === 'abc') { //натиск на другу колонку перший раз
        return "?key1=".$_GET['key1']."&sort1=".$_GET['sort1']."&key2=".$columnHeader."&sort2=abc";
    }

    if ($_GET['key1'] !== $columnHeader && $_GET['sort1'] === 'cba') { //натиск на другу колонку після зворотнього сортування
        return "?key1=".$_GET['key1']."&sort1=".$_GET['sort1']."&key2=".$columnHeader."&sort2=abc";
    }
    if ($_GET['key1'] === $columnHeader && $_GET['sort1'] === 'cba') { //натиск на першу колонку третій раз
        return "?key1=&sort1=";
    }
    if ($_GET['key1'] === $columnHeader && $_GET['sort1'] === 'abc') { //натиск на першу колонку другий раз
        return "?key1=$columnHeader&sort1=cba";
    }
    if (empty($_GET) || empty($_GET['key1'])) { //натиск на першу колонку
        return "?key1=$columnHeader&sort1=abc";
    }
    return "";
}