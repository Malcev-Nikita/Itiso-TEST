<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$arResult = [];
$iblockId = 20; 

if(CModule::IncludeModule("iblock")) {
    $res = CIBlockElement::GetList(
        Array(), 
        Array(
            "IBLOCK_ID" => $iblockId, 
            "ACTIVE_DATE" => "Y", 
            "ACTIVE" => "Y"
        ), 
        false, 
        Array("nPageSize" => 50), 
        Array("ID", "NAME", "DATE_ACTIVE_FROM", "DATE_HOLIDAY")
    );
    
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arProps = CIBlockElement::GetProperty($iblockId, $arFields['ID'], array("sort" => "asc"), Array());

        $arResult[$arFields['ID']] = $arFields;

        while ($arProp = $arProps->GetNext()) {
            $arResult[$arFields['ID']] += [$arProp['CODE'] => $arProp];   
        }
    }
}

$this->IncludeComponentTemplate();
?>