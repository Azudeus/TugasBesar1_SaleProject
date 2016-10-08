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

function like(element){
	var p_id = 'like_count_' + element.getAttribute("product_id");
	var product_id = element.getAttribute("product_id");
	var account_id = element.getAttribute("account_id");
	xhttp = new XMLHttpRequest();
	
	if (element.innerHTML =='like'){
		element.innerHTML = 'unlike';
		var count = parseInt(document.getElementsByClassName(p_id)[0].innerHTML) + 1;
		document.getElementsByClassName(p_id)[0].innerHTML = count + " likes";
		xhttp.open("GET", "like.php?account_id="+account_id+"&product_id="+product_id+"&operation=add",true);
		xhttp.send();
	}
	else{
		element.innerHTML = 'like';
		var count = parseInt(document.getElementsByClassName(p_id)[0].innerHTML) - 1;
		document.getElementsByClassName(p_id)[0].innerHTML = count + " likes";
		xhttp.open("GET", "like.php?account_id="+account_id+"&product_id="+product_id+"&operation=min",true)
		xhttp.send();	
	}
}

function update(a,b){
	var pid = 'like_'+ a;
	if(b==0){
		document.getElementById(pid).innerHTML = "like";
	}
	else{
	if(b==1)
		document.getElementById(pid).innerHTML = "unlike";	
	}
		
}