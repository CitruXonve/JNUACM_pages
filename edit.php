<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/24/16
 * Time: 09:36
 */
require_once "header.php";
?>
<script type="text/javascript">
//    $(document).ready(function () {
//        $.get('user_verify.php', function (returnData) {
//            if (!returnData.result)
//                $('[id=DiscussionPageContainer]').html('Please log in and retry!');
//        })
//    });
    $.get('user_verify.php', function (returnData) {
        if (!returnData.result)
            location.href = "./?login";
        //$('[id=DiscussionPageContainer]').html('Please log in and retry!');
    });

    $('#form-submit').submit(function () {
        $.ajax({
            type: 'POST',
            url: 'post_editor.php',
            data: {
                post_title: $('#post_title').val(),
                post_content: $('#post_content').val()
            },
            success: function (returnData) {
                // alert(returnData);
                if (returnData.result == true)
                    alert("Success!"/*+returnData.title*/);
                else
                    alert("Failed!");
                setTimeout("history.back()", 1000);
            }
        });
        return false;
    })
//    $('#reset-button').click(function ClearContent() {
//        $('[id=TeamNo]').val('');
//        $('[id=CodeContent').val('');
//    });
</script>
<div class="DiscussionPage">
    <div class="DiscussionPage-discussion">
        <header class="Hero DiscussionHero DiscussionHero--colored">
            <div class="container">
                <ul class="DiscussionHero-items">
                    <li class="item-title"><h2 class="DiscussionHero-title">Start writing...</h2></li>
                </ul>
            </div>
        </header>
        <div id="DiscussionPageContainer" class="container">
            <nav class="DiscussionPage-nav"></nav>
            <div class="PostStream">
                <div class="PostStream-item" data-index="0" data-time="" data-number="1"
                     data-id="1" style="display: block;">
                    <article class="Post CommentPost Post--edited">
                        <div>
                            <form id="form-submit">
                                <ul class="DiscussionList-discussions">
                                    <li>
                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content" align="">
                                                <ul class="DiscussionListItem-main">
                                                    <ul class="DiscussionListItem-info">
                                                    </ul>
                                                </ul>
                                                <input id="post_title" name="Title" class="FormControl" placeholder="Discussion Title">
                                                <ul class="DiscussionListItem-main">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content">
                                                <ul class="DiscussionListItem-main">
                                                    <ul class="DiscussionListItem-info">
                                                    </ul>
                                                </ul>
                                                <textarea id="post_content" name="Content" class="FormControl TextEditor-flexible" placeholder="Write a Post..." style="height: 200px;"></textarea>
                                                <ul class="DiscussionListItem-main">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content"
                                                 align="center">
                                                <ul class="DiscussionListItem-info">
                                                    <button
                                                        class="Button Button--primary hasIcon" type="submit"><i
                                                            class="icon fa fa-fw fa-edit Button-icon"></i><span
                                                            class="Button-label">Post</span>
                                                    </button>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="DiscussionList-loadMore"></div>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>