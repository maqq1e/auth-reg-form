<div class="cotn_principal">
    <div class="cont_centrar">
        <div class="cont_login">
            <div class="cont_info_log_sign_up">
                <div class="col_md_login">
                    <div class="cont_ba_opcitiy">
                        <h2>LOGIN</h2>
                        <p>You can log in if you have accout</p>
                        <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                    </div>
                </div>
                <div class="col_md_sign_up">
                    <div class="cont_ba_opcitiy">
                        <h2>SIGN UP</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                    </div>
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
                <div class="cont_form_login">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="fas fa-arrow-left"></i></a>
                    <h2>LOGIN</h2>
                    <input type="text" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button class="btn_login" id="" onclick="cambiar_login()">LOGIN</button>
                </div>
                <div class="cont_form_sign_up reg_wrap">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="fas fa-arrow-left"></i></a>
                    <h2>SIGN UP</h2>
                    <input type="text" id="login" name="login" placeholder="User" />
                    <input type="password" id="password" name="password" placeholder="Password" />
                    <input type="password" id="password2" name="password2" placeholder="Confirm Password" />
                    <button class="btn_sign_up" id="reg" onclick="cambiar_sign_up()">SIGN UP</button>
                    <div class='output'></div>
                </div>
            </div>
        </div>
    </div>
</div>