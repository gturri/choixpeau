<html>
<head>
  <title>Choixpeau</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<?php
require_once "lib.php";
$eleve = @$_REQUEST["eleve"];
?>

<div id="outter" class="centered">
<div class="col">
  <div id="cadre">
    <img id="choixpeau" class="superpose" src="choixpeau.jpg" alt="choixpeau" />
    <?php
    if (isset($eleve)) {
        $maison = get_maison_for_eleve($eleve);
        echo '<img id="blason" class="superpose transparent hide" src="' . get_blason_for_maison($maison) . '" alt="blason" />';
    }
    ?>
  </div>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="eleve">
    <input type="submit" value="Nom de l'élève">
  </form>
</div>
<div class="small_col"></div>
<div id="talkbubble" class="col">
<?php
$displayed_eleve = false;
if (isset($eleve)) {
	if (is_known_eleve($eleve)) {
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

</body>
</html>
