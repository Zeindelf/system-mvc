<?php

function p($data) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function d($data) {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

function dd($data) {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';

	die();
}