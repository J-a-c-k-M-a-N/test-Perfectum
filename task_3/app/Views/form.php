<?php

/**@param $comments \App\Controllers\Home*/
/**@param $pager \App\Controllers\Home*/

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Comment Form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>


<!---------------------	Form Block START	--------------------------->
<div style="border: 1px solid black;">
	<div id="add_comment" style="margin: 5px 0 20px 0; padding: 5px 0 20px 10px;">
		<h1 class="comment_title" name='title_add'>Create a comment!</h1>
		<form method="post" id="form_add">

			<input type="text" name="name" id="name" placeholder="Name/Nickname">
			<input type="email" name="email" id="email" placeholder="E-mail" required>
			<br>
			<br>
			<textarea name="comment" id="comment" rows="8" cols="45" placeholder="Enter your comment..." style="display: block;" required></textarea> <br>

			<input type="button" name="send" id="send" value="Send"  style="cursor:pointer;">

			<input type="button" name="cancel" id="cancel_load" value="Cansel"  style="display:none; cursor:pointer;">
			<br>
			<br><br>
			<div id="errorMess"></div>
		</form>
	</div>
</div>
<!---------------------	Form Block END	--------------------------->


<!---------------------	Comments Block START	--------------------------->

<h1>Comments</h1>

<div id="comment_all">
	<ul>
		<?php if (count($comments) === 0) : ?>

		<p>Add comment<p>

			<?php else: ?>
			<?php foreach ($comments as $comment): ?>

			<div style="border: 1px solid blue; margin: 5px 0 20px 0; padding: 5px 0 20px 5px;">
				<div>
		<h3><?php echo $comment["name"]?></h3>
</div>
<div>
	<p><?php echo $comment["comment"]?></p>
</div>
<div>
	<p><strong><?php echo $comment["created_at"]?></strong></p>
</div>
</div>

<?php endforeach; ?>
<?php endif; ?>

</ul>
</div>
<!---------------------	Comments Block END	--------------------------->

<!---------------------	Paginator  START	--------------------------->
<?= $pager->links('default', 'default_my') ?>
<!---------------------	Paginator END	--------------------------->

<script src="<?php echo base_url();?>/js/form.js" charset="utf-8"></script>
</body>
</html>
