<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />

	<title><?=$page['title']?></title>
</head>
<body>
    <header class="header">
        <form class="leng">
            <span class="dropdown-el">
                <?php if($_SESSION['leng'] == 'ru'):?>
                    <input type="radio" name="sortType" value="Relevance" id="leng-en">
                    <label data-leng="en" class="leng-switch" for="sort-relevance">EN</label>
                    <input type="radio" name="sortType" value="Popularity" checked="checked" id="leng-ru">
                    <label for="sort-best">RU</label>
                <?php else:?>
                    <input type="radio" name="sortType" value="Relevance" checked="checked" id="sort-relevance">
                    <label for="sort-relevance">EN</label>
                    <input type="radio" name="sortType" value="Popularity" id="sort-best">
                    <label data-leng="ru" class="leng-switch" for="sort-best">RU</label>
                <?php endif;?>
            </span>
        </form>
        <?php if($_SESSION['userid']):?>
            <div class="logout_wrap">
                <button id="logout">Logout</button>
                <div class="output"></div>
            </div>
        <?php endif;?>
    </header>
    <div class="content_wrap">
        <?php include 'app/views/'.$content_view; ?>
    </div>
    <footer>
        <ul class="links_wrap">
            <li><a class="telegram" href="http://t.me/maqqIe" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
            <li><a class="gmail" href="mailto:daniel.hramkov@gmail.com" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
        </ul>
    </footer>

    <script src="/js/jquery3.min.js" type="text/javascript"></script>
    <script defer src="/js/script.js" type="text/javascript"></script>
	<script defer src="/js/fontawesome.js" crossorigin="anonymous"></script>
    <script defer src="/js/index.js" type="text/javascript"></script>
</body>
</html>