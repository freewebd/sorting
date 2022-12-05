<!DOCTYPE html>

<head>
    <script type="text/javascript" src="/assets/js/ajax.js"></script>
</head>
<?php
require('app.php');

$columnHeaders = array_keys($array[1]);
?>

<body>

    <div class="form_container">

        <form id="formSearch" method="post">
            <input type="text" name="search">
            <input type="submit" name="send" value="Отправить">
        </form>
        <div id="result"></div>
    </div>


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
</body>

</html>