<?php
require_once "config.php";
require_once "lib.php";
?>
<html>
<head>
  <title>Choixpeau : vérification de la conf</title>
  <meta charset="UTF-8">
</head>
<body>
<h1>Erreurs constatées</h1>
<?php

// Check "maisons" are defined
if (!array_key_exists("maisons", $conf)) {
  echo "La liste des maisons n'est pas définie.";
  close_and_exit();
}

// Check the blasons are correctly defined
$has_error = false;
if (!array_key_exists("blason", $conf)) {
  echo "La liste des blasons n'est pas définie.";
  close_and_exit();
}

foreach($conf["maisons"] as $maison){
  if (!array_key_exists($maison, $conf["blason"])){
    echo "la maison $maison n'a pas de blason<br>";
    $has_error = true;
  } else if (!file_exists($conf["blason"][$maison])) {
     echo "le fichier " . $conf["blason"][$maison] . " n'a pas l'air d'exister<br>";
     $has_error = true;
  }
}

// Check each maison has a list of eleves (even if the list is empty)
if (!array_key_exists("eleves", $conf)) {
  echo "Les listes d'élèves ne sont pas définies.";
  close_and_exit();
}
foreach ($conf["maisons"] as $maison){
	if (!array_key_exists($maison, $conf["eleves"])){
		echo "la maison $maison n'a pas de liste d'élèves.<br>";
		$has_error = true;
	}
}

// Check no eleve is registered to a non existant maison
foreach ($conf["eleves"] as $maison => $eleves){
	if (!in_array($maison, $conf["maisons"])){
		echo "Il y a une liste d'élèves pour la maison $maison mais celle-ci n'existe pas.<br>";
		$has_error = true;
	}
}

// Check no eleve is in several maison
$all_eleves = array();
foreach($conf["eleves"] as $maison => $eleves){
	foreach($eleves as $eleve){
		if(array_key_exists($eleve, $all_eleves)){
			echo "L'élève $eleve a l'air défini en double (dans la maison " . $all_eleves[$eleve] . " et $maison).<br>";
			$has_error = true;
		} else {
			$all_eleves[$eleve] = $maison;
		}
	}
}

if ($has_error){
	close_and_exit();
}

// Check each maison has phrases
if (!array_key_exists("phrases", $conf)) {
  echo "Les listes de phrases du choixpeau ne sont pas définies.";
  close_and_exit();
}
$has_error = false;
foreach ($conf["maisons"] as $maison){
	if (!array_key_exists($maison, $conf["phrases"])){
		echo "la maison $maison n'a pas de liste de phrase.<br>";
		$has_error = true;
	}
}

// Check no phrases is associated to a non existant maison
foreach ($conf["phrases"] as $maison => $phrases){
	if (!in_array($maison, $conf["maisons"])){
		echo "Il y a une liste de phrases pour la maison $maison mais celle-ci n'existe pas.<br>";
		$has_error = true;
	}
}
if ($has_error){
	close_and_exit();
}

// Check the error msg is correctly defined
if (!array_key_exists("msg_erreur", $conf)) {
  echo "La message d'erreur (en cas de nom d'élève non reconnu) n'est pas défini (clé 'msg_erreur').";
  close_and_exit();
}

?>
<div>Aucune erreur constatée, le fichier de conf a l'air correct</div>

<h1>Liste des maisons</h1>
<ul>
<?php
  foreach(get_maisons() as $maison){
    echo "<li>$maison</li>";
  }
?>
</ul>

<h1>Liste des élèves</h1>
<ul>
<?php
	foreach(get_eleves_and_their_maison() as $eleve => $maison){
    echo "<li>$eleve : $maison</li>";
	}
?>
</ul>

<h1>Liste des phrases</h1>
<ul>
<?php
	foreach(get_maisons() as $maison){
		echo "<li>$maison</li><ul>";
		foreach (get_phrases_for_maison($maison) as $phrase){
			echo "<li>$phrase</li>";
		}
		echo "</ul>";
	}
?>
</ul>

<h1>Liste des blasons</h1>
<ul>
<?php
  foreach(get_maisons() as $maison){
    echo "<li>$maison : <img src=" . $conf["blason"][$maison] . " /></li>";
  }
?>
</ul>

<h1>Message d'erreur</h1>
<?php
  echo get_error_msg();
?>

<?php
close_and_exit();
function close_and_exit(){
  echo "</body>\n";
  echo "</html>\n";
  exit;
}
