<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/23/16
 * Time: 20:33
 */
require_once "header.php";
$da = new DataAccess();
if (!getVerifyingRes())
    die("Not logged in!");

session_start();
$da->dosql("select * from users WHERE ID='" . $_SESSION['user_id'] . "';");
$col = $da->rtnres();
//echo "select * from users WHERE user_login='".$_SESSION['username']."';";
?>
<script type="text/javascript">
    function switch_user_menu(handle) {
        switch_open(handle.parent(), 'class',' open',/ open/g);
        switch_true(handle, 'aria-expanded');
    }
    $('#Dropdown-button').click(function () {
        switch_user_menu($(this))
    });
    $('#Dropdown-button').blur(function () {
//        setTimeout(set_off($(this).parent(),'class',' open',/ open/g),500);
    });
    $('[title=Notifications]').focus(function () {
        switch_user_menu($(this))
    });
    $('[title=Notifications]').blur(function () {
        switch_user_menu($(this))
    });
    $('#log-out-button').click(function () {
        $.ajax({
            url: 'user_logout.php',
            cache: false,
            success: function (returnData) {
                location.reload();
            }
        })
    })
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
</script>
<ul class="Header-controls">
    <li class="item-search">
        <div class="Search ">
            <div class="Search-input">
                <input class="FormControl" placeholder="Search this site">
            </div>
            <ul class="Dropdown-menu Search-results">
            </ul>
        </div>
    </li>
    <li class="item-notifications">
        <div class="ButtonGroup Dropdown dropdown NotificationsDropdown itemCount0">
            <button class="Dropdown-toggle Button Button--flat" data-toggle="dropdown" title="Notifications"
                    aria-expanded="false">
                <i class="icon fa fa-fw fa-bell Button-icon"></i>
                <span class="Button-label">Notifications</span>
            </button>
            <div class="Dropdown-menu Dropdown-menu--right">
                <div class="NotificationList">
                    <div class="NotificationList-header">
                        <div class="App-primaryControl">
                            <button class="Button Button--icon Button--link hasIcon" title="Mark All as Read"
                                    type="button"><i class="icon fa fa-fw fa-check Button-icon"></i></button>
                        </div>
                        <h4 class="App-titleControl App-titleControl--text">Notifications</h4></div>
                    <div class="NotificationList-content">
                        <div class="NotificationGroup"><a class="NotificationGroup-header">Message title</a>
                            <ul class="NotificationGroup-content">
                                <li><a class="Notification Notification--newPost "><img class="Avatar " src=""><i
                                            class="icon fa fa-fw fa-star Notification-icon"></i><span
                                            class="Notification-content"><span
                                                class="username">Message from</span> posted</span>
                                        <time pubdate="true" datetime="2016-01-20T17:16:06+08:00"
                                              title="Wednesday, January 20, 2016 5:16 PM" data-humantime="true">datetime
                                        </time>
                                        <div class="Notification-excerpt"></div>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="item-session">
        <div class="ButtonGroup Dropdown dropdown SessionDropdown itemCount4">
            <button id="Dropdown-button" class="Dropdown-toggle Button Button--user Button--flat" data-toggle="dropdown"
                    aria-expanded="false">
                <img class="Avatar " src="<?php echo $col['user_avatar']; ?>">
                <span class="Button-label">
                    <span class="username"><?php echo $col['user_nickname'] ?></span>
                </span>
            </button>
            <ul class="Dropdown-menu dropdown-menu Dropdown-menu--right">
                <li class="item-profile">
                    <a active="false" class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-user Button-icon"></i>
                        <span class="Button-label">Profile</span>
                    </a>
                </li>
                <li class="item-settings">
                    <a active="false" class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-cog Button-icon"></i>
                        <span class="Button-label">Settings</span>
                    </a>
                </li>
                <li class="Dropdown-separator"></li>
                <li class="item-logOut">
                    <a id='log-out-button' class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-sign-out Button-icon"></i>
                        <span class="Button-label">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>