<html>
<head>
  <title>Choixpeau</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script>
var alreadyPlayedPoem = false;
var audioIsBeingPlayed = false;
function choixpeauClicked(){
  if (window.audioIsBeingPlayed){
    return;
  }
  window.audioIsBeingPlayed = true;
  if ( !window.alreadyPlayedPoem ){
    document.getElementById('audio_poeme').play();
    window.alreadyPlayedPoem = true;
  } else {
    document.getElementById('audio_bravo').play();
  }
}

function next(idCurrent, idNext){
  document.getElementById(idCurrent).classList.add('hide');
  document.getElementById(idCurrent).classList.remove('block');

  document.getElementById(idNext).classList.remove('hide');
  document.getElementById(idNext).classList.add('block');
}
  </script>
</head>
<body>

<img class="img_intro block" onClick="next('chateau', 'salle');" id="chateau" src="chateau.png" alt="chateau.png" />
<img class="img_intro hide" onClick="next('salle', 'localisation');" id="salle" src="salle_principale.png" alt="salle principale" />
<img class="img_intro hide" onClick="next('localisation', 'choixpeau_intro');" id="localisation" src="localisation_choixpeau.png" alt="localisation choixpeau" />

<img class="img_intro hide" onClick="choixpeauClicked();" id="choixpeau_intro" src="choixpeau2.png" alt="choixpeau" />
<audio onEnded="window.audioIsBeingPlayed=false;" id="audio_poeme" src="poeme.m4a">Your browser does not support the audio element</audio>
<audio onEnded="window.location.href='index.php'" id="audio_bravo" src="bravo.m4a">Your browser does not support the audio element</audio>

</body>
</html>
