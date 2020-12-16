var currentDisplayedId = 1;
var maxId = 4;
var blasonId = 3;

function displayNextId(){
  if (currentDisplayedId < maxId) {
    if (window.currentDisplayedId === blasonId) {
      console.log("hiding blason");
      transitionBetweenImages("blason", "choixpeau");
    }
    document.getElementById('talk_' + window.currentDisplayedId).classList.add('hide');
    window.currentDisplayedId = window.currentDisplayedId + 1;
    document.getElementById('talk_' + window.currentDisplayedId).classList.remove('hide');

    if (window.currentDisplayedId === blasonId) {
      console.log("displaying blason");
      transitionBetweenImages("choixpeau", "blason");
    }
  }
}

function transitionBetweenImages(idImgToHide, idImgToDisplay){
  document.getElementById(idImgToHide).classList.add('hide');
  document.getElementById(idImgToDisplay).classList.remove('hide');
}

window.addEventListener("keyup", function(event){
  if (event.keyCode === 13) {
    displayNextId();
  }
});
