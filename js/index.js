
function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return !!right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }


var Input_Validation = function Input_Validation(obj, reg) {
    var _this3 = this;

    var empty = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
    var err = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';

    _classCallCheck(this, Input_Validation);

    this.reg = reg;
    this.empty = empty;
    this.err = err;
    this.obj = document.querySelector('#' + obj);
    this.req = document.querySelector('#req_' + obj);
    this.state = null; // True - всё хорошо, false - неверно, null - пользователь не касался инпута
    this.obj.addEventListener('blur', function () {
        if (!_this3.reg.test(_this3.obj.value)) {
            _this3.obj.style.borderBottom = '5px solid red';

            if (_this3.obj.value == '') {
                _this3.req.innerHTML = _this3.empty;
            } else {
                _this3.req.innerHTML = _this3.err;
            }
        } else {
            _this3.obj.style.borderBottom = '5px solid green';
            _this3.req.innerHTML = '';
            _this3.req.innerHTML = '';
        }
    });
};

/* #### - Auth and register form | START - #### */

function cambiar_login() {
    document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";
    document.querySelector('.cont_form_login').style.display = "block";
    document.querySelector('.cont_form_sign_up').style.opacity = "0";

    setTimeout(function () { document.querySelector('.cont_form_login').style.opacity = "1"; }, 400);

    setTimeout(function () {
        document.querySelector('.cont_form_sign_up').style.display = "none";
    }, 200);
}

function cambiar_sign_up(at) {
    document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
    document.querySelector('.cont_form_sign_up').style.display = "block";
    document.querySelector('.cont_form_login').style.opacity = "0";

    setTimeout(function () {
        document.querySelector('.cont_form_sign_up').style.opacity = "1";
    }, 100);

    setTimeout(function () {
        document.querySelector('.cont_form_login').style.display = "none";
    }, 400);
}

function ocultar_login_sign_up() {

    document.querySelector('.cont_forms').className = "cont_forms";
    document.querySelector('.cont_form_sign_up').style.opacity = "0";
    document.querySelector('.cont_form_login').style.opacity = "0";

    setTimeout(function () {
        document.querySelector('.cont_form_sign_up').style.display = "none";
        document.querySelector('.cont_form_login').style.display = "none";
    }, 500);

}

$('.dropdown-el').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
});
$(document).click(function () {
    $('.dropdown-el').removeClass('expanded');
});

/* #### - Auth and register form | END - #### */
/* #### - Validation form | START - #### */

// Take lenguage
$.ajax({
    type: "POST",
    url: "session_data",
    data: { status: 'OK' },
}).done(function (result) {
    sessionData = JSON.parse(result)
    // Check language
    if(sessionData['leng'] == 'ru') {
        // Default validate for input's
        new Input_Validation('login_login', /[a-z]{4}[a-z]/, 'This field is required!', 'Вы не правильно ввели свой логин.')
        new Input_Validation('login_password', /./, 'This field is required!')
        new Input_Validation('register_login', /[a-z]{4}[a-z]/, 'This field is required!', 'Логин должен быть длинее 4 символов и не может содержать символы, отличные от латиницы.')
        new Input_Validation('register_password', /./, 'This field is required!')
        new Input_Validation('register_password_confirm', /./, 'This field is required!')
        // Not default validate for input's
        var pass                = document.querySelector('#register_password')
        var pass_shell          = document.querySelector('#req_register_password')
        var pass_confirm        = document.querySelector('#register_password_confirm')
        var pass_confirm_shell  = document.querySelector('#req_register_password_confirm')
        var login_login_shell   = document.querySelector('#req_login_login')
        var login_pass          = document.querySelector('#login_password')
        var login_pass_shell    = document.querySelector('#req_login_password')

        var log_btn = document.querySelector('#log')
        var reg_btn = document.querySelector('#reg')

        pass.onblur = function() {
            var length      = pass.value.length > 0 // If pass not empty
            var isBadLimit  = pass.value.length > 0 && pass.value.length < 5 // If pass less then 5 symbols
            var isLetters   = /[a-zA-Z]/.test(pass.value) // If in pass include letters
            var isNum       = /[0-9]/.test(pass.value) // If in pass include numbers
            if( length && (isBadLimit || !isLetters || !isNum)) {
                pass.style.borderBottom = "5px solid #d2b23e";
                pass_shell.innerHTML = "Будьте аккуратны, ваш пароль не безопасен. Попробуйте его усложнить."
            }
        }
        pass_confirm.onblur = function() {
            if(pass.value != pass_confirm.value) {
                pass_confirm.style.borderBottom = "5px solid red";
                pass_confirm_shell.innerHTML = "Пароли не совпадают!"
            }
            // If error is exist - disabled button
            if(pass_confirm_shell.innerHTML == '') {
                reg_btn.removeAttribute('disabled')
            }
            else {
                reg_btn.setAttribute('disabled', '1')
            }
        }
        login_pass.onblur = function() {
            // If error is exist - disabled button
            if(login_login_shell.innerHTML == '' && login_pass_shell.innerHTML == '') {
                log_btn.removeAttribute('disabled')
            }
            else {
                log_btn.setAttribute('disabled', '1')
            }
        }
    }
    else {
         // Default validate for input's
         new Input_Validation('login_login', /[a-z]{4}[a-z]/, 'This field is required!', 'Your login is incorrect.')
         new Input_Validation('login_password', /./, 'This field is required!')
         new Input_Validation('register_login', /[a-z]{4}[a-z]/, 'This field is required!', 'Login must be longer 4 symbols and can\'t incude latin script.')
         new Input_Validation('register_password', /./, 'This field is required!')
         new Input_Validation('register_password_confirm', /./, 'This field is required!')
         // Not default validate for input's
         var pass                = document.querySelector('#register_password')
         var pass_shell          = document.querySelector('#req_register_password')
         var pass_confirm        = document.querySelector('#register_password_confirm')
         var pass_confirm_shell  = document.querySelector('#req_register_password_confirm')
         var login_login_shell   = document.querySelector('#req_login_login')
         var login_pass          = document.querySelector('#login_password')
         var login_pass_shell    = document.querySelector('#req_login_password')

         var log_btn = document.querySelector('#log')
         var reg_btn = document.querySelector('#reg')

         pass.onblur = function() {
             var length      = pass.value.length > 0 // If pass not empty
             var isBadLimit  = pass.value.length > 0 && pass.value.length < 5 // If pass less then 5 symbols
             var isLetters   = /[a-zA-Z]/.test(pass.value) // If in pass include letters
             var isNum       = /[0-9]/.test(pass.value) // If in pass include numbers
             if( length && (isBadLimit || !isLetters || !isNum)) {
                 pass.style.borderBottom = "5px solid #d2b23e";
                 pass_shell.innerHTML = "Be safety! You password is not safe. Try to strong it."
             }
         }
         pass_confirm.onblur = function() {
             if(pass.value != pass_confirm.value) {
                 pass_confirm.style.borderBottom = "5px solid red";
                 pass_confirm_shell.innerHTML = "Passwords are mismatch!"
             }
             // If error is exist - disabled button
             if(pass_confirm_shell.innerHTML == '') {
                 reg_btn.removeAttribute('disabled')
             }
             else {
                 reg_btn.setAttribute('disabled', '1')
             }
         }
         login_pass.onblur = function() {
             // If error is exist - disabled button
             if(login_login_shell.innerHTML == '' && login_pass_shell.innerHTML == '') {
                 log_btn.removeAttribute('disabled')
             }
             else {
                 log_btn.setAttribute('disabled', '1')
             }
         }
    }
});