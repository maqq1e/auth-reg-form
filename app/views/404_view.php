
<?php if($_SESSION['leng'] == 'ru'):?>
  <h1>404 Страница не найдена</h1>
<?php else:?>
  <h1>404 Error Page</h1>
<?php endif;?>
<section class="error-container">
  <span class="four"><span class="screen-reader-text">4</span></span>
  <span class="zero"><span class="screen-reader-text">0</span></span>
  <span class="four"><span class="screen-reader-text">4</span></span>
</section>
<div class="link-container">
  <?php if($_SESSION['leng'] == 'ru'):?>
    <a href="/" class="more-link">НА ГЛАВНУЮ</a>
  <?php else:?>
    <a href="/" class="more-link">HOME PAGE</a>
  <?php endif;?>
</div>