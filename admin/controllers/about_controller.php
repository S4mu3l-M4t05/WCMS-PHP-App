<?php
include '../assets/includes/head.inc.php';
$action = $_REQUEST['action'];

$aboutManager = new AboutManager();

switch ($action) {
    case 'update':
        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $sectionTitle = $_POST['sectionTitle'];
            $sectionSubheader = $_POST['sectionSubheader'];
            $articleHeader = $_POST['articleHeader'];
            $articleSubheader = $_POST['articleSubheader'];
            $paragraph = $_POST['paragraph'];
            $listItem1Title = $_POST['listItem1Title'];
            $listItem1Text = $_POST['listItem1Text'];
            $listItem2Title = $_POST['listItem2Title'];
            $listItem2Text = $_POST['listItem2Text'];

            $aboutData = $aboutManager->getAboutDataById(1);

            $about = new About([
                'sectionTitle' => $aboutData->getSectionTitle(),
                'sectionSubheader' => $aboutData->getSectionSubheader(),
                'articleHeader' => $aboutData->getArticleHeader(),
                'articleSubheader' => $aboutData->getArticleSubheader(),
                'paragraph' => $aboutData->getParagraph(),
                'listItem1Title' => $aboutData->getListItem1Title(),
                'listItem1Text' => $aboutData->getListItem1Text(),
                'listItem2Title' => $aboutData->getListItem2Title(),
                'listItem2Text' => $aboutData->getListItem2Text()
            ]);

            // Update the About object with new settings
            $about->setSectionTitle($sectionTitle);
            $about->setSectionSubheader($sectionSubheader);
            $about->setArticleHeader($articleHeader);
            $about->setArticleSubheader($articleSubheader);
            $about->setParagraph($paragraph);
            $about->setListItem1Title($listItem1Title);
            $about->setListItem1Text($listItem1Text);
            $about->setListItem2Title($listItem2Title);
            $about->setListItem2Text($listItem2Text);

            // Call the updateSettings function from aboutManager using the About object
            $result = $aboutManager->updateAboutData($about);

            // Check the update result and set session messages accordingly
            if ($result) {
                $_SESSION['msg_suc'] = 'About settings updated successfully.';
            } else {
                $_SESSION['msg_err'] = 'Failed to update About settings.';
            }
        }
        break;

    default:
        $_SESSION['msg_err'] = 'Invalid action.';
        break;
}

header('Location: ../tables.php');
exit();
