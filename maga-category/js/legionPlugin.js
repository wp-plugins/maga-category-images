function displayForm()
{
	var id = document.getElementById('catId').selectedIndex;
	var opt = document.getElementById('catId');
	var catId = opt.value;

	if(catId != 0)
	{
	document.getElementById('catValue').value = catId;
	document.getElementById('myTitle').innerHTML = "<h4>Assign Image to: "+opt.options[id].innerHTML+"</h4>";
	document.getElementById('imageForm').style.display = "block";
	}
	else
	{
		document.getElementById('myTitle').innerHTML = "";
		document.getElementById('catValue').value = "0";
		document.getElementById('imageForm').style.display = "none";
	}
}

function validate()
{
	if($("#myFile").val().length == 0)
	{
		alert("Please choose a file to upload");
		return false;
	}
	else
	{
		return true;
	}
}
