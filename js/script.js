function registNewUser() {
    var login = $('.reg_wrap .login').val()
    var password = $('.reg_wrap .password').val()
    var password2 = $('.reg_wrap .password2').val()
    $.ajax({
        type: "POST",
        url: "register",
        data: { login: login, password: password, password2: password2 }
    }).done(function (result) {
        $(".reg_wrap .output").html(result)
    });
}

function loginUser() {
    var login = $('.log_wrap .login').val()
    var password = $('.log_wrap .password').val()
    $.ajax({
        type: "POST",
        url: "login",
        data: { login: login, password: password }
    }).done(function (result) {
        $(".log_wrap .output").html(result)
    });
}

document.querySelectorAll('#reg').forEach(function (el) {
    el.onclick = function () {
        registNewUser()
    }
})

document.querySelectorAll('#log').forEach(function (el) {
    el.onclick = function () {
        loginUser()
    }
})

document.querySelectorAll('#load_img').forEach(function (el) {
    el.onclick = function () {
        //stop submit the form, we will post it manually.
        event.preventDefault()

        // Get form
        var form = $('.send_img_wrap')[0]

        // Create an FormData object
        var data = new FormData(form)

        // disabled the submit button
        $("#btnSubmit").prop("disabled", true)

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "send_image",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000
        }).done(function (result) {
            $(".send_img_wrap button").html(result)
        })

    }
})