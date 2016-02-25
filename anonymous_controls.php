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
    function set_on(evt, attr_name,attr_var) {
        var cl = evt.attr(attr_name);
        if (cl.indexOf(attr_var) < 0)
            cl = cl + attr_var;
        evt.attr(attr_name, cl);
    }
    function set_off(evt, attr_name,attr_var,regex) {
        var cl = evt.attr(attr_name);
        if (cl.indexOf(attr_var) >= 0)
            cl = cl.replace(regex, '');
        evt.attr(attr_name, cl);
    }
    function switch_open(evt, attr_name,attr_var,regex) {
        var cl = evt.attr(attr_name);
        if (cl.indexOf(attr_var) >= 0)
            cl = cl.replace(regex, '');
        else
            cl = cl + attr_var;
        evt.attr(attr_name, cl);
    }
    function switch_true(evt, attr_name) {
        evt.attr(attr_name, (evt.attr(attr_name) == 'true' ? false : true));
    }
    function switch_user_menu(handle) {
        switch_open(handle.parent(), 'class',' open',/ open/g);
        switch_true(handle, 'aria-expanded');
    }
    $('[placeholder="Search this site"]').focus(function () {
        if ($(this).val().length>0)
            set_on($(this).parent().parent(), 'class',' open');
        else
            set_off($(this).parent().parent(), 'class',' open',/ open/g);
        set_on($(this).parent().parent(), 'class',' focused');
    })
    $('[placeholder="Search this site"]').blur(function () {
        set_off($(this).parent().parent(), 'class',' open',/ open/g);
        set_off($(this).parent().parent(), 'class',' focused',/ focused/g);
    })
    $('[placeholder="Search this site"]').keypress(function () {
//        alert($(this).val());
        if ($(this).val().length>0)
            set_on($(this).parent().parent(), 'class',' open');
        else
            set_off($(this).parent().parent(), 'class',' open',/ open/g);
        set_on($(this).parent().parent(), 'class',' focused');
    })
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
    $('#item-signUp-label').click(function (evt) {
        evt.preventDefault();
//        alert('click1');
        $.ajax({
            url: 'signup_panel.php',
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
        <button id="item-signUp-label" class="Button Button--link" type="button"><span class="Button-label">Sign Up</span>
        </button>
    </li>
    <li class="item-logIn">
        <button id="item-logIn-label" class="Button Button--link" type="button"><span class="Button-label">Log In</span>
        </button>
    </li>
</ul>