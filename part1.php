<?php
    include "array.php";


    function getFullnameFromParts(string $surname, string $name, string $patronomyc) {
        return implode(" ", [$surname, $name, $patronomyc]);
    }

    function getParstFromFullname(string $fullname) {
        $array = explode(" ", $fullname);
        return [
            'surname' => $array[0],
            'name' => $array[1],
            'patronomyc' => $array[2]
        ];
    }
?>