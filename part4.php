<?php
    include "array.php";
    include "part3.php";


    function getGenderDescription(array $example_persons_array) {
        $womenArray = array_filter($example_persons_array, function($person) {
            return getGenderFromName($person['fullname']) === -1;
        });
        $menArray = array_filter($example_persons_array, function($person) {
            return getGenderFromName($person['fullname']) === 1;
        });
        $undefinedGenderArray = array_filter($example_persons_array, function($person) {
            return getGenderFromName($person['fullname']) === 0;
        });
        // okruglenie dodelat
        $totalWomenPersent = ( count($womenArray) / count($example_persons_array)) * 100;
        $totalMenPersent = ( count($menArray) / count($example_persons_array)) * 100;
        $totalUndefinedGenderPersent = ( count($undefinedGenderArray) / count($example_persons_array)) * 100;

        $totalWomenPersent = round($totalWomenPersent, 1);
        $totalMenPersent = round($totalMenPersent, 1);
        $totalUndefinedGenderPersent = round($totalUndefinedGenderPersent, 1);

        return <<<HEREDOCLETTER
Гендерный состав аудитории:
---------------------------
Мужчины - $totalMenPersent%
Женщины - $totalWomenPersent%
Не удалось определить - $totalUndefinedGenderPersent%
HEREDOCLETTER;
    }

?>