<?php function build_sorter($key, $sorting_direction)
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

    $uniqueValue = array_count_values(array_column($array, $primaryKey));
    $result = [];
    foreach ($uniqueValue as $k => $v) {
        $output = array_splice($array, 0, $v);
        usort($output, build_sorter($dependentKey, $dependentSort));
        $result = array_merge($result, $output);
    }
    return $result;
}

function sorting_direction($columnHeader, $key, $sorting)
{
    if ($columnHeader === $key && $sorting === 'abc') {
        return 'cba';
    }
    if ($columnHeader === $key && $sorting === 'cba') {
        return '';
    }
    return 'abc';
}
