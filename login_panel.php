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
    })
</script>
<div class="Modal modal-dialog LogInModal Modal--small">
    <div class="Modal-content">
        <div class="Modal-close App-backControl">
            <button id="login-panel-close" type="button" class="Button Button--icon Button--link hasIcon">
                <i class="icon fa fa-fw fa-times Button-icon"></i></button>
        </div>
        <form>
            <div class="Modal-header">
                <h3 class="App-titleControl App-titleControl--text">Log In</h3>
            </div>
            <div class="Modal-alert"></div>
            <div class="Modal-body">
                <div class="LogInButtons"></div>
                <div class="Form Form--centered">
                    <div class="Form-group"><input placeholder="Username or Email" name="login" class="FormControl">
                    </div>
                    <div class="Form-group"><input placeholder="Password" name="pwd" class="FormControl"
                                                   type="password">
                    </div>
                    <div class="Form-group">
                        <button type="submit" class="Button Button--primary Button--block">
                            <span class="Button-label">Log In</span>     <div class="LoadingIndicator LoadingIndicator--inline">
                                <div role="progressbar"
                                     style="position: absolute; width: 0px; z-index: auto; left: 50%; top: 50%;"
                                     class="spinner">
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-0-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(0deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-1-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(45deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-2-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(90deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-3-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(135deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-4-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(180deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-5-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(225deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-6-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(270deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                    <div
                                        style="position: absolute; top: -1px; opacity: 0.25; animation: 1s linear 0s normal none infinite running opacity-100-25-7-8;">
                                        <div
                                            style="position: absolute; width: 4px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(315deg) translate(3px, 0px); border-radius: 1px;"></div>
                                    </div>
                                </div>
                                </div>
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
