<?php
require('function.php');
require('data.php');
require('app.php');

$columnHeaders = array_keys($array[1]);

function createHref($getParam, $columnHeader)
{
    if (empty($getParam) ) {
        $getParam = ['key1' => $columnHeader, 'sort1' => 'abc'];
        return http_build_query($getParam, '', '&amp;');
    }
    if ($getParam['key1'] === $columnHeader && !array_key_exists('key2', $getParam)) {
        $getParam['sort1'] = 'cba';
        return http_build_query($getParam, '', '&amp;');
    }
    if ($getParam['key1'] !== $columnHeader && !array_key_exists('key2', $getParam)) {
        $getParam = ['key2' => $columnHeader, 'sort2' => 'abc'];
        return http_build_query($getParam, '', '&amp;');
    }
    if ($getParam['key2'] === $columnHeader ) {
        $getParam['sort2'] =  'cba';
        return http_build_query($getParam, '', '&amp;');
    }


}

?>

<table border="2">
    <tr>
        <?php foreach ($columnHeaders as $columnHeader) : ?>
            <th>
                <a href="?<?= createHref($_GET, $columnHeader) ?>">
                    <?= $columnHeader ?>
                </a>
            </th>
        <?php endforeach ?>
    </tr>
    <?php foreach ($array as $item) : ?>
        <tr>
            <?php foreach ($item as $cell) : ?>
                <td><?= $cell ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>