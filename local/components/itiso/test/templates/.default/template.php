<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
$dayPost = $_POST['NUMBER'];
$dayAddNow = 0;

for ($i = 0; $i <= $dayPost; $i++) { 
    $date = date("d.m.Y", time() + 60*60*24*$dayAddNow);
    $dayAddNow++;

    if(date('w', strtotime($date)) == 0 || date('w', strtotime($date)) == 6) {
        $i--;
    }
    else {
        foreach ($arResult as $arItem) {
            $dayDB = date("d.m.Y", strtotime($arItem['DATE_HOLIDAY']['VALUE']));
    
            if($dayDB == $date) {
                $i--;
            }
        }
    }
}
?>

<?echo '<p>';  print_r($date); echo '</p>';?>

<form action="." method="post">
    <input type="number" name="NUMBER">

    <button type="submit">Отправить</button>
</form>