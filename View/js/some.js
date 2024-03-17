const userDiv = document.getElementById('newUser');
const ent = document.getElementById('centro');
var int = 0;
function some(){
     if(int == 1){
          userDiv.classList.remove('some');
          userDiv.classList.add('aparece');
          int = 0;
     }else{
          userDiv.classList.remove('aparece');
          userDiv.classList.add('some');
          int = 1;
     }

}