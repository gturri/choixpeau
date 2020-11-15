<html>
<head>
  <title>Choixpeau</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="outter">
<img id="choixpeau" class="col" src="choixpeau.jpg" alt="choixpeau" />
<div class="small_col"></div>
<div id="talkbubble" class="col">
<?php
require_once "lib.php";
$eleve = $_REQUEST["eleve"];
if (isset($eleve)) {
	echo "<div>";
	if (is_known_eleve($eleve)) {
		$maison = get_maison_for_eleve($eleve);
		$phrase = get_randomly_one_phrase_for_maison($maison);
		echo "$eleve $phrase. Je t'assigne à $maison";
	} else {
		echo get_error_msg();
	}
	echo "</div>";
}
?>
  
  <div>Qui veux-tu que j'évalue maintenant ?</div>
</div>
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="eleve">
  <input type="submit" value="go">
</form>


</body>
</html>
