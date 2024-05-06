<?php
$portfolioManager = new PortfolioManager();
$portfolioItems = $portfolioManager->getPortfolioItems();
foreach ($portfolioItems as $item) {
    ?>
    <table class="table table-bordered m-0">
        <tbody>
            <form method="post" action="controllers/portfolio_controller.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="itemId" value="<?php echo $item['id']; ?>">            
                <tr>
                    <th class="table-secondary" scope="row">Section Title</th>
                    <td>
                        <input class="form-control" name="sectionTitle" type="text" value="<?php echo $item['header']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Section Subheader</th>
                    <td>
                        <textarea class="form-control" name="sectionSubheader" rows="2"><?php echo $item['subheader']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Item Images</th>
                    <td>
                        <input type="file" name="itemImages[]" class="form-control" multiple>
                    </td>
                </tr>
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
    <?php
}
?>