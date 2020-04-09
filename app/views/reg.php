<div class="cotn_principal">
    <div class="cont_centrar">
        <div class="cont_login">
            <div class="cont_info_log_sign_up">
                <div class="col_md_login">
                    <?php if($_SESSION['leng'] == 'ru'):?>
                        <div class="cont_ba_opcitiy">
                            <h2>ВОЙТИ</h2>
                            <p>Если у вас уже есть аккаунт вы можете авторизоваться.</p>
                            <button class="btn_login" onclick="cambiar_login()">ВОЙТИ</button>
                        </div>
                    <?php else:?>
                        <div class="cont_ba_opcitiy">
                            <h2>LOGIN</h2>
                            <p>You can log in if you have accout</p>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    <?php endif;?>
                </div>
                <div class="col_md_sign_up">
                    <?php if($_SESSION['leng'] == 'ru'):?>
                        <div class="cont_ba_opcitiy">
                            <h2>СОЗДАТЬ</h2>
                            <p>Если у вас нет аккаунта вы можете создать его.</p>
                            <button class="btn_sign_up" onclick="cambiar_sign_up()">ЗАРЕГИСТРИРОВАТЬСЯ</button>
                        </div>
                    <?php else:?>
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>
                            <p>You can sign up if you have no account.</p>
                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="cont_back_info">
                <div class="cont_img_back_grey">
                    <img src="../images/form_back.jpg"
                        alt="" />
                </div>
            </div>
            <div class="cont_forms">
                <div class="cont_img_back_">
                    <img src="../images/form_back.jpg"
                        alt="" />
                </div>
                <div class="cont_form_login log_wrap">
                    <?php if($_SESSION['leng'] == 'ru'):?>
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="fas fa-arrow-left"></i></a>
                        <h2>ВОЙТИ</h2>
                        <input type="text" class="login" name="login" placeholder="User" />
                        <input type="password" class="password" name="password" placeholder="Password" />
                        <button class="btn_login" id="log" onclick="cambiar_login()">ВОЙТИ</button>
                        <div class='output'></div>
                    <?php else:?>
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="fas fa-arrow-left"></i></a>
                        <h2>LOGIN</h2>
                        <input type="text" class="login" name="login" placeholder="User" />
                        <input type="password" class="password" name="password" placeholder="Password" />
                        <button class="btn_login" id="log" onclick="cambiar_login()">LOGIN</button>
                        <div class='output'></div>
                    <?php endif;?>
                </div>
                <div class="cont_form_sign_up reg_wrap">
                    <?php if($_SESSION['leng'] == 'ru'):?>
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="fas fa-arrow-left"></i></a>
                        <h2>ЗАРЕГИСТРИРОВАТЬСЯ</h2>
                        <input type="text" class="login" name="login" placeholder="User" />
                        <input type="password" class="password" name="password" placeholder="Password" />
                        <input type="password" class="password2" name="password2" placeholder="Confirm Password" />
                        <button class="btn_sign_up" id="reg" onclick="cambiar_sign_up()">ЗАРЕГИСТРИРОВАТЬСЯ</button>
                        <div class='output'></div>
                    <?php else:?>
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="fas fa-arrow-left"></i></a>
                        <h2>SIGN UP</h2>
                        <input type="text" class="login" name="login" placeholder="User" />
                        <input type="password" class="password" name="password" placeholder="Password" />
                        <input type="password" class="password2" name="password2" placeholder="Confirm Password" />
                        <button class="btn_sign_up" id="reg" onclick="cambiar_sign_up()">SIGN UP</button>
                        <div class='output'></div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>