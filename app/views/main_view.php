
<div class="main_wrap">
    <div class="img_wrap">
        <img src='<?=$data['pic']?>' alt="<?=$data['login']?>">
        <form method="POST" enctype="multipart/form-data" class="send_img_wrap">
            <div class="btn_wrap">
                <label class="input_wrap">
                    <i class="fas fa-paperclip"></i>
                    <input class="input_file" name="upload" type="file">
                    <script defer text="text/javascript">
                        // Script for input file animation
                        var $ = function(el) {return document.querySelector(el)}
                        $('.input_file').onchange = function() {
                            $('.fas').removeClass('fa-paperclip')
                            $('.fas').addClass('fa-check light-green')
                        };
                    </script>
                </label>
                <?php if($_SESSION['leng'] == 'ru'):?>
                    <button type="submit" id="load_img">Загрузить новое изображение</button>
                <?php else:?>
                    <button type="submit" id="load_img">Load new image</button>
                <?php endif;?>
            </div>
            <div class="output"></div>
        </from>
    </div>
    <div class="user_wrap">
        <?php if($_SESSION['leng'] == 'ru'):?>
            <h1>Ваш логин - <?=$data['login']?></h1>
        <?php else:?>
            <h1>Your login - <?=$data['login']?></h1>
        <?php endif;?>
    </div>
</div>