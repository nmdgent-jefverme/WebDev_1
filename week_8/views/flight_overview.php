<tr>
	<td><a href="detail.php?id=<?php echo $flight['id'] ?>"><?php echo $flight['id'] ?></td>
    <td><?php echo $flight['date'] ?></td>
    <td><?php echo $flight['departure_city'] ?></td>
	<td><?php echo $flight['arival_city'] ?></td>
	<td><a href="edit.php?id=<?php echo $flight['id'] ?>"><i class="far fa-edit"></i></a></td>
	<td><a href="delete.php?id=<?php echo $flight['id'] ?>"class="delete"><i class="far fa-trash-alt"></i></a></td>
</tr>