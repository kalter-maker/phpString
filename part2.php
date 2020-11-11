<?php
    include "array.php";
    include "part1.php";


    function getShortName(string $fullname) {
        $array = getParstFromFullname($fullname);
        return "{$array['surname']}"." ".mb_substr($array['name'], 0, 1).".";
    }

?>