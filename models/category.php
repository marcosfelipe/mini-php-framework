<?php
function category($attribute_values = []){
	$record = new Record('categories', $attribute_values);
	$record->attributes('title', 'description', 'created_at', 'user_id');
	$record->validates_presence_of('title', 'user_id');
	return $record;
}
