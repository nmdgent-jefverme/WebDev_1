<div class="message">
<div class="content">
	<h2><?php echo $message['fName'] . ' ' . $message['lName'] . ' ' . $message['message_id']; ?></php></h2>
	<p><?php echo $message['content'];?></p>
</div>
<div class="tags">
	<?php
	foreach ($tags as $tag) {
		if($tag['message_id'] == $message['message_id']){
		?>
			<p class="tag"><?php echo $tag['name']; ?></p>
		<?php
		}
	}
	?>
</div>
</div>