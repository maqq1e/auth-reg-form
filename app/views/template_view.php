<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />

	<title>Главная</title>
</head>
<body>
	<?php include 'app/views/'.$content_view; ?>


    <script src="/js/jquery3.min.js" type="text/javascript"></script>
    <script src="/js/jquery.backgroundMove.js" type="text/javascript"></script>
    <script defer src="/js/script.js" type="text/javascript"></script>
	<script defer src="/js/fontawesome.js" crossorigin="anonymous"></script>
    <script defer src="/js/index.js" type="text/javascript"></script>

    <script defer type="text/javascript">
        $('.cotn_principal').backgroundMove({
            movementStrength:'50'
        });
    </script>
</body>
</html>