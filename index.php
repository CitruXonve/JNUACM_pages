<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jiangnan University ACM-ICPC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="./assets/forum.css">
    <script src="./js/action.js"></script>
    <?php
    require_once "header.php";
    ?>
    <script type="text/javascript">
        function loadIndexPage() {
//            xmlhttpload_get("main.php","content");
            var xmlhttp;
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("content").innerHTML = xmlhttp.responseText;
//                    alert("get");
                    $('.item-read-more').each(function () {
                        $(this).click(function (evt) {
                            evt.preventDefault();
//                            alert($(this).attr('id'));
                            loadSinglePost($(this).attr('id'));
                        })
                    })
                }
            }
            xmlhttp.open("GET", "main.php", true);
            xmlhttp.send();
        }
        function loadSinglePost(pid) {
            xmlhttpload_get("single.php?p=" + pid, "content");
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
            loadIndexPage();
        })
    </script>
</head>
<body>
<script>
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
                    <a id="home-link" onclick="loadIndexPage()">
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
                    <ul class="Header-controls">
                        <li class="item-search">
                            <div class="Search ">
                                <div class="Search-input"><input class="FormControl" placeholder="Search this site">
                                </div>
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