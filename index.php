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
<div id="wrapper-baloons" class="col">
<?php
require_once "lib.php";
function displayBalloon($content, $id="", $class="") {
  $classHtml = "class=\"oval-speech-1 $class\"";
  $idHtml = ($id != "" ? "id=\"$id\"" : "");
  return "<blockquote $idHtml $classHtml><p>$content</p></blockquote>";
}
$eleve = @$_REQUEST["eleve"];
$displayed_eleve = false;
if (isset($eleve)) {
	if (is_known_eleve($eleve)) {
		$maison = get_maison_for_eleve($eleve);
		$phrase = get_randomly_one_phrase_for_maison($maison);
        echo displayBalloon("$eleve $phrase", "talk_1");
        echo displayBalloon("Je t'assigne à ...", "talk_2", "hide");
        echo displayBalloon($maison, "talk_3", "hide");
		$displayed_eleve = true;
	} else {
        echo displayBalloon(get_error_msg());
	}
}
$classFinalBalloon = ($displayed_eleve ? "hide" : "");
echo displayBalloon("Qui veut-tu que j'évalue maintenant ?", "talk_4", $classFinalBalloon);
?>
</div>
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="eleve">
  <input type="submit" value="go">
</form>

</body>
</html>
