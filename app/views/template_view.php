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
    <header class="header">
        <form class="leng">
            <div class="item ru"><input class="hidden" type="checkbox">RU</div>
            <div class="item en"><input class="hidden" type="checkbox">EN</div>
        </form>
    </header>
	<div class="content_wrap">
        <?php include 'app/views/'.$content_view; ?>
    </div>


    <script src="/js/jquery3.min.js" type="text/javascript"></script>
    <script defer src="/js/script.js" type="text/javascript"></script>
	<script defer src="/js/fontawesome.js" crossorigin="anonymous"></script>
    <script defer src="/js/index.js" type="text/javascript"></script>
</body>
</html>