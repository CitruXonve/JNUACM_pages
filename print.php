<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/24/16
 * Time: 09:36
 */
include_once "header.php";
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
                $('[id=DiscussionPageContainer]').html('Please log in and retry!');
        });
        
    $('#reset-button').click(function ClearContent() {
        $('[id=TeamNo]').val('');
        $('[id=CodeContent').val('');
    });
</script>
<div class="DiscussionPage">
    <div class="DiscussionPage-discussion">
        <header class="Hero DiscussionHero DiscussionHero--colored">
            <div class="container">
                <ul class="DiscussionHero-items">
                    <li class="item-title"><h2 class="DiscussionHero-title">欢迎使用程序设计竞赛打印服务</h2></li>
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
                            <form name="submit" method="POST" action="write.php">
                                <ul class="DiscussionList-discussions">
                                    <li>
                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content" align="">
                                                <ul class="DiscussionListItem-main">
                                                    <ul class="DiscussionListItem-info">
                                                        <span>TeamNo.</span>
                                                    </ul>
                                                </ul>
                                                <input id="TeamNo" name="TeamNo">
                                                <ul class="DiscussionListItem-main">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content">
                                                <ul class="DiscussionListItem-main">
                                                    <ul class="DiscussionListItem-info">
                                                        <span>Code:</span>
                                                        <a id="PasteLink" style="display: none"><span
                                                                class="Button-label">[Click here to paste]</span>
                                                        </a>
                                                    </ul>
                                                </ul>
                                                <textarea id="CodeContent" rows="15" name="CodeContent"
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