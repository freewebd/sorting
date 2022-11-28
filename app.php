<?php
if (!empty($_GET)) {
   usort($array, build_sorter($_GET['key'], $_GET['sort']));
}