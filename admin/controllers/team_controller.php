<?php
include '../assets/includes/head.inc.php';
include '../assets/includes/func.inc.php';
$action = $_REQUEST['action'];

$teamManager = new TeamManager();

switch ($action) {
    case 'update':
        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $sectionTitle = $_POST['sectionTitle'];
            $sectionSubheader = $_POST['sectionSubheader'];

            // Create an array to hold team members' data
            $teamMembersData = $_POST['teamMembers'];
            var_dump($_POST['teamMembers']);

            $teamMembers = [];
            foreach ($teamMembersData as $i => $memberData) {
                $memberName = $memberData['name'];
                $memberTitle = $memberData['title'];
                $memberBio = $memberData['bio'];
                $memberPicture = $_FILES['teamMembers']['tmp_name'][$i]['picture'];

                $teamMember = new TeamMember([
                    'id' => $memberData['id'],
                    'name' => $memberName,
                    'title' => $memberTitle,
                    'bio' => $memberBio,
                    'picture' => $memberPicture
                ]);

                $teamMembers[] = $teamMember;
            }

            // Create a new Team object with the updated data
            $team = new Team([
                'sectionTitle' => $sectionTitle,
                'sectionSubheader' => $sectionSubheader,
                'members' => $teamMembers
            ]);

            // Update team data using the TeamManager's method
            $result = $teamManager->updateTeamData($team);

            // Update team members' data using the new method
            foreach ($teamMembers as $teamMember) {
                $updateResult = $teamManager->updateTeamMemberData($teamMember);
            }

            // Check the update results and set session messages accordingly
            if ($result) {
                $_SESSION['msg_suc'] = 'Team settings updated successfully.';
            } else {
                $_SESSION['msg_err'] = 'Failed to update Team settings.';
            }
        }
        break;

    default:
        $_SESSION['msg_err'] = 'Invalid action.';
        break;
}

header('Location: ../tables.php');
exit();
