<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contest Print Service</title>
    <link rel="stylesheet" href="assets/forum.css">
    <script src="js/action.js"></script>
    <script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script>
    <script type="text/javascript">
    	function ClearContent() {
    		document.getElementById('TeamNo').value = '';
    		document.getElementById('CodeContent').value = '';
	}
	function SetCurrentDateTime() {
		$(document.getElementById('date_time')).load('time.php');
	}
	$(document).ready(function(){
	    setInterval(SetCurrentDateTime,1000);
	});
    </script>
</head>
<body>
<script>
</script>
<div id="app" class="App">
    <div id="app-navigation" class="App-navigation"></div>
    <div id="drawer" class="App-drawer">
        <header id="header" class="App-header">
            <div id="header-navigation" class="Header-navigation"></div>
            <div class="container">
                <h1 class="Header-title">
                    <a>校园编程挑战赛</a>
                </h1>

                <div id="header-secondary" class="Header-secondary">
                    <ul class="Header-controls">
                        <li class="item-Help">
                            <button class="Button Button--link" type="button"><span class="Button-label">Help</span>
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
                        <div class="containerNarrow"><h2 class="Hero-title">欢迎使用程序设计竞赛打印服务</h2>
                            <div class="Hero-subtitle"></div>
                        </div>
                    </div>
                </header>

                <div class="container">
                    <div class="IndexPage-results  sideNavOffset">
                        <div class="IndexPage-toolbar"></div>
                        <div class="DiscussionList">
                            <form name="submit" method="POST" action="write.php">
                                <ul class="DiscussionList-discussions">
                                    <li data-id="1">
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
                                            <textarea id="CodeContent" cols=85 rows=15 name="CodeContent"
                                            ></textarea>
                                                <ul class="DiscussionListItem-main">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="DiscussionListItem">
                                            <div class="DiscussionListItem-content Slidable-content" align="center">
                                                <ul class="DiscussionListItem-main">
                                                    <ul class="DiscussionListItem-info">
                                                        <button class="Button Button--primary IndexPage-newDiscussion hasIcon"
                                                                itemclassname="App-primaryControl" type="submit"><i
                                                                class="icon fa fa-fw fa-edit Button-icon"></i><span
                                                                class="Button-label">Submit</span>
                                                        </button>
                                                        <button class="Button" onclick="ClearContent()"
                                                                type="button"><span
                                                                class="Button-label">Reset</span>
                                                        </button>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="DiscussionList-loadMore"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <br style="clear: both;">
    <div id="footer" align="center">
        <tbody>
        <tr>
            <td>
                <span id="date_time">
                    2016/01/01 00:00:00
                </span>

            </td>
            <br>
            <td style="padding:6px">
                Jiangnan University - JNU-ACM Team<br>
                Developer : <a href="mailto:Semprathlon@163.com"
                               style="color: rgb(239, 125, 39)">Semprathlon</a>
            </td>
        </tr>
        </tbody>
    </div>

</div>
</body>
</html>