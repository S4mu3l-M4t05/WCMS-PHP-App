<?php
include '../assets/includes/head.inc.php';
include '../assets/includes/func.inc.php';
$action = $_REQUEST['action'];

$homeManager = new HomeManager();

switch ($action) {
    case 'update':
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $heading = $_POST['heading'];
        $subheading = $_POST['subheading'];
        $btnText = $_POST['btnText'];
        $btnLink = $_POST['btnLink'];
        $video = $_POST['video'];
        $videoText = $_POST['videoText'];
        $bgdImage = handleImageUpload($_FILES['bgd_image'], 'background');
        $footer = $_POST['footer'];


        $homePageData = $homeManager->getHomeDataById(1);

        $homePage = new Home([
            'heading' => $homePageData->getHeading(),
            'subheading' => $homePageData->getSubheading(),
            'btnText' => $homePageData->getBtnText(),
            'btnLink' => $homePageData->getBtnLink(),
            'video' => $homePageData->getVideo(),
            'videoText' => $homePageData->getVideoText(),
            'footer' => $homePageData->getFooter()
        ]);

        // Update the Home object with new settings
        $homePage->setHeading($heading);
        $homePage->setSubheading($subheading);
        $homePage->setBtnText($btnText);
        $homePage->setBtnLink($btnLink);
        $homePage->setVideo($video);
        $homePage->setVideoText($videoText);
        $homePage->setBgdImage($bgdImage);
        $homePage->setFooter($footer);


        // Call the updateSettings function from HomeManager using the Home object
        $result = $homeManager->updateSettings($homePage);

            // Check the update result and set session messages accordingly
        if ($result) {
            $_SESSION['msg_suc'] = 'Settings updated successfully.';
        } else {
            $_SESSION['msg_err'] = 'Failed to update settings.';
        }
    }
    break;

    default:
    $_SESSION['msg_err'] = 'Invalid action.';
    break;
}

header('Location: ../tables.php');
exit();