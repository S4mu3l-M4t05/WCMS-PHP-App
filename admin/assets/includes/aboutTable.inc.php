<table class="table table-hover table-bordered m-0">
    <tbody>
        <?php 
        $aboutManager = new AboutManager();
        $aboutData = $aboutManager->getAboutData();
        ?>
        <form method="post" action="controllers/about_controller.php" enctype="multipart/form-data">
            <?php foreach ($aboutData as $data) : ?>
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
                <tr>
                    <th class="table-secondary" scope="row">Article Header</th>
                    <td>
                        <input class="form-control" name="articleHeader" type="text" value="<?php echo $data['article_header']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Article Subheader</th>
                    <td>
                        <input class="form-control" name="articleSubheader" type="text" value="<?php echo $data['article_subheader']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Paragraph</th>
                    <td>
                        <textarea class="form-control" name="paragraph" rows="3"><?php echo $data['paragraph']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">List Item 1 Title</th>
                    <td>
                        <input class="form-control" name="listItem1Title" type="text" value="<?php echo $data['listitem1_title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">List Item 1 Text</th>
                    <td>
                        <textarea class="form-control" name="listItem1Text" rows="2"><?php echo $data['listitem1_text']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">List Item 2 Title</th>
                    <td>
                        <input class="form-control" name="listItem2Title" type="text" value="<?php echo $data['listitem2_title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">List Item 2 Text</th>
                    <td>
                        <textarea class="form-control" name="listItem2Text" rows="2"><?php echo $data['listitem2_text']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Action</th>
                    <td>
                        <button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </form>
    </tbody>
</table>
