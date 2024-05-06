<?php
function handleImageUpload($fileData, $type) {

    $uploadDir = '../../../../assets/upload/';

    // Create the upload directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $targetFile = $uploadDir . basename($fileData['name']);

    // Validate file type and size based on image type
    if ($type === 'logo') {
        $fileInfo = pathinfo($targetFile);
        $extension = strtolower($fileInfo['extension']);
        if (!in_array($extension, ['png'])) {
            $_SESSION['msg_err'] = 'Invalid file type. Only PNG files are allowed.';
            header('Location: ../tables.php');
            exit;
        }
        if ($fileData['size'] > 200 * 1024) { // Max size: 200 KB
            $_SESSION['msg_err'] = 'File size exceeds the maximum limit of 200KB.';
            header('Location: ../tables.php');
            exit;
        }
    } elseif ($type === 'background') {
        $fileInfo = pathinfo($targetFile);
        $extension = strtolower($fileInfo['extension']);
        if (!in_array($extension, ['jpeg', 'jpg'])) {
            $_SESSION['msg_err'] = 'Invalid file type. Only JPG, JPEG, files are allowed.';
            header('Location: ../tables.php');
            exit;
        }
        // You can set your own max size for background images
        if ($fileData['size'] > 2 * 1024 * 1024) { // Max size: 2 MB
            $_SESSION['msg_err'] = 'File size exceeds the maximum limit of 2MB.';
            header('Location: ../tables.php');
            exit;
        }
    }

    $uploadSuccess = move_uploaded_file($fileData['tmp_name'], $targetFile);

    if ($uploadSuccess) {
        $targetFile = substr($targetFile, 12);
        $_SESSION['msg_suc'] = 'File uploaded successfully.';
        return $targetFile;
    } else {
        $_SESSION['msg_err'] = 'Failed to move the uploaded file. Error: ' . $fileData['error'];
        header('Location: ../tables.php');
        exit;
    }
}
?>
