<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/23/16
 * Time: 20:49
 */
include_once "header.php";
?>
<script type="text/javascript">
    $('#item-logIn-label').click(function (evt) {
        evt.preventDefault();
//        alert('click1');
        $.ajax({
            url: 'login_panel.php',
            cache: false,
            success: function (returnData) {
                $('#model-manager').html(returnData);
                _oTag = document.getElementById("model-manager");
                _oTag.style.display = "block"; // reveal it.
                _oTag = document.getElementById("model");
                _oTag.style.display = ""; // reveal it.
            }
        });
    })
</script>
<ul class="Header-controls">
    <li class="item-search">
        <div class="Search ">
            <div class="Search-input"><input class="FormControl" placeholder="Search this site">
            </div>
            <ul class="Dropdown-menu Search-results"></ul>
        </div>
    </li>
    <li class="item-signUp">
        <button class="Button Button--link" type="button"><span class="Button-label">Sign Up</span>
        </button>
    </li>
    <li class="item-logIn">
        <button id="item-logIn-label" class="Button Button--link" type="button"><a class="Button-label">Log In</a>
        </button>
    </li>
</ul>
