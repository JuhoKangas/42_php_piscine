<?php
    function ft_is_sort($tab) {
        $arr = $tab;
        sort($arr);
        return ($arr === $tab);
    }
?>