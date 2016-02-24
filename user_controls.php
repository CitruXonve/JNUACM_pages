<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/23/16
 * Time: 20:33
 */
require_once "header.php";
$da = new DataAccess();
if (!isset($_SESSION['timestamp']))
    die("Not logged in!");

$da->dosql("select * from users WHERE ID='" . $_SESSION['user_id'] . "';");
$col = $da->rtnres();
//echo "select * from users WHERE user_login='".$_SESSION['username']."';";
?>
<script type="text/javascript">
    function switch_open(evt,attr_name){
        var cl=evt.attr(attr_name);
        if (cl.indexOf(' open')>=0)
            cl=cl.replace(/ open/g,'');
        else
            cl=cl+' open';
        evt.attr(attr_name,cl);
    }
    function  switch_true(evt,attr_name){
        evt.attr(attr_name,(evt.attr(attr_name)=='true'?false:true));
    }
    $('#Dropdown-button').click(function(){
//        alert($(this).parent().attr('class'));
        switch_open($(this).parent(),'class');
        switch_true($(this),'aria-expanded')
//        alert($(this).parent().attr('class'));
    })
    $('#log-out-button').click(function(){
        $.ajax({
            url: 'user_logout.php',
            cache: false,
            success: function (returnData) {
                location.reload();
            }
        })
    })
</script>
<ul class="Header-controls">
    <li class="item-search">
        <div class="Search ">
            <div class="Search-input">
                <input class="FormControl" placeholder="Search Forum">
            </div>
            <ul class="Dropdown-menu Search-results">
            </ul>
        </div>
    </li>
    <li class="item-notifications">
        <div class="ButtonGroup Dropdown dropdown NotificationsDropdown itemCount0">
            <button class="Dropdown-toggle Button Button--flat" data-toggle="dropdown" title="Notifications">
                <i class="icon fa fa-fw fa-bell Button-icon"></i>
                <span class="Button-label">Notifications</span>
            </button>
            <div class="Dropdown-menu Dropdown-menu--right"></div>
        </div>
    </li>
    <li class="item-session">
        <div class="ButtonGroup Dropdown dropdown SessionDropdown itemCount4">
            <button id="Dropdown-button" class="Dropdown-toggle Button Button--user Button--flat" data-toggle="dropdown"
                    aria-expanded="false">
                <img class="Avatar " src="<?php echo $col['user_avatar']; ?>">
                <span class="Button-label">
                    <span class="username"><?php echo $col['user_nickname'] ?></span></span></button>
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