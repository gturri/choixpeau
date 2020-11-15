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

function get_error_msg(){
	require "config.php";
	return $conf['msg_erreur'];
}
