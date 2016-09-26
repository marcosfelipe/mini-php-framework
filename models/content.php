<?php
function content($attribute_values = []){
	$record = new Record('contents', $attribute_values);
	$record->attributes('title', 'body', 'created_at', 'user_id', 'category_id');
	$record->validates_presence_of('title', 'body', 'created_at', 'user_id', 'category_id');
	return $record;
}
