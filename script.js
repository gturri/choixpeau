var currentDisplayedId = 1;
var maxId = 4;
var blasonId = 3;

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function displayNextId(){
  if (currentDisplayedId < maxId) {
    if (window.currentDisplayedId === blasonId) {
      console.log("hiding blason");
      transitionBetweenImages("blason", "choixpeau");
      await sleep(2000);
      document.getElementById('blason').classList.add('hide');
    }
    document.getElementById('talk_' + window.currentDisplayedId).classList.add('hide');
    window.currentDisplayedId = window.currentDisplayedId + 1;
    document.getElementById('talk_' + window.currentDisplayedId).classList.remove('hide');

    if (window.currentDisplayedId === blasonId) {
      console.log("displaying blason");
      document.getElementById('blason').classList.remove('hide');
      await sleep(1);
      transitionBetweenImages("choixpeau", "blason");
    }
  }
}

function transitionBetweenImages(idImgToHide, idImgToDisplay){
  document.getElementById(idImgToHide).classList.add('transparent');
  document.getElementById(idImgToDisplay).classList.remove('transparent');
}

window.addEventListener("keyup", function(event){
  if (event.keyCode === 13) {
    displayNextId();
  }
});
