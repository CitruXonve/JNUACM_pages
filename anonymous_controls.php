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
    
    $('[placeholder="Search this site"]').focus(function () {
        if ($(this).val().length>0)
            set_on($(this).parent().parent(), 'class',' open');
        else
            set_off($(this).parent().parent(), 'class',' open',/ open/g);
        set_on($(this).parent().parent(), 'class',' focused');
    });
    $('[placeholder="Search this site"]').blur(function () {
        set_off($(this).parent().parent(), 'class',' open',/ open/g);
        set_off($(this).parent().parent(), 'class',' focused',/ focused/g);
    });
    $('[placeholder="Search this site"]').keypress(function () {
//        alert($(this).val());
        if ($(this).val().length>0)
            set_on($(this).parent().parent(), 'class',' open');
        else
            set_off($(this).parent().parent(), 'class',' open',/ open/g);
        set_on($(this).parent().parent(), 'class',' focused');
    });
    $('#item-logIn-label').click(function (evt) {
        evt.preventDefault();
//        alert('click1');
        history.pushState(null,'','?login');
        routing();
    });
    $('#item-signUp-label').click(function (evt) {
        evt.preventDefault();
//        alert('click1');
        history.pushState(null,'','?signup');
        routing();
    });
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
