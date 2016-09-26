<?php

function show(){
	$category = category()->find(params('category_id'));
	$contents = content()->where(['category_id' => $category->id, 'actived' => true]);
	if(!empty(params('id'))){
		$content = content()->find(params('id'));
	}else{
		$content = content()->find_by(['category_id' => $category->id]);
	}
	require 'show.html.php';
}
