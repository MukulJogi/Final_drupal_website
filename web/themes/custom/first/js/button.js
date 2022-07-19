var avai= document.getElementsByClassName("pavail")[0].innerHTML;
console.log(avai.length);
if(avai.length==2){
      buyNow.setAttribute('disabled', 'disabled');
      console.log("working");
}