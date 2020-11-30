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
  </script>
</head>
<body>


<audio onEnded="window.audioIsBeingPlayed=false;" id="audio_poeme" src="poeme.m4a">Your browser does not support the audio element</audio>
<audio onEnded="window.location.href='index.php'" id="audio_bravo" src="bravo.m4a">Your browser does not support the audio element</audio>
<img style="cursor:pointer;" onClick="choixpeauClicked();" id="choixpeau" class="col" src="choixpeau.jpg" alt="choixpeau" />


