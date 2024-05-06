<?php
include '../assets/includes/head.inc.php';
include '../assets/includes/func.inc.php';
$action = $_REQUEST['action'];

$servicesCardManager = new ServicesCardManager(); // Assuming you've defined this class

switch ($action) {
    case 'update':
        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $servicesCardsData = $_POST['servicesCards'];

            $updateResults = [];
            foreach ($servicesCardsData as $id => $cardData) {
                $servicesCard = new ServicesCard(
                    $cardData['icon'],
                    $cardData['title'],
                    $cardData['text'],
                    $id
                );

                $updateResult = $servicesCardManager->updateServicesCard($servicesCard);

                $updateResults[$id] = $updateResult;
            }

            // Check the update results and set session messages accordingly
            if (in_array(false, $updateResults, true)) {
                $_SESSION['msg_err'] = 'Failed to update some service cards.';
            } else {
                $_SESSION['msg_suc'] = 'Service card data updated successfully.';
            }
        }
        break;

    default:
        $_SESSION['msg_err'] = 'Invalid action.';
        break;
}

header('Location: ../tables.php');
exit();

