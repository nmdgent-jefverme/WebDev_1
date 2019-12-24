<?php
require_once 'app.php';
$check = false;
if(!empty($_POST)){
	if(trim($_POST['name']) == '' || $_POST['email'] == '') {
		$check = false;
	} else {
		$dates = Doedel::datesById($_POST['doedel_code']);
		$doedel = Doedel::doedelById($_POST['doedel_code']);
		if(!empty($_POST['dates']) && sizeof($dates) > 0) {
			Doedel::add_votes($_POST['name'], $_POST['email'], $_POST['dates']);
			$check = true;
		} else if(empty($_POST['dates']) && sizeof($dates) > 0){
			$check = true;
		} else {
			$check = false;
		}
	}
}
if(!$check)header('Location: index.php');
else header('Location: results.php?doedel_code=' . $_POST['doedel_code']);

