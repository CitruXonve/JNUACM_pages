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

$da->dosql("select * from users WHERE user_login='" . $_SESSION['username'] . "';");
$col = $da->rtnres();
//echo "select * from users WHERE user_login='".$_SESSION['username']."';";
?>
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
            <button class="Dropdown-toggle Button Button--user Button--flat" data-toggle="dropdown"
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
                    <button class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-sign-out Button-icon"></i>
                        <span class="Button-label">Log Out</span>
                    </button>
                </li>
            </ul>
        </div>
    </li>
</ul>