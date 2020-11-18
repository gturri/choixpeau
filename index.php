<html>
<head>
  <title>Choixpeau</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>

<div id="outter">
<img id="choixpeau" class="col" src="choixpeau.jpg" alt="choixpeau" />
<div class="small_col"></div>
<div id="talkbubble" class="col">
<?php
require_once "lib.php";
$eleve = @$_REQUEST["eleve"];
$displayed_eleve = false;
if (isset($eleve)) {
	if (is_known_eleve($eleve)) {
		$maison = get_maison_for_eleve($eleve);
		$phrase = get_randomly_one_phrase_for_maison($maison);
		echo "<div id=\"talk_1\">$eleve $phrase</div>";
		echo "<div id=\"talk_2\" class=\"hide\">Je t'assigne à ...</div>";
		echo "<div id=\"talk_3\" class=\"hide\">$maison</div>";
		$displayed_eleve = true;
	} else {
		echo "<div>" . get_error_msg() . "</div>";
	}
}
?>
  
  <div id="talk_4" <?php if ($displayed_eleve){echo "class=\"hide\"";} ?>>Qui veux-tu que j'évalue maintenant ?</div>
</div>
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="eleve">
  <input type="submit" value="go">
</form>

</body>
</html>
