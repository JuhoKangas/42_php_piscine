<?php
    function ft_is_sort($tab) {
        $arr = $tab;
        $rev_arr = $tab;
        rsort($rev_arr);
        sort($arr);
        return ($arr === $tab || $rev_arr === $tab);
    }
?>