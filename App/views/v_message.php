<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $row->title ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
		<div>
		<?php foreach($data as $row) :?>
		
		<h3><?php echo $row->title ?></h3>
		<p><?php echo $row->preview ?></p>
		<p><?php echo $row->content ?></p>
		<p><?php echo $row->author ?></p>
	<?php endforeach; ?>
	<p>Комментарии</p>
	<?php foreach($comments as $row) :?>		
		<p><?php echo $row->content ?></p>
		<p><?php echo $row->name ?></p>
		<?php endforeach; ?>
	</div>
	<p>Добавить комментарий</p>
	<form action="" method="POST">
		<input type="text" name="contentCom">
		<button name="submit">Добавить комментарий</button>
	</form>
	
	<a href="/messages/">Все сообщения</a>

</body>
</html>