<table class="table table-hover table-bordered table-sm m-0">
	<?php 
	$homeManager = new HomeManager();
	$homeData = $homeManager->getHomeData();
	?>
	<form method="post" action="controllers/home_controller.php" enctype="multipart/form-data">
		<tbody class="">
			<?php foreach ($homeData as $data) : ?>
				<input type="hidden" name="action" value="update">
				<tr>
					<th class="table-secondary" scope="row">Heading</th>
					<td>
						<input class="form-control" name="heading" type="text" value="<?php echo $data['heading']; ?>">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Subheading</th>
					<td>
						<textarea class="form-control" name="subheading" rows="3"><?php echo $data['subheading']; ?></textarea>
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Background Image</th>
					<td>
						<input type="file" class="form-control" name="bgd_image">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Button Text</th>
					<td>
						<input class="form-control" name="btnText" type="text" value="<?php echo $data['btnText']; ?>">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Button Link</th>
					<td>
						<input class="form-control" name="btnLink" type="text" value="<?php echo $data['btnLink']; ?>">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Video</th>
					<td>
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1">link</span>
							<input type="text" class="form-control" name="video" placeholder="Url" value="<?php echo $data['video']; ?>">
						</div>
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Video Text</th>
					<td>
						<input class="form-control" name="videoText" type="text" value="<?php echo $data['videoText']; ?>">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Footer</th>
					<td>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">&copy;</span>
							<input type="text" class="form-control" name="footer" placeholder="copyright" aria-label="copyright" aria-describedby="basic-addon1" value="<?php echo $data['footer']; ?>">
						</div>
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Action</th>
					<td>
						<button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></button>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</form>
</table>
