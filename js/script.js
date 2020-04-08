function registNewUser(){
    var login       = $('.reg_wrap #login').val()
    var password    = $('.reg_wrap #password').val()
    var password2   = $('.reg_wrap #password2').val()
    $.ajax({
        type: "POST",
        url: "register",
        data: {login:login, password:password, password2: password2}
    }).done(function( result )
        {
            $(".reg_wrap .output").html( result )
        });
}

document.querySelectorAll('#reg').forEach(function(el) {
    el.onclick = function() {
        registNewUser()
    }
})