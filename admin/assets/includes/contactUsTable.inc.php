<table class="table table-hover table-bordered m-0">
	<tbody>
		<?php 
		$contactUsManager = new ContactUsManager();
		$contactUsData = $contactUsManager->getContactUsInfo();
		?>
		<form method="post" action="controllers/contactUs_controller.php" enctype="multipart/form-data">
			<?php foreach ($contactUsData as $data) : ?>
				<input type="hidden" name="action" value="update">
				<tr>
					<th class="table-secondary" scope="row">Section Title</th>
					<td>
						<input class="form-control" name="heading" type="text" value="<?php echo $data['heading']; ?>">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Section Subheader</th>
					<td>
						<input class="form-control" name="subheading" type="text" value="<?php echo $data['subheading']; ?>">
					</td>
				</tr>
				<tr>
					<th class="table-secondary" scope="row">Google Map Embed</th>
					<td>
						<textarea class="form-control" name="map" rows="4"><?php echo $data['map']; ?></textarea>
					</td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<th class="table-secondary" scope="row">Action</th>
				<td>
					<button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></button>
				</td>
			</tr>
		</form>
	</tbody>
</table>

<table class="table table-hover table-bordered mt-5 m-0">
    <tbody>
        <?php 
        $contactCardManager = new ContactCardManager();
        $contactCards = $contactCardManager->getAllContactCards();
        ?>
        <form method="post" action="controllers/contactCard_controller.php">
            <?php foreach ($contactCards as $data) : ?>
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="contactCards[<?php echo $data['id']; ?>][id]" value="<?php echo $data['id']; ?>">
                <tr>
                    <th class="table-secondary" scope="row">Icon</th>
                    <td>
                        <input class="form-control" name="contactCards[<?php echo $data['id']; ?>][icon]" type="text" value="<?php echo $data['icon']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Title</th>
                    <td>
                        <input class="form-control" name="contactCards[<?php echo $data['id']; ?>][title]" type="text" value="<?php echo $data['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Text</th>
                    <td>
                        <textarea class="form-control" name="contactCards[<?php echo $data['id']; ?>][text]" rows="2"><?php echo $data['text']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Size</th>
                    <td>
                        <input class="form-control" name="contactCards[<?php echo $data['id']; ?>][size]" type="number" value="<?php echo $data['size']; ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th class="table-secondary" scope="row">Action</th>
                <td>
                    <button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></button>
                </td>
            </tr>
        </form>
    </tbody>
</table>


