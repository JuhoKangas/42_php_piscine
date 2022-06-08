#!/usr/bin/php
<?php
    include("ft_is_sort.php");

    $tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
    $tab2 = ["a", "b", "c"];
    $tab3 = ["c", "b", "a"];
    $tab4 = ["c", "b", "a", "c"];
    $sorted = array("abc", "bca", "cba");
    $tab[] = "What are we doing now ?";

    if (ft_is_sort($tab3))
        echo "The array is sorted\n";
    else
        echo "The array is not sorted\n";
    var_dump(ft_is_sort($tab3))
?>