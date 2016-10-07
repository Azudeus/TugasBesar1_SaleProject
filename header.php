<body>
<h1 id = "title"><span id="sale">Sale</span><span id="project">Project</span></h1>

<h2 id = "hellouser">Hi, <?php echo $account_username; ?> !</h2>
<h2 id = "logout"><a href = "login.php" class = "redlink">logout</a></h3><br>
	
<table id = "catalog">
	<tr>
		<td class = "<?php if($tab == "catalog") echo 'blue'; else echo 'nobg'; ?>">
			<a href=catalog.php?account_id=<?php echo $account_id?> <?php if($tab == "catalog") echo 'class = whitelink';?>>catalog</a></td>
		<td class = "<?php if($tab == "your_product") echo 'blue'; else echo 'nobg'; ?>">
			<a href="yourproduct.php?account_id=<?php echo $account_id?> " <?php if($tab == "your_product") echo 'class = whitelink';?> >your product</a></td>
		<td class = "<?php if($tab == "add_product") echo 'blue'; else echo 'nobg'; ?>">
			<a href="addproduct.php?account_id=<?php echo $account_id?>" <?php if($tab == "add_product") echo 'class = whitelink';?>>add product</a></td>
		<td class = "<?php if($tab == "sales") echo 'blue'; else echo 'nobg'; ?>">
			<a href="sales.php?account_id=<?php echo $account_id?>" <?php if($tab == "sales") echo 'class = whitelink';?>>sales</a></td>
		<td class = "<?php if($tab == "purchases") echo 'blue'; else echo 'nobg'; ?>">
			<a href="purchases.php?account_id=<?php echo $account_id?>" <?php if($tab == "purchases") echo 'class = whitelink';?>>purchases</a></td>
	</tr>				
</table>
