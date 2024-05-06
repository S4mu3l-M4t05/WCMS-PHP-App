<?php
include '../assets/includes/head.inc.php';
include '../assets/includes/func.inc.php';
$action = $_REQUEST['action'];

$portfolioManager = new PortfolioManager();

switch ($action) {
    case 'update':
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $itemId = $_POST['itemId'];
        $sectionTitle = $_POST['sectionTitle'];
        $sectionSubheader = $_POST['sectionSubheader'];
        $itemImages = $_FILES['itemImages'];

        // Process uploaded images
        $imagePaths = [];
        foreach ($itemImages['tmp_name'] as $index => $tmpName) {
            $imagePath = $itemImages['name'][$index];
            if ($imagePath !== false) {
                $imagePaths[] = 'assets/img/portfolio/' . $imagePath;
            }
        }

        // Create a new Portfolio object with the updated data
        $portfolio = new Portfolio([
            'id' => $itemId,
            'sectionTitle' => $sectionTitle,
            'sectionSubheader' => $sectionSubheader,
            'img' => $imagePaths
        ]);

            // Update portfolio item data using the PortfolioManager's method
        $result = $portfolioManager->updatePortfolioItem($portfolio);

            // Check the update result and set session message accordingly
        if ($result) {
            $_SESSION['msg_suc'] = 'Portfolio item updated successfully.';
        } else {
            $_SESSION['msg_err'] = 'Failed to update portfolio item.';
        }
    }
    break;

    default:
    $_SESSION['msg_err'] = 'Invalid action.';
    break;
}

header('Location: ../tables.php');
exit();
?>
