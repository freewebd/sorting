<?php
require('app.php');

$columnHeaders = array_keys($array[1]);
?>
<!DOCTYPE html>

<head>
    <script type="text/javascript" src="/assets/js/ajax.js"></script>
</head>

<body>

    <div class="form_container">

        <form id="formSearch" method="post">
            <input type="text" name="search">
            <input type="submit" name="send" value="Отправить">
        </form>
        <div id="resultText"></div>
    </div>

    <table id="tableData" border="2">
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
            <tr class="itemData">
                <?php foreach ($item as $name => $cell) : ?>
                    <td class="<?= $name ?>"><?= $cell ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>