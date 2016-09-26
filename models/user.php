<?php
function user($attribute_values = []){
	$record = new Record('users', $attribute_values);
	$record->attributes('name', 'login', 'password', 'created_at', 'actived');
	$record->validates_presence_of('name', 'login', 'password', 'created_at', 'actived');
	return $record;
}
