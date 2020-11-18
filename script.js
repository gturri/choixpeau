var currentDisplayedId = 1;
var maxId = 4;

function displayNextId(){
  if (currentDisplayedId < maxId) {
    document.getElementById('talk_' + window.currentDisplayedId).classList.add('hide');
    window.currentDisplayedId = window.currentDisplayedId + 1;
    document.getElementById('talk_' + window.currentDisplayedId).classList.remove('hide');
  }
}

window.addEventListener("keyup", function(event){
  if (event.keyCode === 13) {
    displayNextId();
  }
});
