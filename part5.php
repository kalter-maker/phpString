<?php
    include "array.php";
    include "part1.php";
    include "part2.php";
    include "part3.php";


function getPerfectPartner(string $surname, string $name, string $patronomyc, array $example_persons_array) {
    mb_convert_case($surname, MB_CASE_TITLE_SIMPLE);
    mb_convert_case($name, MB_CASE_TITLE_SIMPLE);
    mb_convert_case($patronomyc, MB_CASE_TITLE_SIMPLE);

    $fullname = getFullnameFromParts($surname, $name, $patronomyc);
    $firstPersonGender = getGenderFromName($fullname);
    if($firstPersonGender == 0) return "некорректные ФИО";

    do {
        $n = rand(0, count($example_persons_array) - 1);
        $secondPersonFullname = $example_persons_array[$n]['fullname'];
        $secondPersonGender = getGenderFromName($secondPersonFullname);
    } while($firstPersonGender !== -$secondPersonGender);

    $firstShortName = getShortName($fullname);
    $secondShortName = getShortName($secondPersonFullname);
    $int = mt_rand(50, 100);
    $fractional = mt_rand(0,99) / 100;
    $compatibilityPersent = $int + $fractional;

    return <<<HEREDOCLETTER
$firstShortName + $secondShortName = 
♡ Идеально на $compatibilityPersent% ♡
HEREDOCLETTER;
}

?>