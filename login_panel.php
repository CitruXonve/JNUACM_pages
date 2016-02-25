<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/24/16
 * Time: 09:36
 */
include_once "header.php";
?>
<script type="text/javascript">
    $('#login-panel-close').click(function (evt) {
        evt.preventDefault();
        _oTag = document.getElementById("model-manager");
        _oTag.style.display = "none"; // hide it.
        _oTag = document.getElementById("model");
        _oTag.style.display = "none"; // hide it.
    });
    $('#form-submit').submit(function () {
//        alert("click");
        $('#login-verifying').attr('style', '');
        $.ajax({
            type: 'POST',
            url: 'user_login.php',
            data: {
                login: $('[name=login]').val(),
                pwd: hex_md5($('[name=pwd]').val())
            },
            success: function (returnData) {
                if (returnData.result == true)
                    $('.Button-submit-login').html('Success! Please wait...');
                else
                    $('.Button-submit-login').html('Logging in failed!');
                setTimeout("location.reload()", 1000);
            }
        });
        return false;
    })
    /*$('[type=submit]').click(function (evt) {
     //        alert("POST");
     $('#login-verifying').attr('style', '');
     //        alert('login=' + $('[name=login]').val() + '&pwd=' + hex_md5($('[name=pwd]').val()));
     $.ajax({
     type: 'POST',
     url: 'user_login.php',
     data: {
     login: $('[name=login]').val(),
     pwd: hex_md5($('[name=pwd]').val())
     },
     success: function (returnData) {
     if (returnData.result == true)
     $('.Button-submit-login').html('Success! Please wait...');
     else
     $('.Button-submit-login').html('Logging in failed!');
     location.reload();
     }
     });
     });*/
</script>
<div class="Modal modal-dialog LogInModal Modal--small">
    <div class="Modal-content">
        <div class="Modal-close App-backControl">
            <button id="login-panel-close" type="button" class="Button Button--icon Button--link hasIcon">
                <i class="icon fa fa-fw fa-times Button-icon"></i></button>
        </div>
        <form id="form-submit">
            <div class="Modal-header">
                <h3 class="App-titleControl App-titleControl--text">Log In</h3>
            </div>
            <div class="Modal-alert"></div>
            <div class="Modal-body">
                <div class="LogInButtons"></div>
                <div class="Form Form--centered">
                    <div class="Form-group">
                        <input placeholder="Username or Email" name="login" class="FormControl" type="text" required="required">
                    </div>
                    <div class="Form-group">
                        <input placeholder="Password" name="pwd" class="FormControl" type="password" required="required">
                    </div>
                    <div class="Form-group">
                        <button type="submit" class="Button Button--primary Button--block">
                            <span class="Button-submit-login">Log In</span>
                            <img id="login-verifying" src="./assets/pic/u=2045248104,1139323035&fm=21&gp=0.gif"
                                 width="15px" height="15px" style="display: none">
                        </button>
                    </div>
                </div>
            </div>
            <div class="Modal-footer">
                <p class="LogInModal-forgotPassword"><a>Forgot password?</a>
                </p>
                <p class="LogInModal-signUp">Don't have an account? <a>Sign Up</a>
                </p>
            </div>
        </form>

    </div>
</div>
