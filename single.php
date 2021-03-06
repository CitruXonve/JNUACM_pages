<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/21/16
 * Time: 20:57
 */
require_once "header.php";
$da = new DataAccess();

function debug()
{
    echo GetCurUrl() . '|';

    echo 'SELECT * FROM posts where pid=' . "$pid" . "|";
//    print_r($matches);
    echo "|";
}

$parsed_url = parse_url(GetCurUrl(), PHP_URL_QUERY);
if (!preg_match('/^([0-9]+)/', convertUrlQuery($parsed_url)['p'], $matches))
    die('Wrong parameters!');
$pid = $matches[0];
//debug();

$a_cnt = $da->dosql('SELECT * FROM posts where pid=' . "$pid");
if ($a_cnt<1)
    die("Sorry,nothing to display!");
?>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('[id=display-loading]').attr('style','display:none;');
            $('[id=display-discussion]').attr('style','');
        },1000);
    })
</script>
<div class="DiscussionPage">
    <div class="DiscussionPage-list"></div>
    <div class="DiscussionPage-discussion">
        <?php
        $row = $da->rtnres();
        $pid = $row['pid']; ?>
        <header class="Hero DiscussionHero DiscussionHero--colored">
            <div class="container">
                <ul class="DiscussionHero-items">
                    <li class="item-badges" style="display: none;">
                        <ul class="DiscussionHero-badges badges">
                            <li class="item-sticky"><span class="Badge Badge--sticky " title="Sticky"
                                                          data-original-title="Sticky"><i
                                        class="icon fa fa-fw fa-thumb-tack Badge-icon"></i></span></li>
                        </ul>
                    </li>
                    <li class="item-tags">
                        <span class="TagsLabel ">
                            <?php
                            //load the list of tags attached to this article
                            $dat = new DataAccess();
                            $t_cnt = $dat->dosql("SELECT tags.* FROM posts LEFT JOIN posts_tags ON posts.pid=posts_tags.pid LEFT JOIN tags on tags.tid=posts_tags.tid WHERE posts.pid=" . $pid);
                            while ($rec = $dat->rtnres()) {
                                ?><a class="TagLabel  colored"
                                     style="color: <?php echo $rec['color'] ?>;background-color: <?php echo $rec['color'] ?>;">
                                <span class="TagLabel-text"><?php echo $rec['d_name'] ?></span>
                                </a><?php
                            }
                            unset($dat);
                            ?>
                        </span>
                    </li>
                    <li class="item-title"><h2 class="DiscussionHero-title"><?php echo $row['title'] ?></h2></li>
                </ul>
            </div>
        </header>
        <div class="container" id="display-loading">
            <?php
            include_once "loading.html";
            ?>
        </div>
        <div id="DiscussionPageContainer" class="container">
            <nav class="DiscussionPage-nav"></nav>

            <div class="DiscussionPage-stream" id="display-discussion" style="display:none">
                <div class="PostStream">
                    <div class="PostStream-item" data-index="0" data-time="" data-number="1"
                         data-id="1" style="display: block;">
                        <article class="Post CommentPost Post--edited">
                            <div>
                                <header class="Post-header">
                                    <ul>
                                        <li class="item-user">
                                            <?php
                                            //load the author of this article
                                            $dau = new DataAccess();
                                            $dau->dosql("select * from users where ID=" . $row['uid']);
                                            $col = $dau->rtnres();
                                            ?>
                                            <div class="PostUser"><h3><a href="./?u=<?php echo $row['uid'];?>"><img
                                                            class="Avatar PostUser-avatar"
                                                            src="<?php echo $col['user_avatar']; ?>">
                                                        <span
                                                            class="username"><?php echo $col['user_nickname'] ?></span></a>
                                                </h3>
                                                <ul class="PostUser-badges badges" style="display: none;">
                                                    <li class="item-group1"><span class="Badge Badge--group--Admin "
                                                                                  title=""
                                                                                  style="background-color: rgb(183, 42, 42);"
                                                                                  data-original-title="Admin"><i
                                                                class="icon fa fa-fw fa-wrench Badge-icon"></i></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-meta">
                                            <div class="Dropdown PostMeta"><a class="Dropdown-toggle"
                                                                              data-toggle="dropdown">
                                                    <time pubdate="true"
                                                          datetime="<?php echo formatDatetimeInto($row['date'], 'c'); ?>"
                                                          title="<?php echo formatDatetimeInto($row['date'], 'l, F j, Y g:i A'); ?>"
                                                          data-humantime="true">
                                                        <?php echo 'published ' . parseDate($row['date']); ?>
                                                    </time>
                                                </a>
                                                <div class="Dropdown-menu dropdown-menu"><span
                                                        class="PostMeta-number">Post #1</span>
                                                    <time pubdate="true"
                                                          datetime="<?php echo formatDatetimeInto($row['date'], 'c'); ?>">
                                                        <?php echo formatDatetimeInto($row['date'], 'l, F j, Y g:i A'); ?>
                                                    </time>
                                            </div>
                                        </li>
                                        <li class="item-edited"><a class="PostEdited" title="" href="./?edit&p=<?php echo $pid;?>"
                                                                      data-original-title="<?php echo $col['user_nickname'] ?></span> published <?php echo parseDate($row['date']) . '.'; ?>"><i
                                                    class="icon fa fa-fw fa-pencil "></i></a></li>
                                    </ul>
                                </header>
                                <div class="Post-body">
                                    <?php
                                    echo parseContent_full($row['content']);
                                    ?>
                                </div>
                                <aside class="Post-actions" style="display: none;">
                                    <ul>
                                        <li class="item-reply">
                                            <button class="Button Button--link" type="button"><span
                                                    class="Button-label">Reply</span>
                                            </button>
                                        </li>
                                    </ul>
                                </aside>
                                <footer class="Post-footer">
                                    <ul></ul>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <div class="PostStream-item" data-index="1" data-time="2015-09-06T15:59:29.000Z" data-number="23"
                         data-id="51" style="display: block;">
                        <?php
                        //load the author of this article
                        $dau = new DataAccess();
                        $dau->dosql("select * from users where ID=" . $row['uid']);
                        $col = $dau->rtnres();
                        ?>
                        <article class="Post EventPost DiscussionLockedPost">
                            <div><i class="icon fa fa-fw fa-lock EventPost-icon"></i>
                                <div class="EventPost-info"><a class="EventPost-user" href="./?u=<?php echo $row['uid'];?>"><span
                                            class="username"><?php echo $col['user_nickname']; ?></span></a> locked the
                                    discussion.
                                </div>
                                <aside class="Post-actions">
                                    <ul></ul>
                                </aside>
                                <footer class="Post-footer">
                                    <ul></ul>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <div class="PostStream-item" data-index="2" data-time="2015-09-15T13:34:14.000Z" data-number="26"
                         data-id="224" style="display: none/*block*/;">
                        <div class="PostStream-timeGap"><span>9 days later</span></div>
                        <article class="Post EventPost DiscussionLockedPost">
                            <div><i class="icon fa fa-fw fa-unlock EventPost-icon"></i>
                                <div class="EventPost-info"><a class="EventPost-user" href="/u/Varona"><span
                                            class="username">Varona</span></a> unlocked the discussion.
                                </div>
                                <aside class="Post-actions">
                                    <ul></ul>
                                </aside>
                                <footer class="Post-footer">
                                    <ul></ul>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <div class="PostStream-item" data-index="3" data-time="2015-09-17T11:38:32.000Z" data-number="27"
                         data-id="303" style="display: none/*block*/;">
                        <article class="Post CommentPost Post--edited">
                            <div>
                                <header class="Post-header">
                                    <ul>
                                        <li class="item-user">
                                            <div class="PostUser"><h3><a href="/u/NPC"><img
                                                            class="Avatar PostUser-avatar"
                                                            src="http://async.icpc-camp.org/assets/avatars/nneftcnjftcsgddk.jpg">
                                                        <span class="username">NPC</span></a></h3>
                                                <ul class="PostUser-badges badges">
                                                    <li class="item-group1"><span class="Badge Badge--group--Admin "
                                                                                  title=""
                                                                                  style="background-color: rgb(183, 42, 42);"
                                                                                  data-original-title="Admin"><i
                                                                class="icon fa fa-fw fa-wrench Badge-icon"></i></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-meta">
                                            <div class="Dropdown PostMeta"><a class="Dropdown-toggle"
                                                                              data-toggle="dropdown">
                                                    <time pubdate="true" datetime="2015-09-17T19:38:32+08:00"
                                                          title="Thursday, September 17, 2015 7:38 PM"
                                                          data-humantime="true">Sep '15
                                                    </time>
                                                </a>
                                                <div class="Dropdown-menu dropdown-menu"><span
                                                        class="PostMeta-number">Post #27</span>
                                                    <time pubdate="true" datetime="2015-09-17T19:38:32+08:00">Thursday,
                                                        September 17, 2015 7:38 PM
                                                    </time>
                                                    <input class="FormControl PostMeta-permalink"></div>
                                            </div>
                                        </li>
                                        <li class="item-edited"><span class="PostEdited" title=""
                                                                      data-original-title="Varona edited Sep '15"><i
                                                    class="icon fa fa-fw fa-pencil "></i></span></li>
                                    </ul>
                                </header>
                                <div class="Post-body"><p>NPC工置顶</p>

                                    <p>（这里需要新手报到吗？</p>

                                    <p>发送表情的魔法 =&gt;
                                        <code>[IMG]http://static.icpc-camp.org/flarum-emotion/blue-cat.jpg[/IMG]</code>
                                    </p>
                                </div>
                                <aside class="Post-actions">
                                    <ul>
                                        <li class="item-reply">
                                            <button class="Button Button--link" type="button"><span
                                                    class="Button-label">Reply</span>
                                            </button>
                                        </li>
                                    </ul>
                                </aside>
                                <footer class="Post-footer">
                                    <ul></ul>
                                </footer>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>