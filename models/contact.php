<?php
function contact($attribute_values = []){
	$record = new Record('contacts', $attribute_values);
	$record->attributes('name', 'email', 'phone', 'comment');
	$record->validates_presence_of('name', 'email', 'phone', 'comment');
	return $record;
}
