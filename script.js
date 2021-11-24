function hamburger(){
	const hamburger = document.getElementById('hamburger');
	const menu = document.getElementById('menu');

	hamburger.addEventListener('click', () => {
		hamburger.classList.toggle('show');
		menu.classList.toggle('show');
	});
}

function myFunction(){
	var x = document.getElementById("txt-password");
	if (x.type === "password"){
		x.type = "text";
		document.getElementById('hide').style.display = "inline-block";
		document.getElementById('show').style.display = "none";
	} else {
		x.type = "password";
		document.getElementById('hide').style.display = "none";
		document.getElementById('show').style.display = "inline-block";
	}
}

function myFunction2(){

  var x = document.getElementById("txt-c-password");
  if (x.type === "password"){
    x.type = "text";
	  document.getElementById('hide2').style.display = "inline-block";
	  document.getElementById('show2').style.display = "none";
  } else {
  	x.type = "password";
  	document.getElementById('hide2').style.display = "none";
   	document.getElementById('show2').style.display = "inline-block";
  } 
}

function optionSelect(){
	const selected = document.querySelector(".selected");
	const optionsContainer = document.querySelector(".options-container");

	const optionsList = document.querySelectorAll(".option");

	selected.addEventListener("click", () => {
	  optionsContainer.classList.toggle("active");
	});

	optionsList.forEach(o => {
	  o.addEventListener("click", () => {
	    selected.innerHTML = o.querySelector("label").innerHTML;
	    optionsContainer.classList.remove("active");
	  });
	});

}
