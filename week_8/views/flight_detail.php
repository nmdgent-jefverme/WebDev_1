<tr>
	<td><?php echo $flight['order_id'] ?></td>
    <td><?php echo $flight['firstname'] ?></td>
    <td><?php echo $flight['lastname'] ?></td>
	<td><?php echo $flight['seat'] ?></td>
	<td><?php echo $flight['ticket_price'] ?></td>
	<td><a href="delete_order.php?order_id=<?php echo $flight['order_detail_id']?>&flight_id=<?php echo $id ?>"class="delete"><i class="far fa-trash-alt"></i></a></td>
</tr>