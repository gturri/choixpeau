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
$eleve = strtolower(@$_REQUEST["eleve"]);
?>
 <div id="cadre" class="centered">
  <img class="superpose" id="choixpeau" src="choixpeau.jpg" alt="choixpeau" />
    <?php
    if ($eleve !== "") {
        $maison = get_maison_for_eleve($eleve);
        echo '<img id="blason" class="superpose transparent hide" src="' . get_blason_for_maison($maison) . '" alt="blason" />';
    }
    ?>
 </div>
  <form class="centered block" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input class="centered block"  type="text" name="eleve">
    <input class="centered block"  type="submit" value="Nom de l'élève">
  </form>

  <audio id="audio_garcon" src="audio/bonjour_garcon.m4a">Your browser does not support the audio element</audio>
  <audio id="audio_fille" src="audio/bonjour_fille.m4a">Your browser does not support the audio element</audio>

<?php
  if ($eleve !== ""){
    if (is_known_eleve($eleve)){
      echo html_audio("audio/prenoms/" . get_first_name($eleve) . ".m4a", "prenom", "document.getElementById('audio_observer').play();", true);
      echo html_audio("audio/laisse_moi_tobserver.m4a", "audio_observer", "document.getElementById('audio_carac').play();");
      echo html_audio("audio/caracs/carac_$eleve.m4a", "audio_carac", "document.getElementById('audio_assignation').play();"); 
      echo html_audio("audio/je_tassigne_a.m4a", "audio_assignation", "displayBlason(); document.getElementById('audio_blason').play();");
      echo html_audio("audio/blasons/" . $maison . ".m4a", "audio_blason", "hideBlason();");
    } else {
      echo html_audio("audio/erreur.m4a", "audio_erreur", "", true);
    }
  }
?>
</body>
</html>
