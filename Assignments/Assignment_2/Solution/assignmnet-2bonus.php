<?php 
$url = 'wizard.json';
$data = file_get_contents($url);
$characters = json_decode($data);

foreach ($characters as $character) {
	echo $character->name.'\'s wand is '.
	$character->wand[0]->wood.', '.
	$character->wand[0]->length.', with a'.
	$character->wand[0]->core.' core.'. '<br>';
}
?>