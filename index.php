<?php

	include_once 'model/Connection.class.php';
	include_once 'model/Manager.class.php';	

	$manager = new Manager();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BackOffice - CRUD - List of Clients</title>
	<?php include_once 'view/dependencies.php'; ?>
</head>

<body>

<div class="container">
	
	<h2 class="text-center"> List of Clients <i class="fa fa-users"></i></h2>

	<h5 class="text-right">
		<a href="view/page_register.php" class="btn btn-primary btn-xs">
			<i class="fa fa-user-plus"></i>
		</a>
	</h5>

	<!-- Table -->

	<div class="table-responsive">
		
		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th class="text-uppercase font-weight-normal">id</th>
					<th class="text-uppercase font-weight-normal">name</th>
					<th class="text-uppercase font-weight-normal">email</th>
					<th class="text-uppercase font-weight-normal">tax number</th>
					<th class="text-uppercase font-weight-normal">birthday</th>
					<th class="text-uppercase font-weight-normal">address</th>
					<th class="text-uppercase font-weight-normal">phone</th>
					<th colspan="3" class="text-center text-uppercase font-weight-normal">actions</th>
				</tr>
			</thead>
			<tbody>

<?php foreach($manager->listClient("entries") as $client): ?>
				
				<tr>
					<td><?php echo $client['id']; ?></td>
					<td><?php echo $client['name']; ?></td>
					<td><?php echo $client['email']; ?></td>
					<td><?php echo $client['taxNumber']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($client['birth'])); ?></td>
					<td><?php echo $client['address']; ?></td>
					<td><?php echo $client['phone']; ?></td>
					<td>
						<form method="POST" action="view/page_update.php">
							<!-- input to save id-client -->
							<input type="hidden" name="id" value="<?=$client['id']?>">

							<button class="btn btn-outline-warning">
								<i class="fa fa-user-edit"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="controller/delete_client.php" onclick="return confirm('Are you sure you want to delete?');">
							<!-- input to save id-client -->
							<input type="hidden" name="id" value="<?=$client['id']?>">

							<button class="btn btn-outline-danger">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>

<?php endforeach; ?>

			</tbody>
		</table>

	</div>

	<!-- Table -->

</div>

</body>
</html>