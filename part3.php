<?php
    include "array.php";
    include "part1.php";

    function getGenderFromName(string $fullname) {
        $totalGenderSign = 0;
        $array = getParstFromFullname($fullname);

        if(
            mb_substr($array['surname'], -2, 2) === "ва" &&
            mb_substr($array['name'], -1, 1) === "а" &&
            mb_substr($array['patronomyc'], -3, 3) === "вна"
        ) { $totalGenderSign = -1; }
        elseif(
            mb_substr($array['surname'], -1, 1) === "в" &&
            (mb_substr($array['name'], -1, 1) === "й" || mb_substr($array['name'], -1, 1) === "н") &&
            mb_substr($array['patronomyc'], -2, 2) === "ич"
        ) { $totalGenderSign = 1; }
        else { $totalGenderSign = 0; }

        if($totalGenderSign > 0) { return 1; }
        elseif($totalGenderSign < 0) { return -1; }
        else { return 0; }
    }

?>