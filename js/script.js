function registNewUser() {
    var login = $('.reg_wrap .login').val()
    var password = $('.reg_wrap .password').val()
    var password2 = $('.reg_wrap .password2').val()
    $.ajax({
        type: "POST",
        url: "register",
        data: { login: login, password: password, password2: password2 },
        success: function(res) {
            setTimeout(function () { window.location.href = '/' }, 500)
        },
        error: function(result) {
            $(".reg_wrap .output").html(result.responseText)
        }
    })
}
function loginUser() {
    var login = $('.log_wrap .login').val()
    var password = $('.log_wrap .password').val()
    $.ajax({
        type: "POST",
        url: "login",
        data: { login: login, password: password },
        success: function() {
            setTimeout(function () { window.location.href = '/' }, 500)
        },
        error: function(result) {
            $(".log_wrap .output").html(result.responseText)
        }
    })
}
function logoutUser() {
    $.ajax({
        type: "POST",
        url: "logout",
        data: { status: 'OK' },
        success: function() {
            setTimeout(function() {window.location.href='/'}, 500)
        },
        error: function(res) {
            console.log(res);
        }
    })
}
function switchLeng(leng) {
    $.ajax({
        type: "POST",
        url: "switch_leng",
        data: { leng: leng },
        success: function() {
            window.location.href='/'
        }
    })
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
document.querySelectorAll('#logout').forEach(function (el) {
    el.onclick = function () {
        logoutUser()
    }
})
document.querySelectorAll('.leng-switch').forEach(function (el) {
    el.onclick = function () {
        switchLeng(el.getAttribute('data-leng'))
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
            timeout: 600000,
            success: function() {
                setTimeout(function () { window.location.href = '/' }, 500)
            },
            error: function(result) {
                $(".send_img_wrap .output").html(result.responseText)
            }
        })

    }
})