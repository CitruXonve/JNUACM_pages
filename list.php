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

function parseDate($str)
{
    $day = 864e5;
    $before = new DateTime($str);
    $now = new DateTime();
    $dif = $before->diff($now);
    if (abs($dif->days) < 1 && abs($dif->h) < 1 && abs($dif->i) < 1)
        return 'a minute ago';
    else if (abs($dif->days) < 1 && abs($dif->h) < 1)
        return $dif->format('i') . 'minutes ago';
    else if (abs($dif->days) < 1 && abs($dif->h) < 2)
        return 'an hour ago';
    else if (abs($dif->days) < 1)
        return $dif->format('%h') . 'hours ago';
    else if (abs($dif->days) < 2)
        return 'a day ago';
    else if (abs($dif->days) < 30)
        return $dif->format('%d') . ' days ago';
    else if (abs($dif->days) < 60)
        return 'a month ago';
    else if (abs($dif->days) < 210)
        return $dif->format('%m') . 'months ago';
    else
        return 'on ' . $before->format('Y/m/d');
}

?>
<script type="text/javascript">
    $('.item-read-more').each(function () {
        $(this).click(function (evt) {
            evt.preventDefault();
//                            alert($(this).attr('id'));
            loadSinglePost($(this).attr('id'));
        })
    })
</script>
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
                            <?php
                            //load the author of this article
                            $dau = new DataAccess();
                            $dau->dosql("select * from users where ID=" . $row['uid']);
                            $col = $dau->rtnres();
                            ?>
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
                                                        <span class="TagLabel  colored"
                                                              style="color: rgb(95, 128, 163); background-color: rgb(95, 128, 163);">
                                                            <span class="TagLabel-text">题目</span>
                                                        </span><span class="TagLabel  colored"
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