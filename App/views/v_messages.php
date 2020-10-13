<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Все сообщения</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<h1>Все сообщения</h1>
	<div>
		<?php foreach($messages as $row) :?>
		
		<h3><a href="/message/<?php echo $row->id ?>"><?php echo $row->title ?></a></h3>
		<p><?php echo $row->preview ?></p>
		
		<p><?php echo $row->author ?></p>
	<?php endforeach; ?>

	<a href="/">Главная</a>
	<a href="/message/add">Добавить сообщение</a>
	</div>
</body>
</html>