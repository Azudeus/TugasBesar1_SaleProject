function buy(element){
	var value = parseInt( element.value );
	var price = parseInt (element.getAttribute("price"));
	if( !isNaN(value) ){
		document.getElementsByClassName("total_price")[0].innerHTML = "IDR " + value * price;
	}
	else{
		document.getElementsByClassName("total_price")[0].innerHTML = "Please insert integer";
	}

}
