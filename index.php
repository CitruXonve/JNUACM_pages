<!DOCTYPE html>
<?php
require_once "header.php";
$da = new DataAccess();
function parseContent($str)
{
    $read_more = '<!--more-->';
    $pos = strpos($str, $read_more);
    if ($pos === false)
        return $str;
    else
        return substr($str, 0, $pos);
}

function has_read_more_tag($str)
{
    $read_more = '<!--more-->';
    $pos = strpos($str, $read_more);
    if ($pos === false)
        return false;
    else
        return true;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jiangnan University ACM-ICPC</title>
    <link rel="stylesheet" href="./assets/forum.css">
    <script src="./js/action.js"></script>
    <script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script>
    <script type="text/javascript">
    </script>
</head>
<body>
<script>
</script>
<div id="app" class="App">
    <div id="drawer" class="App-drawer">
        <header id="header" class="App-header">
            <div id="header-navigation" class="Header-navigation">
                <div class="Navigation ButtonGroup "></div>
            </div>
            <div class="container">
                <h1 class="Header-title">
                    <a href="/jnuacm/" id="home-link">
                        JNU-ACM Club
                    </a>
                </h1>
                <h1 class="Header-title">
                    <a href="/swap/" id="home-link">
                        Swap
                    </a>
                </h1>
                <div id="header-primary" class="Header-primary">
                    <ul class="Header-controls"></ul>
                </div>
                <div id="header-secondary" class="Header-secondary">
                    <ul class="Header-controls">
                        <li class="item-search">
                            <div class="Search ">
                                <div class="Search-input"><input class="FormControl" placeholder="Search Forum"></div>
                                <ul class="Dropdown-menu Search-results"></ul>
                            </div>
                        </li>
                        <li class="item-signUp">
                            <button class="Button Button--link" type="button"><span class="Button-label">Sign Up</span>
                            </button>
                        </li>
                        <li class="item-logIn">
                            <button class="Button Button--link" type="button"><span class="Button-label">Log In</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>

    <main class="App-content">
        <div id="content">
            <div class="IndexPage">
                <header class="Hero WelcomeHero">
                    <div class="container">
                        <div class="containerNarrow"><h2 class="Hero-title">欢迎访问江南大学程序设计竞赛网站</h2>
                            <div class="Hero-subtitle"></div>
                        </div>
                    </div>
                </header>

                <div class="container">
                    <nav class="IndexPage-nav sideNav">
                        <ul>
                            <li class="item-newDiscussion App-primaryControl">
                                <button class="Button Button--primary IndexPage-newDiscussion hasIcon"
                                        itemclassname="App-primaryControl" type="button">
                                    <i class="icon fa fa-fw fa-edit Button-icon"></i>
                                    <span class="Button-label">&nbsp;</span>
                                </button>
                            </li>
                            <li class="item-nav">
                                <div
                                    class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount12">
                                    <button class="Dropdown-toggle Button" data-toggle="dropdown">
                                        <span class="Button-label">All Discussions</span>
                                        <i class="icon fa fa-fw fa-sort Button-caret"></i>
                                    </button>
                                    <ul class="Dropdown-menu dropdown-menu ">
                                        <li class="item-allDiscussions active">
                                            <a href="" active="true" class=" hasIcon" type="button">
                                                <i class="icon fa fa-fw fa-comments-o Button-icon"></i>
                                                <span class="Button-label">All Posts</span></a></li>
                                        <li class="item-following">
                                            <a href="" active="false" class=" hasIcon" type="button">
                                                <i class="icon fa fa-fw fa-star Button-icon"></i>
                                                <span class="Button-label">Spotlight</span>
                                            </a>
                                        </li>
                                        <li class="item-tags">
                                            <a href="" active="false" class=" hasIcon" type="button">
                                                <i class="icon fa fa-fw fa-th-large Button-icon"></i>
                                                <span class="Button-label">Tags</span>
                                            </a>
                                        </li>
                                        <li class="Dropdown-separator"></li>
                                        <?php
                                        //load the list of tags
                                        $cnt = $da->dosql("SELECT * FROM tags");
                                        while ($row = $da->rtnres()) {
                                            ?>
                                            <li class="item-tag<?php echo $row['tid'] ?> ">
                                                <a class="TagLinkButton hasIcon " href="" style="" title="">
                                                    <span class="icon TagIcon Button-icon"
                                                          style="background-color:<?php echo $row['color'] ?>;"></span><?php echo $row['d_name'] ?>
                                                </a>
                                            </li>
                                            <?php
                                        } ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="IndexPage-results  sideNavOffset">
                        <div class="IndexPage-toolbar"></div>
                        <div class="DiscussionList">

                            <ul class="DiscussionList-discussions">
                                <?php
                                //load the list of articles
                                $a_cnt = $da->dosql("SELECT * FROM posts order by pid desc");
                                while ($row = $da->rtnres()) {
                                    $pid = $row['pid']; ?>
                                    <li data-id="<?php echo $pid ?>">
                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content unread">
                                                <div class="DiscussionListItem-author" title="" data-original-title="">
                                                    <span class="Avatar "
                                                          style="background: <?php echo $row['sg_color'] ?>; box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.08);"><?php echo $row['sg_ch'] ?></span>
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
                                                                while ($col = $dat->rtnres()) { ?>
                                                                    <span class="TagLabel  colored"
                                                                          style="background-color: <?php echo $col['color'] ?> ">
                                                                    <span
                                                                        class="TagLabel-text"><?php echo $col['d_name'] ?></span>
                                                                    </span>
                                                                    <?php
                                                                }
                                                                unset($dat);
                                                                ?>
                                                            </span>
                                                        </li>
                                                        <li class="item-terminalPost">
                                                            <span>
                                                                <i class="icon fa fa-fw fa-reply "></i>
                                                                <?php
                                                                //load the author of this article
                                                                $dau = new DataAccess();
                                                                $dau->dosql("select * from users where ID=" . $row['uid']);
                                                                $col = $dau->rtnres();
                                                                ?>
                                                                <span
                                                                    class="username"><?php echo $col['user_nickname'] ?></span> published
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
                                                        <a href="." style="<?php if (!has_read_more_tag($row['content'])) echo 'display:none;';?>">Read more</a>
                                                    </ul>
                                                </div>
                                            </div>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li data-id="0" style="display: none;">
                                    <div class="DiscussionListItem">
                                        <div class="DiscussionListItem-content Slidable-content unread">
                                            <div class="DiscussionListItem-author" title="" data-original-title=""><span
                                                    class="Avatar "
                                                    style="background: #C09FF5;box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.08);">V</span>
                                            </div>
                                            <ul class="DiscussionListItem-badges badges"></ul>
                                            <div class="DiscussionListItem-main">
                                                <h3 class="DiscussionListItem-title">Blank</h3>
                                                <ul class="DiscussionListItem-info">
                                                    <li class="item-tags">
                                                        <span class="TagsLabel ">
                                                            <span
                                                                class="TagLabel  colored"
                                                                style="color: rgb(95, 128, 163); background-color: rgb(95, 128, 163);">
                                                                <span class="TagLabel-text">题目</span>
                                                            </span>
                                                            <span
                                                                class="TagLabel  colored"
                                                                style="color: rgb(178, 189, 110); background-color: rgb(178, 189, 110);">
                                                                <span class="TagLabel-text">未解决</span>
                                                            </span>
                                                        </span>
                                                    </li>
                                                    <li class="item-terminalPost">
                                                                <span>
                                                                    <i class="icon fa fa-fw fa-reply "></i> 
                                                                    <span class="username">Admin</span> published
                                                                    <time pubdate="true"
                                                                          datetime="2015-11-28T19:04:29+08:00"
                                                                          title="Saturday, November 28, 2015 7:04 PM"
                                                                          data-humantime="true"></time>
                                                                </span>
                                                    </li>
                                                    <li class="item-excerpt">
                                                                <span>
                                                                    blank
                                                                </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                </li>
                            </ul>
                            <div class="DiscussionList-loadMore"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <br style="clear: both;">
    <?php
    include_once "footer.php"
    ?>
</div>
<?php
include_once "loading.html"
?>
</body>
</html>