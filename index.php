<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jiangnan University ACM-ICPC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="./assets/forum.css">
    <script src="./js/main.js"></script>
    <?php
    require_once "header.php";
    ?>
    <script type="text/javascript">

        function loadSinglePost(pid) {
            //xmlhttpload_get("single.php?p=" + pid, "content");
            $.ajax({
                url: 'single.php?p=' + pid,
                cache: false,
                success: function (returnData) {
                    $('#content').html(returnData);
                }
            });
        }
        function display_loading() {
            // .... 其他指令
            _oTag = document.getElementById("model");
            _oTag.style.display = "none"; // hide it.
        }
        $(document).ready(function () {
            if (window.attachEvent) {
                window.attachEvent('onload', display_loading);
            } else {
                window.addEventListener('load', display_loading, false);
            }
            $('#home-link').click(function(evt){
                evt.preventDefault();
                loadMainPage();
            })
        });
    </script>
</head>
<body>
<script>
//    loadMainPage();
</script>
<div id="app" class="App App--index affix">
    <div id="app-navigation" class="App-navigation">
        <div class="Navigation ButtonGroup App-backControl">
            <button class="Button Button--icon Navigation-drawer hasIcon" type="button"><i
                    class="icon fa fa-fw fa-reorder Button-icon"></i></button>
        </div>
    </div>
    <div id="drawer" class="App-drawer">
        <header id="header" class="App-header">
            <div id="header-navigation" class="Header-navigation">
                <div class="Navigation ButtonGroup "></div>
            </div>
            <div class="container">
                <h1 class="Header-title">
                    <a id="home-link">
                        JNU-ACM Club::Home
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
                    <?php
                        if (isset($_SESSION['timestamp'])){
                            include_once "user_controls.php";
                        }
                        else{
                            include_once "anonymous_controls.php";
                        }
                    ?>
                </div>
            </div>
        </header>
    </div>

    <main class="App-content">
        <div id="content">

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