<?php
// filepath: c:\xampp\htdocs\google-oauth-project\login.php

session_start();

// Include configuration file
require_once 'config.php';

// Buat URL OAuth Google
$googleOAuthUrl = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query([
    'client_id' => GOOGLE_CLIENT_ID,
    'redirect_uri' => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'scope' => 'email profile',
    'access_type' => 'offline',
]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Google OAuth</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login dengan Google</h2>
    <a href="<?php echo htmlspecialchars($googleOAuthUrl); ?>">
        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" alt="Login with Google"/>
    </a>
</body>
</html>