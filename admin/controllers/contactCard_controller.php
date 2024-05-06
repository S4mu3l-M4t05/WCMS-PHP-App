<?php
include '../assets/includes/head.inc.php';
include '../assets/includes/func.inc.php';
$action = $_REQUEST['action'];

$contactCardManager = new ContactCardManager();

switch ($action) {
    case 'update':
        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $contactCardsData = $_POST['contactCards'];

            $updateResults = [];
            foreach ($contactCardsData as $id => $cardData) {
                // Provide the required arguments for the ContactCard constructor
                $contactCard = new ContactCard(
                    $cardData['icon'],
                    $cardData['title'],
                    $cardData['text'],
                    $cardData['size'],
                    $id
                );

                $updateResult = $contactCardManager->updateContactCard($contactCard);

                if ($updateResult) {
                    $updateResults[$id] = true;
                } else {
                    $updateResults[$id] = false;
                }
            }

            // Check the update results and set session messages accordingly
            if (in_array(false, $updateResults, true)) {
                $_SESSION['msg_err'] = 'Failed to update some contact cards.';
            } else {
                $_SESSION['msg_suc'] = 'Contact card data updated successfully.';
            }
        }
        break;

    default:
        $_SESSION['msg_err'] = 'Invalid action.';
        break;
}

header('Location: ../tables.php');
exit();
