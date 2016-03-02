<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/25/16
 * Time: 16:33
 */
include_once "header.php";
?>
<script type="text/javascript">
    $('#signup-panel-close').click(function (evt) {
        evt.preventDefault();
        _oTag = document.getElementById("model-manager");
        _oTag.style.display = "none"; // hide it.
        _oTag = document.getElementById("model");
        _oTag.style.display = "none"; // hide it.
        history.back();
    });
    function check() {
        if ($('[name=login]').val().length < 1) {
            $('.Button-submit-signup').html('Username cannot be empty!');
            return false;
        }
        if ($('[name=email]').val().length < 1) {
            $('.Button-submit-signup').html('Email cannot be empty!');
            return false;
        }
        if ($('[name=pwd]').val().length < 1 || $('[name=pwd-rep]').val().length < 1) {
            $('.Button-submit-signup').html('Password cannot be empty!');
            return false;
        }
        if (!$('[name=pwd]').val() === $('[name=pwd-rep]').val()) {
            $('.Button-submit-signup').html('Passwords you entered do not match!');
            return false;
        }
        return true;
    }
    $('#form-submit').submit(function () {
        //        alert("click");
        $('#signup-verifying').attr('style', '');
        if (!check())
            return false;
        $.ajax({
            type: 'POST',
            url: 'user_signup.php',
            data: {
                login: $('[name=login]').val(),
                nick: $('[name=nick]').val(),
                email: $('[name=email]').val(),
                pwd: hex_md5($('[name=pwd]').val()),
                rep: hex_md5($('[name=pwd-rep]').val()),
            },
            success: function (returnData) {
                if (returnData.result == true){
                    $('.Button-submit-signup').html('Success! Please wait...');
                    setTimeout("history.back()", 1000);
                }
                else{
                    $('.Button-submit-signup').html(returnData.result);
                    $('#signup-verifying').attr('style', 'display:none;');
                }
            }
        });
        return false;
    })
</script>
<div class="Modal modal-dialog Modal--small SignUpModal">
    <div class="Modal-content">
        <div class="Modal-close App-backControl">
            <button id="signup-panel-close" class="Button Button--icon Button--link hasIcon" type="button">
                <i class="icon fa fa-fw fa-times Button-icon"></i>
            </button>
        </div>
        <form id="form-submit">
            <div class="Modal-header">
                <h3 class="App-titleControl App-titleControl--text">Sign Up</h3>
            </div>
            <div class="Modal-alert"></div>
            <div class="Modal-body">
                <div class="LogInButtons"></div>
                <div class="Form Form--centered">
                    <div class="Form-group">
                        <input class="FormControl" name="login" type="text" placeholder="Username (necessary)"
                               required="required"
                               pattern="^[a-zA-Z0-9_]{3,16}$"
                               title="Only letters,numbers and underlines are allowed in the username of which the length ranges from 3 to 16.">
                    </div>
                    <div class="Form-group">
                        <input class="FormControl" name="nick" type="text" placeholder="Nickname" pattern="\s|.{3,32}"
                               title="The length of the password should be not more than 32.">
                    </div>
                    <div class="Form-group">
                        <input class="FormControl" name="email" type="email" placeholder="Email (necessary)"
                               required="required">
                    </div>
                    <div class="Form-group">
                        <input class="FormControl" name="pwd" type="password"
                               placeholder="Password (necessary)" required="required" pattern=".{6,16}"
                               title="The length of the password should be between 6 and 16."></div>
                    <div class="Form-group">
                        <input class="FormControl" name="pwd-rep" type="password"
                               placeholder="Repeat Password (necessary)" required="required" pattern=".{6,16}"
                               title="The length of the password should be between 6 and 16."></div>
                    <div class="Form-group">
                        <button class="Button Button--primary Button--block" type="submit">
                            <span class="Button-submit-signup">Sign Up</span>
                            <img id="signup-verifying" src="./assets/pic/u=2045248104,1139323035&fm=21&gp=0.gif"
                                 width="15px" height="15px" style="display: none">
                        </button>
                    </div>
                </div>
            </div>
            <div class="Modal-footer">
                <p class="SignUpModal-logIn">Already have an account? <a>Log In</a></p>
            </div>
        </form>
    </div>
</div>