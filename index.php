<?php
require('function.php');
require('data.php');
require('app.php');

$columnHeaders = array_keys($array[1]);
?>

<table border="2">
    <tr>
        <?php foreach ($columnHeaders as $columnHeader) : ?>
            <th>
                <a href="?key=<?= $columnHeader ?>&sort=<?= sorting_direction($columnHeader, $_GET['key'], $_GET['sort']) ?>">
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