<?php

function get_maisons(){
	require "config.php";
	return $conf["maisons"];
}

function get_eleves_and_their_maison(){
	require "config.php";
	$res = array();
	foreach($conf["maisons"] as $maison){
		foreach($conf["eleves"][$maison] as $eleve) {
			$res[$eleve] = $maison;
		}
	}
	return $res;
}

function get_maison_for_eleve($eleve){
	$eleves_and_their_maison = get_eleves_and_their_maison();
	return $eleves_and_their_maison[$eleve];
}

function is_known_eleve($eleve){
	$eleves_and_their_maison = get_eleves_and_their_maison();
	return array_key_exists($eleve, $eleves_and_their_maison);
}

function get_phrases_for_maison($maison){
	require "config.php";
	$res = array();
	foreach($conf["phrases"][$maison] as $phrase){
		$res[] = $phrase;
	}
	return $res;
}

function get_randomly_one_phrase_for_maison($maison){
	$all_phrases = get_phrases_for_maison($maison);
	$idx = rand(0, count($all_phrases)-1);
	return $all_phrases[$idx];
}

function get_blason_for_maison($maison){
	require "config.php";
	return $conf["blason"][$maison];
}

function get_error_msg(){
	require "config.php";
	return $conf['msg_erreur'];
}

function get_first_name($name){
	$array = explode(' ', $name);
	return $array[0];
}

function html_audio($src, $id, $onEnded="", $autoplay=false){
	$result = "<audio id=\"$id\" onEnded=\"$onEnded\" src=\"$src\"";
	if ($autoplay) {
		$result .= " autoplay";
	}
	$result .= ">Your browser does not support the audioElement</audio>";
	return $result;
}
