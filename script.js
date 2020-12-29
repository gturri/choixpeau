function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function displayBlason() {
  console.log("displaying blason");
  document.getElementById('blason').classList.remove('hide');
  await sleep(1);
  transitionBetweenImages("choixpeau", "blason");
}

async function hideBlason() {
  console.log("hiding blason");
  transitionBetweenImages("blason", "choixpeau");
  await sleep(2000);
  document.getElementById('blason').classList.add('hide');
}

function choixpeauStartsTalking() {
  document.getElementById("choixpeau").src = "choixpeau_parlant.gif";
}

function choixpeauStopsTalking() {
  document.getElementById("choixpeau").src = "choixpeau.jpg";
}

function transitionBetweenImages(idImgToHide, idImgToDisplay){
  document.getElementById(idImgToHide).classList.add('transparent');
  document.getElementById(idImgToDisplay).classList.remove('transparent');
}

window.addEventListener("keyup", function(event){
  if (event.keyCode === 71) { // "g"
    console.log("'g' has been pressed");
    document.getElementById("audio_garcon").play();
  } else if (event.keyCode === 70) { // "f"
    console.log("'f' has been pressed");
    document.getElementById("audio_fille").play();
  }
});
