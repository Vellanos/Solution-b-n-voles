<?php

session_start();

$_SESSION['isAuthenticated'] = true;
$_SESSION['username'] = $authenticatedUser->getUsername();
$_SESSION['role'] = 'benevole';

header("Location: ../assets/components/pages/pagesDesInfos");

exit;

echo ("page des infos du bénévole");

$_SESSION["isAuthenticated"] = "true";
$_session["role"] = "benevole";
