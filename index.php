<?php
require('function.php');
require('data.php');
require('app.php');

$columnHeaders = array_keys($array[1]);
echo '<pre>';
print_r($_GET);
echo '</pre>';
?>

<table border="2">
    <tr>
        <?php foreach ($columnHeaders as $columnHeader) : ?>
            <th>
                <a href="<?= sorting_direction($columnHeader); ?>">
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

<?php echo '<pre>';
print_r(sequentialSorting($array, 'city', 'abc', 'store', 'abc'));
echo '</pre>';