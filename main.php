<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/22/16
 * Time: 10:35
 */
include_once 'header.php';
?>
<script type="text/javascript">
    function display_loading_main(){
        $.get('loading.html', function (returnData) {
            $('[id=IndexPage-list]').html(returnData);
        });
    }
    function routing_main(){
            var param=window.location.search;
            display_loading_main();
            if (param===''||param.match(/index$/)||param.match(/all$/)){
                deactivate_all();
                activate($('.item-allDiscussions'));
                setTimeout(function () {
                    $.get('list.php', function (returnData) {
                        $('[id=IndexPage-list]').html(returnData);
                    });
                }, 500);
            }
            if (param.match(/t=\w+$/)) {
                loadTaglist(param.match(/t=(\w+)$/)[1]);
            }
        }
    routing_main();
</script>
<div class="IndexPage">
    <header class="Hero WelcomeHero">
        <div class="container">
            <div class="containerNarrow"><h2 class="Hero-title">欢迎访问江南大学程序设计竞赛网站</h2>
                <div class="Hero-subtitle"></div>
            </div>
        </div>
    </header>
    <div id="IndexPageContainer" class="container">
        <nav id="IndexPage-nav" class="IndexPage-nav sideNav">
            <?php
            include_once "sidebar.php";
            ?>
        </nav>
        <div id="IndexPage-list" class="IndexPage-results  sideNavOffset">
        </div>
    </div>
</div>
