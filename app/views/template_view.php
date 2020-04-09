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
            <span class="dropdown-el">
                <input type="radio" name="sortType" value="Relevance" checked="checked" id="sort-relevance"><label for="sort-relevance">EN</label>
                <input type="radio" name="sortType" value="Popularity" id="sort-best"><label for="sort-best">RU</label>
            </span>
        </form>
        <div class="logout_wrap">
            <button id="logout">Logout</button>
            <div class="output"></div>
        </div>
    </header>
    <?php include 'app/views/'.$content_view; ?>


    <script src="/js/jquery3.min.js" type="text/javascript"></script>
    <script defer src="/js/script.js" type="text/javascript"></script>
	<script defer src="/js/fontawesome.js" crossorigin="anonymous"></script>
    <script defer src="/js/index.js" type="text/javascript"></script>
</body>
</html>