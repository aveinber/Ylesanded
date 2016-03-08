 
window.onload = function() {
	  var muutuja = document.getElementsByClassName('bead');
	  function muudaKohta() {
      if (this.style.cssFloat =='left')
      {
       this.style.cssFloat ='right';
      } 
      else if (this.style.cssFloat == 'right')
      {     
	   this.style.cssFloat = 'left';
      } 
	  }    
	  for(var i=0; i<muutuja.length; i++){    
      var test = muutuja[i].className;
      if (test == "bead bead2"){
      muutuja[i].style.cssFloat = 'right';
      }
      else {
      muutuja[i].style.cssFloat = 'left';
      }
      muutuja[i].onclick = muudaKohta; 
      }
      }