<?php session_start(); ?>
<?php if(!isset($_SESSION['USER-NAME'])){
	header("Location:../index.php");	
}  
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Techuick Blogging System</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/index.css">
	
</head>
<body>
	
	<!-- including header -->
	<?php include("../partials/header.php"); ?>
	
	 <div class="container min-vh-100 p-5" id="wrapper">
		<div class="row justify-content-center">
			<div class="col-md-10">
				
				<div class="operations mb-3">
					<a href="createblog.php" class="btn btn-primary">Create Blog</a>
				</div>
				
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th>Thumbnail</th>
							<th>Slug</th>
							<th colspan="3">Actions</th>
						</tr>
					</thead>
					<tbody>

						<!--Fecth all logged in user blogs that are active  -->
					<?php
						include("../connection.php");
						$sql="SELECT * FROM blogs WHERE status=1 and user_id={$_SESSION['USER-ID']}";
						$res=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($res)):
					?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><img src="<?php echo $row['thumbnail']; ?>" width="100" height="100" alt="thumbnail"></td>
							<td><?php echo $row['slug']; ?></td>
							<td><a href="<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
							<td><a href="<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
							<td><a href="<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a></td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
    </div>

	
	<!-- Including footer -->
	<?php  include_once("../partials/footer.php"); ?>

	<!-- Bootstrap Jquery, popper.js and javascript -->
	<script src="/PHPBlog/assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="/PHPBlog/assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
	<script src="/PHPBlog/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
</body>

</html>