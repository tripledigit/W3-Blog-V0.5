function iframe(){
	editor.document.designMode = "on";
}

function bold(){
	editor.document.execCommand("bold", false, null);
}

function italic(){
	editor.document.execCommand("italic", false, null);
}

function underline(){
	editor.document.execCommand("underline", false, null);
}

function formsubmit(){
	document.getElementById("naam");
	document.getElementById("blogtitel");
	document.getElementById("blogtekstinvoer").value = window.frames["editor"].document.body.innerHTML;
	document.getElementById("login").submit();
}

//function kommentsubmit(){
	//document.getElementsByID("komment1").submit();
  //	document.getElementById("komment*")
//}
//document.getElementById('nieuwvrijeinvoer').innerHTML = document.getElementById('vrijeinvoer').value ;
