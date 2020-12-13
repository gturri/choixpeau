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
  document.getElementById(idNext).classList.remove('hide');
}
  </script>
</head>
<body>

<img style="cursor:pointer;" onClick="next('chateau', 'salle');" id="chateau" src="chateau.png" alt="chateau.png" />
<img class="hide" style="cursor:pointer;" onClick="next('salle', 'localisation');" id="salle" src="salle_principale.png" alt="salle principale" />
<img class="hide" style="cursor:pointer;" onClick="next('localisation', 'choixpeau');" id="localisation" src="localisation_choixpeau.png" alt="localisation choixpeau" />

<audio onEnded="window.audioIsBeingPlayed=false;" id="audio_poeme" src="poeme.m4a">Your browser does not support the audio element</audio>
<audio onEnded="window.location.href='index.php'" id="audio_bravo" src="bravo.m4a">Your browser does not support the audio element</audio>
<img class="hide" style="cursor:pointer;" onClick="choixpeauClicked();" id="choixpeau" class="col" src="choixpeau2.png" alt="choixpeau" />


