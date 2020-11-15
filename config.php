<?php

// Indiquer la liste des maisons susceptibles d'être retournées 
$conf["maisons"] = array(
	"serpentard"
	, "griffon d'or"
	, "serre d'aigle"
);

// Saisir la liste des élèves par maison
$conf["eleves"]["serpentard"] = array(
	"riri"
	, "fifi"
	, "loulou"
);
$conf["eleves"]["griffon d'or"] = array(
	"pim"
	, "pam"
);
$conf["eleves"]["serre d'aigle"] = array(
	"aéris"
	, "loïc"
);

// Saisir la liste des phrases par maison
$conf["phrases"]["serpentard"] = array(
	"tu as l'air jeune et dynamique"
	, "tu es très charismatique"
);
$conf["phrases"]["griffon d'or"] = array(
	"tu as l'air très droitier"
	, "tu es très grand"
);
$conf["phrases"]["serre d'aigle"] = array(
	"tu es très svelte"
);

// Saisir le message d'erreur à retourner si le nom de l'élève n'est pas trouvé
$conf["msg_erreur"] = "Désolé, j'ai mal entendu, peux-tu répéter ?";

