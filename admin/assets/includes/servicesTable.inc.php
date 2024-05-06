<table class="table table-bordered m-0">
    <tbody>
        <?php 
        $servicesManager = new ServicesManager();
        $servicesData = $servicesManager->getServicesData();
        ?>
        <form method="post" action="controllers/services_controller.php">
            <?php foreach ($servicesData as $data) : ?>
                <input type="hidden" name="action" value="update">
                <tr>
                    <th class="table-secondary" scope="row">Section Title</th>
                    <td>
                        <input class="form-control" name="sectionTitle" type="text" value="<?php echo $data['section_title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Section Subheader</th>
                    <td>
                        <textarea class="form-control" name="sectionSubheader" rows="2"><?php echo $data['section_subheader']; ?></textarea>
                    </td>
                </tr>
            <?php endforeach; ?>
        </form>
    </tbody>
</table>

<table class="table table-hover table-bordered mt-5 m-0">
    <tbody>
        <?php 
        $servicesCardManager = new ServicesCardManager();
        $servicesCards = $servicesCardManager->getAllServicesCards();
        ?>
        <form method="post" action="controllers/servicesCard_controller.php">
            <?php foreach ($servicesCards as $data) : ?>
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="servicesCards[<?php echo $data['id']; ?>][id]" value="<?php echo $data['id']; ?>">
                <tr>
                    <th class="table-secondary" scope="row">Icon</th>
                    <td>
                        <input class="form-control" name="servicesCards[<?php echo $data['id']; ?>][icon]" type="text" value="<?php echo $data['icon']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Title</th>
                    <td>
                        <input class="form-control" name="servicesCards[<?php echo $data['id']; ?>][title]" type="text" value="<?php echo $data['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Text</th>
                    <td>
                        <textarea class="form-control" name="servicesCards[<?php echo $data['id']; ?>][text]" rows="2"><?php echo $data['text']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th class="table-secondary" scope="row">Action</th>
                <td>
                    <button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></button>
                    <?php if ($_SESSION['user_role'] == '1'): ?>
                        <button type="submit" class="btn btn-danger">Delete <i class="fa-solid fa-trash"></i></button>
                        <button type="submit" class="btn btn-success">Add <i class="fa-solid fa-plus"></i></button>
                    <?php endif; ?>
                </td>
            </tr>
        </form>
    </tbody>
</table>

