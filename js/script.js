function registNewUser(){
    var login       = $('.reg_wrap .login').val()
    var password    = $('.reg_wrap .password').val()
    var password2   = $('.reg_wrap .password2').val()
    $.ajax({
        type: "POST",
        url: "register",
        data: {login:login, password:password, password2: password2}
    }).done(function( result )
        {
            $(".reg_wrap .output").html( result )
        });
}

function loginUser(){
    var login       = $('.log_wrap .login').val()
    var password    = $('.log_wrap .password').val()
    $.ajax({
        type: "POST",
        url: "login",
        data: {login:login, password:password}
    }).done(function( result )
        {
            $(".log_wrap .output").html( result )
        });
}


document.querySelectorAll('#reg').forEach(function(el) {
    el.onclick = function() {
        registNewUser()
    }
})

document.querySelectorAll('#log').forEach(function(el) {
    el.onclick = function() {
        loginUser()
    }
})