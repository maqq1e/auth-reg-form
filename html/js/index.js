
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
try {
    $.ajax({
        type: "POST",
        url: "session_data",
        data: { status: 'OK' },
    }).done(function (result) {
        sessionData = JSON.parse(result)
        var lengDict = {}
        // Check language
        if (sessionData['leng'] == 'ru') {
            lengDict = {
                "_empty": "Это поле обязательно!",
                "login_login": {
                    "error": "Вы не правильно ввели свой логин."
                },
                "register_login": {
                    "error": "Логин должен быть длинее 4 символов и не может содержать символы, отличные от латиницы."
                },
                "pass_shell": "Будьте аккуратны, ваш пароль не безопасен. Попробуйте его усложнить.",
                "pass_confirm_shell": "Пароли не совпадают!",
            }
        }
        else {
            lengDict = {
                "_empty": "This field is required!",
                "login_login": {
                    "error": "'Your login is incorrect."
                },
                "register_login": {
                    "error": "Login must be longer 4 symbols and can\'t incude latin script."
                },
                "pass_shell": "Be safety! You password is not safe. Try to strong it.",
                "pass_confirm_shell": "Passwords are mismatch!",
            }
        }
        // Default validate for input's
        try {
            new Input_Validation('login_login', /[a-z]{4}[a-z]/, lengDict['_empty'], lengDict['login_login']['error'])
            new Input_Validation('login_password', /./, lengDict['_empty'])
            new Input_Validation('register_login', /[a-z]{4}[a-z]/, lengDict['_empty'], lengDict['register_login']['error'])
            new Input_Validation('register_password', /./, lengDict['_empty'])
            new Input_Validation('register_password_confirm', /./, lengDict['_empty'])
        } catch (error) {}
        // Not default validate for input's
        var pass = document.querySelector('#register_password')
        var pass_shell = document.querySelector('#req_register_password')
        var pass_confirm = document.querySelector('#register_password_confirm')
        var pass_confirm_shell = document.querySelector('#req_register_password_confirm')

        try {
            pass.addEventListener('blur', function () {
                var length = pass.value.length > 0 // If pass not empty
                var isBadLimit = pass.value.length > 0 && pass.value.length < 5 // If pass less then 5 symbols
                var isLetters = /[a-zA-Z]/.test(pass.value) // If in pass include letters
                var isNum = /[0-9]/.test(pass.value) // If in pass include numbers
                if (length && (isBadLimit || !isLetters || !isNum)) {
                    pass.style.borderBottom = "5px solid #d2b23e";
                    pass_shell.innerHTML = lengDict['pass_shell']
                }
            })
            pass_confirm.addEventListener('blur', function () {
                if (pass.value != pass_confirm.value) {
                    pass_confirm.style.borderBottom = "5px solid red";
                    pass_confirm_shell.innerHTML = lengDict['pass_confirm_shell']
                }
            })
        } catch (error) {}
    });
} catch (error) {/* Form is not exist in this page */}