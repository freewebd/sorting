<?php function build_sorter($key, $sorting_direction, $dependentKey = '')
{
    return function ($a, $b) use ($key, $sorting_direction, $dependentKey) {
        if ($sorting_direction === 'abc') {
            if (!empty($dependentKey)) {
                return [$a[$key], $a[$dependentKey]] <=> [$b[$key], $b[$dependentKey]];
            }
            return strnatcmp($a[$key], $b[$key]);
        }
        if ($sorting_direction === 'cba') {
            if (!empty($dependentKey)) {
                return [$b[$key], $a[$dependentKey]] <=> [$a[$key], $b[$dependentKey]];
            }
            return strnatcmp($b[$key], $a[$key]);
        }
    };
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