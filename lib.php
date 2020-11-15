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

function get_phrases_for_maison($maison){
	require "config.php";
  $res = array();
	foreach($conf["phrases"][$maison] as $phrase){
		$res[] = $phrase;
	}
	return $res;
}

function get_error_msg(){
	require "config.php";
	return $conf['msg_erreur'];
}
