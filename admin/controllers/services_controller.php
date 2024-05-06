<?php
include '../assets/includes/head.inc.php';
$action = $_REQUEST['action'];

$servicesManager = new ServicesManager();

switch ($action) {
    case 'update':
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $sectionTitle = $_POST['sectionTitle'];
        $sectionSubheader = $_POST['sectionSubheader'];

        $cardTitles = [];
        $cardTexts = [];
        for ($i = 1; $i <= 6; $i++) {
            $cardTitles[$i] = $_POST['cardTitle' . $i];
            $cardTexts[$i] = $_POST['cardText' . $i];
        }

        $servicesData = $servicesManager->getServicesDataById(1);

        $services = new Services([
            'sectionTitle' => $servicesData->getSectionTitle(),
            'sectionSubheader' => $servicesData->getSectionSubheader(),
            'cardTitles' => $servicesData->getCardTitles(),
            'cardTexts' => $servicesData->getCardTexts()
        ]);

            // Update the Services object with new settings
        $services->setSectionTitle($sectionTitle);
        $services->setSectionSubheader($sectionSubheader);

        for ($i = 1; $i <= 6; $i++) {
            $services->setCardTitle($i, $cardTitles[$i]);
            $services->setCardText($i, $cardTexts[$i]);
        }

            // Call the updateAboutData function from servicesManager using the Services object
        $result = $servicesManager->updateServicesData($services);

            // Check the update result and set session messages accordingly
        if ($result) {
            $_SESSION['msg_suc'] = 'Services settings updated successfully.';
        } else {
            $_SESSION['msg_err'] = 'Failed to update Services settings.';
        }
    }
    break;

    default:
    $_SESSION['msg_err'] = 'Invalid action.';
    break;
}

header('Location: ../tables.php');
exit();
