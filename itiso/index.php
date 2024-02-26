<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');?>

<? $APPLICATION->IncludeComponent(
	"itiso:test",
	".default",
	Array(
	),
	false
);?>

<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>