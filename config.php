<?php

// Indiquer la liste des maisons susceptibles d'être retournées 
$conf["maisons"] = array(
	"serpentard"
	, "gryffondor"
	, "serdaigle"
    , "poufsouffle"
);

// Indiquer le nom du fichier du blason
$conf["blason"]["serpentard"] = "serpentard.png";
$conf["blason"]["gryffondor"] = "gryffondor.png";
$conf["blason"]["poufsouffle"] = "poufsouffle.png";
$conf["blason"]["serdaigle"] = "serdaigle.png";

// Saisir la liste des élèves par maison
$conf["eleves"]["serpentard"] = array(
	"riri"
	, "fifi"
	, "loulou"
);
$conf["eleves"]["gryffondor"] = array(
	"pim"
	, "pam"
);
$conf["eleves"]["serdaigle"] = array(
	"aéris"
	, "loïc"
);
$conf["eleves"]["poufsouffle"] = array();

// Saisir la liste des phrases par maison
$conf["phrases"]["serpentard"] = array(
	"tu as l'air jeune et dynamique"
	, "tu es très charismatique"
);
$conf["phrases"]["gryffondor"] = array(
	"tu as l'air très droitier"
	, "tu es très grand"
);
$conf["phrases"]["serdaigle"] = array(
	"tu es très svelte"
);
$conf["phrases"]["poufsouffle"] = array(
    "vive les souffles"
);

// Saisir le message d'erreur à retourner si le nom de l'élève n'est pas trouvé
$conf["msg_erreur"] = "Désolé, j'ai mal entendu, peux-tu répéter ?";

