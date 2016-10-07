function like(element){
	var p_id = 'like_count_' + element.getAttribute("product_id");
	var product_id = element.getAttribute("product_id");
	xhttp = new XMLHttpRequest();
	
	if (element.innerHTML =='like'){
		element.innerHTML = 'unlike';
		var count = parseInt(document.getElementsByClassName(p_id)[0].innerHTML) + 1;
		document.getElementsByClassName(p_id)[0].innerHTML = count + " likes";
		xhttp.open("GET", "like.php?user_id="+aid+"&product_id="+product_id+"&operation=add",true);
		xhttp.send();
	}
	else{
		element.innerHTML = 'like';
		var count = parseInt(document.getElementsByClassName(p_id)[0].innerHTML) - 1;
		document.getElementsByClassName(p_id)[0].innerHTML = count + " likes";
		xhttp.open("GET", "like.php?user_id="+aid+"&product_id="+product_id+"&operation=min",true)
		xhttp.send();
	}
}