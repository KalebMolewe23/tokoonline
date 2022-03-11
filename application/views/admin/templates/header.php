<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <link rel="icon" href="<?= base_url("assets/admin/logo/logoig.jpg"); ?>">
    <title><?= $title; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
            position: relative;
            padding-bottom: 345px;
            min-height: 100vh;
        }

        header {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 50px;
        }

        header h1 {
            font-size: 48px;
            margin-bottom: 30px;
        }

        header p {
            font-size: 22px;
        }

        main {
            width: 90vw;
            margin: 0 auto;
            padding: 30px 20px;
            /* min-height: calc(100vh - 100px - 345px); */
        }
    </style>

</head>

<body>