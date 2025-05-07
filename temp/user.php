<tr>
	<td><?=	$user['id']?></td>
	<td><?=$user['userLogin']?></td>
	<td><?=date("d.m.Y, H:i:s", $user['userRegDate'])?></td>
	<td><?=$user['userCity']?></td>
	<td><?=$user['userIP']?></td>
	<?echo_admin("<td>
					<center>
						<a href='/?module=editUsers&id={$user['id']}'> &#9998;</a> 
						<a href='/?module=deleteUsers&id={$user['id']}'>&#128465;</a>
					</center>
				</td>");?>
</tr>
