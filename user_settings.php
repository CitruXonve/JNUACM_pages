<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/28/16
 * Time: 20:32
 */
require_once "header.php";
$da = new DataAccess();
session_start();

    if (!getVerifyingRes())
        die('Wrong parameters!');
    else
        $uid = $_SESSION['user_id'];
//echo $uid;

$u_cnt=$da->dosql("select * from users WHERE ID=" . $uid . ";");
//echo "select * from users WHERE ID=" . $uid . ";";
$col = $da->rtnres();
if ($u_cnt!=1)
    die("No such user!");
?>
<script>
    $('#avatar-handle').click(function () {
        switch_user_menu($(this));
    })
    $('#avatar-handle').blur(function () {

    })
</script>
<div class="UserPage">
    <div class="UserCard Hero UserHero" style="background-color: rgb(227, 129, 154);">
        <div class="darkenBackground">
            <div class="container">
                <div class="UserCard-profile">
                    <h2 class="UserCard-identity">
                        <div class="AvatarEditor Dropdown UserCard-avatar">
                            <img class="Avatar " src="<?php echo $col['user_avatar'] ?>">
                            <a id="avatar-handle" class="Dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon fa fa-fw fa-pencil "></i>
                            </a>
                            <ul class="Dropdown-menu Menu">
                                <li class="item-upload">
                                    <button class=" hasIcon" type="button">
                                        <i class="icon fa fa-fw fa-upload Button-icon"></i>
                                        <span class="Button-label">Upload</span>
                                    </button>
                                </li>
                                <li class="item-remove" style="display: none">
                                    <button class=" hasIcon" type="button">
                                        <i class="icon fa fa-fw fa-times Button-icon"></i>
                                        <span class="Button-label">Remove</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <span class="username"><?php echo $col['user_login']?></span>
                    </h2>
                    <ul class="UserCard-info">
                        <li class="item-bio">
                            <div class="UserBio editable">
                                <div class="UserBio-content">
                                    <p class="UserBio-placeholder">Write something about yourself</p>
                                </div>
                            </div>
                        </li>
                        <li class="item-lastSeen">
                            <span class="UserCard-lastSeen online">
                            <i class="icon fa fa-fw fa-circle "></i> Online</span>
                        </li>
                        <li class="item-joined">Joined <?php echo parseDate($col['user_registered']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="sideNav UserPage-nav">
            <ul class="affix-top">
                <li class="item-nav">
                    <div class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount4">
                        <button class="Dropdown-toggle Button" data-toggle="dropdown">
                            <span class="Button-label">Settings</span>
                            <i class="icon fa fa-fw fa-sort Button-caret"></i>
                        </button>
                        <ul class="Dropdown-menu dropdown-menu ">
                            <li class="item-posts">
                                <a active="false" class=" hasIcon" type="button">
                                    <i class="icon fa fa-fw fa-comment-o Button-icon">
                                    </i>
                                    <?php
                                    $dap = new DataAccess();
                                    //                                    echo "select * from posts where uid=" . $col['ID'] . ";";
                                    $p_cnt = $dap->dosql("select * from posts where uid=" . $col['ID'] . " order by pid desc;");

                                    ?>
                                    <span class="Button-label">Posts<span
                                            class="Button-badge"><?php echo $p_cnt ?></span>
                                    </span>
                                </a>
                            </li>
                            <li class="item-discussions">
                                <a active="false" class=" hasIcon" type="button">
                                    <i class="icon fa fa-fw fa-reorder Button-icon"></i>
                                        <span class="Button-label">Discussions<span class="Button-badge"></span>
                                        </span>
                                </a>
                            </li>
                            <li class="Dropdown-separator">
                            </li>
                            <li class="item-settings active">
                                <a active="true" class=" hasIcon" type="button">
                                    <i class="icon fa fa-fw fa-cog Button-icon"></i>
                                    <span class="Button-label">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="sideNavOffset UserPage-content">
            <div class="SettingsPage">
                Sorry,items here are still under developing!
                <ul style="display: none">
                    <li class="item-account">
                        <fieldset class="Settings-account">
                            <legend>Account</legend>
                            <ul>
                                <li class="item-changePassword">
                                    <button class="Button" type="button">
                                        <span class="Button-label">Change Password</span>
                                    </button>
                                </li>
                                <li class="item-changeEmail">
                                    <button class="Button" type="button">
                                        <span class="Button-label">Change Email</span>
                                    </button>
                                </li>
                            </ul>
                        </fieldset>
                    </li>
                    <li class="item-notifications">
                        <fieldset class="Settings-notifications">
                            <legend>Notifications</legend>
                            <ul>
                                <li class="">
                                    <table class="NotificationGrid">
                                        <thead>
                                        <tr>
                                            <td>
                                            </td>
                                            <th class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-bell "></i> Web
                                            </th>
                                            <th class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-envelope-o "></i> Email
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-pencil "></i> Someone renames a discussion I
                                                started
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox off  disabled">
                                                    <input type="checkbox" disabled="">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-times "></i>
                                                    </div>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-reply "></i> Someone replies to one of my
                                                posts
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox off ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-times "></i>
                                                    </div>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-at "></i> Someone mentions me in a post
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox off ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-times "></i>
                                                    </div>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-thumbs-o-up "></i> Someone likes one of my
                                                posts
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox off  disabled">
                                                    <input type="checkbox" disabled="">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-times "></i>
                                                    </div>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-lock "></i> Someone locks a discussion I
                                                started
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox off  disabled">
                                                    <input type="checkbox" disabled="">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-times "></i>
                                                    </div>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="NotificationGrid-groupToggle">
                                                <i class="icon fa fa-fw fa-star "></i> Someone posts in a discussion I'm
                                                following
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="NotificationGrid-checkbox">
                                                <label class="Checkbox on ">
                                                    <input type="checkbox">
                                                    <div class="Checkbox-display">
                                                        <i class="icon fa fa-fw fa-check "></i>
                                                    </div>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </fieldset>
                    </li>
                    <li class="item-privacy">
                        <fieldset class="Settings-privacy">
                            <legend>Privacy</legend>
                            <ul>
                                <li class="item-discloseOnline">
                                    <label class="Checkbox on  Checkbox--switch">
                                        <input type="checkbox">
                                        <div class="Checkbox-display">
                                        </div>
                                        Allow others to see when I am online</label>
                                </li>
                            </ul>
                        </fieldset>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
