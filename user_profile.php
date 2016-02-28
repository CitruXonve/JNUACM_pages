<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/28/16
 * Time: 17:58
 */
require_once "header.php";
$da = new DataAccess();
session_start();
$parsed_url = parse_url(GetCurUrl(), PHP_URL_QUERY);
if (!preg_match('/^([0-9]+)$/', convertUrlQuery($parsed_url)['u'], $matches)) {
    if (!getVerifyingRes())
        die('Wrong parameters!');
    else
        $uid = $_SESSION['user_id'];
}
else
    $uid = $matches[0];
//echo $uid;

$u_cnt=$da->dosql("select * from users WHERE ID=" . $uid . ";");
//echo "select * from users WHERE ID=" . $uid . ";";
$col = $da->rtnres();
if ($u_cnt!=1)
    die("No such user!");
?>
<div class="UserPage">
    <div class="UserCard Hero UserHero" style="background-color: rgb(204, 199, 225);">
        <div class="darkenBackground">
            <div class="container">
                <div class="UserCard-profile">
                    <h2 class="UserCard-identity">
                        <a>
                            <div class="UserCard-avatar">
                                <img class="Avatar "
                                     src="<?php echo $col['user_avatar'] ?>">
                            </div>
                            <span class="username"><?php echo $col['user_login'] ?></span>
                        </a>
                    </h2>
                    <ul class="UserCard-badges badges" style="display: none">
                        <li class="item-group1">
                            <span class="Badge Badge--group--Admin " title=""
                                  style="background-color: rgb(183, 42, 42);"
                                  data-original-title="Admin">
                            <i class="icon fa fa-fw fa-wrench Badge-icon"></i>
                            </span>
                        </li>
                    </ul>
                    <ul class="UserCard-info">
                        <li class="item-bio">
                            <div class="UserBio ">
                                <div class="UserBio-content">
                                    <p></p>
                                </div>
                            </div>
                        </li>
                        <li class="item-lastSeen">
                            <span class="UserCard-lastSeen">
                                <i class="icon fa fa-fw fa-clock-o "></i>
                            </span>
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
                    <div class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount2">
                        <button class="Dropdown-toggle Button" data-toggle="dropdown">
                            <span class="Button-label">Posts</span>
                            <i class="icon fa fa-fw fa-sort Button-caret">
                            </i>
                        </button>
                        <ul class="Dropdown-menu dropdown-menu ">
                            <li class="item-posts active">
                                <a active="true" class=" hasIcon"
                                   type="button">
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
                                    <i class="icon fa fa-fw fa-reorder Button-icon">
                                    </i>
<span class="Button-label">Discussions<span class="Button-badge"></span>
</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="sideNavOffset UserPage-content">
            <div class="DiscussionsUserPage">
                <div class="DiscussionList">
                    <ul class="DiscussionList-discussions">
                        <?php
                        //load the list of articles
                        if ($p_cnt < 1)
                            die("Sorry,nothing to display!");
                        while ($row = $dap->rtnres()) {
                            $pid = $row['pid']; ?>
                            <li data-id="<?php echo $pid ?>">
                                <div class="DiscussionListItem">
                                    <div class="DiscussionListItem-content Slidable-content unread">
                                        <div class="DiscussionListItem-author" title="" data-original-title="">
                                            <img class="Avatar " src="<?php echo $col['user_avatar']; ?>">
                                        </div>
                                        <ul class="DiscussionListItem-badges badges"></ul>
                                        <div class="DiscussionListItem-main">
                                            <h3 class="DiscussionListItem-title"><?php echo $row['title'] ?></h3>
                                            <ul class="DiscussionListItem-info">
                                                <li class="item-tags">
                                                        <span class="TagsLabel ">
                                                            <?php
                                                            //load the list of tags attached to this article
                                                            $dat = new DataAccess();
                                                            $t_cnt = $dat->dosql("SELECT tags.* FROM posts LEFT JOIN posts_tags ON posts.pid=posts_tags.pid LEFT JOIN tags on tags.tid=posts_tags.tid WHERE posts.pid=" . $pid);
                                                            while ($rec = $dat->rtnres()) {
                                                                ?><span class="TagLabel  colored"
                                                                        style="background-color: <?php echo $rec['color'] ?>;">
                                                                <span
                                                                    class="TagLabel-text"><?php echo $rec['d_name'] ?></span>
                                                                </span><?php
                                                            }
                                                            unset($dat);
                                                            ?>
                                                        </span>
                                                </li>
                                                <li class="item-terminalPost">
                                                        <span>
                                                            <i class="icon fa fa-fw fa-reply "></i>
                                                            <span
                                                                class="username"><?php echo $col['user_nickname'] ?></span> published <?php echo parseDate($row['date']) . '.'; ?>
                                                            <time datetime="2015-11-28T19:04:29+08:00"
                                                                  title="Saturday, November 28, 2015 7:04 PM"
                                                                  data-humantime="true"
                                                                  style="display: none"></time>
                                                                <time datetime="<?php echo date("c") ?>"
                                                                      title="<?php echo date("l, F j, Y g:s A") ?>"
                                                                      data-humantime="true"></time>
                                                            <?php
                                                            unset($dau);
                                                            ?>
                                                        </span>
                                                </li>
                                                <li class="item-excerpt">
                                                        <span>
                                                            <?php
                                                            echo parseContent($row['content']);
                                                            if (has_read_more_tag($row['content']))
                                                                echo '……';
                                                            ?></span>
                                                </li>
                                                <a id="<?php echo $pid ?>" class="item-read-more">Read
                                                    more</a>
                                            </ul>
                                        </div>
                                    </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
