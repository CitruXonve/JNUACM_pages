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
        function loadControls() {
            $.get('user_verify.php', function (res) {
                if (res.result) {
                    $.get('user_controls.php', function (returnData) {
                        $('#header-secondary').html(returnData);
                    });
                }
                else {
                    $.get('anonymous_controls.php', function (returnData) {
                        $('#header-secondary').html(returnData);
                    });
                }
            });
        }
        function loadMainPage() {
            $.ajax({
                url: 'main.php',
                cache: false,
                success: function (returnData) {
                    $('#content').html(returnData);

                    /*$('.item-read-more').each(function () {
                     $(this).click(function (evt) {
                     evt.preventDefault();
                     //                            alert($(this).attr('id'));
                     loadSinglePost($(this).attr('id'));
                     })
                     })*/
                }
            });
        }
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
            /*_oTag = document.getElementById("model");
             _oTag.style.display = "none"; // hide it.
             _oTag = document.getElementById("modal-loading");
             _oTag.style.display = "none"; // hide it.*/
        }
        $(document).ready(function () {
            /*if (window.attachEvent) {
             window.attachEvent('onload', display_loading);
             } else {
             window.addEventListener('load', display_loading, false);
             }*/
            $('#home-link').click(function (evt) {
                evt.preventDefault();
                loadMainPage();
            })
            $('#print-link').click(function (evt) {
                evt.preventDefault();
                $.ajax({
                    url: 'print.php',
                    cache: false,
                    success: function (returnData) {
                        $('#content').html(returnData);
                    }
                });
            })
        });
    </script>
</head>
<body>
<script>
    loadControls();
    loadMainPage();
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
                <h1 class="Header-title">
                    <a id="print-link">
                        PrintService
                    </a>
                </h1>
                <div id="header-primary" class="Header-primary">
                    <ul class="Header-controls"></ul>
                </div>
                <div id="header-secondary" class="Header-secondary">
                </div>
            </div>
        </header>
    </div>

    <main class="App-content">
        <div id="content">
            <?php
            include_once "loading.html"
            ?>
        </div>
    </main>

    <br style="clear: both;">
    <?php
    include_once "footer.php"
    ?>
</div>
<div id="model" style="display: none;">
    <div class="ModalManager modal fade in"
         style="display: block;position: fixed;top: 0;right: 0;bottom: 0;left: 0;overflow: hidden;background-color: rgba(170, 170, 170, 0.901961);">
        <div id="model-manager"></div>
    </div>
</div>
</body>
</html>