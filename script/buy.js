
function money_f(x){
  var r = Math.floor( x / 1000 );
  var x = Math.floor( x % 1000 );

  var x_str = x.toString();
  while( x_str.length < 3 ) x_str = "0" + x_str;

  if( r == 0 )
    return "IDR " + x;
  else
    return money_f(r) + "." + x_str;
}

function writePrice(a){
	document.getElementById("price").innerHTML = money_f(a);
}
function buy(element){
	var value = parseInt( element.value );
	var price = parseInt (element.getAttribute("price"));
	if( !isNaN(value) ){
		document.getElementsByClassName("total_price")[0].innerHTML = money_f(value * price);
	}
	else{
		document.getElementsByClassName("total_price")[0].innerHTML = "Please insert integer";
	}

}
