function change()
{
	var elem = document.getElementById("myButton1");
    if (elem.value=="Edit") elem.value = "Save";
    else elem.value = "Edit";

    document.getElementById("myButton1").style.color = "#ff6666"; // color
    document.getElementById("myButton1").style.backgroundColor = "#f4f4f4"; // backcolor
    document.getElementById("myButton1").style.boxShadow = "0 2px 10px #ff6666";
    
    
}


