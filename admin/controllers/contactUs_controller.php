<?php
include '../assets/includes/head.inc.php';
include '../assets/includes/func.inc.php';
$action = $_REQUEST['action'];

$contactUsManager = new ContactUsManager();

switch ($action) {
    case 'update':
        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $id = $_POST['id'];
            $header = $_POST['heading'];
            $subheader = $_POST['subheading'];
            $map = $_POST['map'];

            // Create a new ContactUs object with the updated data
            $contactUs = new ContactUs([
                'id' => $id,
                'header' => $header,
                'subheader' => $subheader,
                'map' => $map
            ]);

            // Update contact us information using the ContactUsManager's method
            $result = $contactUsManager->updateContactUsInfo($contactUs);

            // Check the update result and set session message accordingly
            if ($result) {
                $_SESSION['msg_suc'] = 'Contact us information updated successfully.';
            } else {
                $_SESSION['msg_err'] = 'Failed to update contact us information.';
            }
        }
        break;

    default:
        $_SESSION['msg_err'] = 'Invalid action.';
        break;
}

header('Location: ../tables.php');
exit();

