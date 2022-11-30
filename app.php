<?php


if (!empty($_GET)) {
   usort($array, build_sorter($_GET['key1'], $_GET['sort1']));
   if (!empty($_GET['key2'])) {
      $array = sequentialSorting($array, $_GET['key1'], $_GET['sort1'], $_GET['key2'], $_GET['sort2']);
    }
}