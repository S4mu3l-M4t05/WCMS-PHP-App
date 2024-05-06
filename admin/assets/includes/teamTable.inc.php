<table class="table table-bordered m-0">
    <tbody>
        <?php
        $teamManager = new TeamManager();
        $teamData = $teamManager->getTeamData();
        $teamMemberData = $teamManager->getTeamMemberData();
        var_dump($teamData)
        ?>
        <form method="post" action="controllers/Team_controller.php " enctype="multipart/form-data">
            <?php foreach ($teamData as $data) : ?>
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

            <?php $i = 0; ?>
            <?php foreach ($teamMemberData as $data) : ?>
                <tr>
                    <th>
                        
                    </th>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Team Member <?php echo $i + 1; ?> Name</th>
                    <td>
                        <input type="hidden" name="teamMembers[<?php echo $i; ?>][id]" value="<?php echo $data['id']; ?>">
                        <input class="form-control" name="teamMembers[<?php echo $i; ?>][name]" type="text" value="<?php echo $data['name']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Team Member <?php echo $i + 1; ?> Title</th>
                    <td>
                        <input class="form-control" name="teamMembers[<?php echo $i; ?>][title]" type="text" value="<?php echo $data['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Team Member <?php echo $i + 1; ?> Bio</th>
                    <td>
                        <textarea class="form-control" name="teamMembers[<?php echo $i; ?>][bio]" rows="2"><?php echo $data['bio']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary" scope="row">Team Member <?php echo $i + 1; ?> Picture</th>
                    <td>
                        <input type="file" name="teamMembers[<?php echo $i; ?>][picture]" value="<?php echo $data['picture']; ?>" class="form-control">
                    </td>
                </tr>
                <?php $i++; ?>
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