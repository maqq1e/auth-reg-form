
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
                <button type="submit" id="load_img">Load new image</button>
            </div>
            <div class="output"></div>
        </from>
    </div>
    <div class="user_wrap">
        <h1>Your name - <?=$data['login']?></h1>
    </div>
</div>