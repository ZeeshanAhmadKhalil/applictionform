<!DOCTYPE html>
<html>

<head>
    <title><?= isset($pageTitle) ? $pageTitle : "Sign in" ?></title>
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    } ?>
</head>

<body id="page-top">