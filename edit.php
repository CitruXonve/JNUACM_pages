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
    $(document).ready(function () {
        $.get('user_verify.php', function (returnData) {
            if (!returnData.result)
                $('[id=DiscussionPageContainer]').html('Please log in and retry!');
        })
    });
    $('#form-submit').submit(function(){
        $.ajax({
            type: 'POST',
            url: 'post_editor.php',
            data: {
                post_title: $('[name=Title]').val(),
                post_content: hex_md5($('[name=Content]').val())
            },
            success: function (returnData) {
                if (returnData.result == true)
                    alert("Success!");
                else
                    alert("Failed!");
                setTimeout("history.back()", 1000);
            }
        });
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
                                                        <span>Title:</span>
                                                    </ul>
                                                </ul>
                                                <input id="post_title" name="Title">
                                                <ul class="DiscussionListItem-main">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content">
                                                <ul class="DiscussionListItem-main">
                                                    <ul class="DiscussionListItem-info">
                                                        <span>Code:</span>
                                                    </ul>
                                                </ul>
                                                <textarea id="post_content" rows="15" name="Content"
                                                          style="width: 100%;"></textarea>
                                                <ul class="DiscussionListItem-main">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content"
                                                 align="center">
                                                <ul class="DiscussionListItem-info">
                                                    <button
                                                        class="Button Button--primary IndexPage-newDiscussion hasIcon"
                                                        itemclassname="App-primaryControl" type="submit"><i
                                                            class="icon fa fa-fw fa-edit Button-icon"></i><span
                                                            class="Button-label">Submit</span>
                                                    </button>
                                                    <button id="reset-button" class="Button" type="button">
                                                        <span class="Button-label">Reset</span>
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