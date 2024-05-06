<?php
include '../assets/includes/head.inc.php';
$action = $_REQUEST['action'];

$userManager = new UserManager();

switch ($action) {
    case 'register':
    $allowedFileTypes = array('jpg', 'jpeg', 'png');
    $maxFileSize = 200 * 1024;
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $user_role = $_POST['user_role'];
        $confirmPassword = $_POST['cpassword'];

        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($firstname) || empty($lastname) || empty($user_role)) {
            $_SESSION['msg_err'] = "All fields are required";
            header('Location: ../register.php');
            exit();
        } elseif (strlen($username) < 8 || strlen($username) > 16) {
            $_SESSION['msg_err'] = "Username must have between 8 and 16 characters";
            header('Location: ../register.php');
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['msg_err'] = "Invalid email format";
            header('Location: ../register.php');
            exit();
        } elseif (strlen($password) < 8) {
            $_SESSION['msg_err'] = "Password must have at least 8 characters";
            header('Location: ../register.php');
            exit();
        } elseif ($password !== $confirmPassword) {
            $_SESSION['msg_err'] = "Confirmation password does not match";
            header('Location: ../register.php');
            exit();
        }
    }

        // Check if the username or email already exists in the database
    if (!$userManager->verifyExistence('username', $username) && !$userManager->verifyExistence('email', $email)) {
        // Create a new user and add it to the database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'password' => $hashedPassword,
            'email' => $email,
            'active' => 0,
            'level' => $user_role
        ]);

            // Send account validation email
        $subject = 'Account Validation Request';
        $msg_body = "Thank you for registering an account with us. Before you can start using your account, we need to verify your email address.\r\n\r\n";
        $msg_body .= "Please complete the account validation process by clicking the link below:\r\n";

        $userManager->addUser($user);
        $userManager->sendEmail($email, $subject, $msg_body);

        $_SESSION['msg_suc'] = 'Account created successfully.';
        header('Location: ../register.php');
        exit();
    } else {
        $_SESSION['msg_err'] = 'Username or email already exists.';
        header('Location: ../register.php');
        exit();
    }
    break;

    case 'signin':
    $username = $_POST['username'];
    $providedPassword = $_POST['password'];

    // Retrieve hashed password from the database based on the provided username
    $user = $userManager->getUserByUsername($username);
    
    if ($user && password_verify($providedPassword, $user['password'])) {
        // Login successful, store user information in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_role'] = $user['level'];
        $_SESSION['msg_suc'] = 'Login successful.';
        $_SESSION['logged_in'] = true;
        header('Location: ../index.php');
        exit();
    } else {
        $_SESSION['msg_err'] = 'Invalid username or password.';
        header('Location: ../index.php');
        exit();
    }
    break;


    case 'logout':
    $_SESSION['msg_suc'] = 'Logged out successfully.';
    session_unset();
    session_destroy();
    break;

    case 'sendPost':
    if (isset($_SESSION['username'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $username = $_SESSION['username'];
        $avatar = $_SESSION['avatar'];

        $user = $userManager->getUserByUsername($username);
        if (empty($title) || empty($content)) {
            $_SESSION['msg_err'] = "All fields are required";
            header('Location: ../post.php');
            exit();
        }

        if ($user) {
            // Create a new Post instance
            $post = new Post($title, date('Y-m-d H:i:s'), $username, $avatar, $content);


            $userManager->sendPost($username, $title, $content, $avatar);
            $userManager->updatePostNumber($username);

            $_SESSION['msg_suc'] = 'Post sent successfully.';
        } else {
            $_SESSION['msg_err'] = 'User not found. Please log in again.';
        }
    } else {
        $_SESSION['msg_err'] = 'Please log in to send a post.';
    }
    break;

    case 'update':
    if (isset($_POST['updateAccount'])) {
        $username = $_SESSION['username'];
        $newFirstname = $_POST['newFirstname'];
        $newLastname = $_POST['newLastname'];
        $newAge = $_POST['newAge'];
        $newGender = $_POST['newGender'];
        $newUsername = $_POST['newUsername'];
        $newEmail = $_POST['newEmail'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!isset($_SESSION['username'])) {
            $_SESSION['msg_err'] = 'Please log in to send a post.';
            header('Location: ../profile.php');
            exit();
        }elseif (empty($newUsername) || empty($newEmail) || empty($newPassword) || empty($confirmPassword) || empty($newGender)) {
            $_SESSION['msg_err'] = "All fields are required";
            header('Location: ../profile.php');
            exit();
        } elseif (strlen($newUsername) < 8 || strlen($newUsername) > 16) {
            $_SESSION['msg_err'] = "Username must have between 8 and 16 characters";
            header('Location: ../profile.php');
            exit();
        } elseif (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['msg_err'] = "Invalid email format";
            header('Location: ../profile.php');
            exit();
        } elseif (strlen($newPassword) < 8) {
            $_SESSION['msg_err'] = "Password must have at least 8 characters";
            header('Location: ../profile.php');
            exit();
        } elseif ($newPassword !== $confirmPassword) {
            $_SESSION['msg_err'] = "Confirmation password does not match";
            header('Location: ../profile.php');
            exit();
        } elseif (!is_numeric($age) || $age > 18 || $age < 100) {
            $_SESSION['msg_err'] = "Age must be a valid number between 18 and 100";
            header('Location: ../home.php');
            exit();
        }else{
            if (!$userManager->verifyExistence('newUsername', $username) && !$userManager->verifyExistence('newEmail', $email)) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $newData = array(
                    'newUsername' => $_POST['newUsername'],
                    'newEmail' => $_POST['newEmail'],
                    'newAvatar' => $_POST['newAvatar'],
                    'newGender' => $_POST['newGender'],
                    'newAge' => $_POST['newAge'],
                    'newFirstname' => $_POST['newFirstname'],
                    'newLastname' => $_POST['newLastname'],
                    'newLevel' => 2
                );
                $userManager->updateUser($username, $newData);
                $_SESSION['msg_suc'] = 'Logged out successfully.';
                session_unset();
                session_destroy();  
            }else{
                $_SESSION['msg_err'] = "username or email already exists";
            }
        }

    }
    break;

    case 'validate':
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $user = $userManager->getUserByEmail($email);


        if ($user->getStatus() == 0) {
            $userManager->activateUser($user->getUsername());
            $_SESSION['msg_suc'] = 'Account validated successfully. You can now log in.';
        } else {
            $_SESSION['msg_err'] = 'Invalid email or account already validated.';
        }
    } else {
        $_SESSION['msg_err'] = 'Invalid validation link.';
    }
    break;

    default:
    $_SESSION['msg_err'] = 'Invalid action.';
    break;
}

// Redirect back to the main page
header('Location: ../index.php');
exit();