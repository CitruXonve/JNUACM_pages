<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/22/16
 * Time: 10:18
 */
require_once "header.php";
$da = new DataAccess();
?>
<script>
    function set_on(evt, attr_name,attr_var) {
        var cl = evt.attr(attr_name);
        if (!cl) return;
        if (cl.indexOf(attr_var) < 0)
            cl = cl + attr_var;
        evt.attr(attr_name, cl);
    }
    function set_off(evt, attr_name,attr_var,regex) {
        var cl = evt.attr(attr_name);
        if (!cl) return;
        if (cl.indexOf(attr_var) >= 0)
            cl = cl.replace(regex, '');
        evt.attr(attr_name, cl);
    }
    function deactivate_all(){
        $('li').each(function(){
            set_off($(this),'class',' active',/ active/g);
        })
    }
    function activate(evt){
        set_on(evt,'class',' open');
    }
</script>
<ul>
    <li class="item-newDiscussion App-primaryControl">
        <button class="Button Button--primary IndexPage-newDiscussion hasIcon"
                itemclassname="App-primaryControl" type="button">
            <i class="icon fa fa-fw fa-edit Button-icon"></i>
            <span class="Button-label">Something to write?</span> 
        </button>
    </li>
    <li class="item-nav">
        <div
            class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount12">
            <button class="Dropdown-toggle Button" data-toggle="dropdown">
                <span class="Button-label">All Posts</span>
                <i class="icon fa fa-fw fa-sort Button-caret"></i>
            </button>
            <ul class="Dropdown-menu dropdown-menu ">
                <li class="item-allDiscussions active">
                    <a active="true" class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-comments-o Button-icon"></i>
                        <span class="Button-label">All Posts</span></a></li>
                <li class="item-following">
                    <a active="false" class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-star Button-icon"></i>
                        <span class="Button-label">Spotlight</span>
                    </a>
                </li>
                <li class="item-tags">
                    <a active="false" class=" hasIcon" type="button">
                        <i class="icon fa fa-fw fa-th-large Button-icon"></i>
                        <span class="Button-label">Tags</span>
                    </a>
                </li>
                <li class="Dropdown-separator"></li>
                <?php
                //load the list of tags
                $cnt = $da->dosql("SELECT * FROM tags");
                while ($row = $da->rtnres()) {
                    ?>
                    <script>
                        $('.item-tag<?php echo $row['tid'] ?> ').click(function () {
                            deactivate_all();
                            activate($(this));
                            $.get('taglist.php?tid='+<?php echo $row['tid'] ?>, function (returnData) {
                                $('[id=IndexPage-list]').html(returnData);
                            });
                        })
                    </script>
                    <li class="item-tag<?php echo $row['tid'] ?> ">
                        <a class="TagLinkButton hasIcon " style="" title="">
                            <span class="icon TagIcon Button-icon"
                                  style="background-color:<?php echo $row['color'] ?>;"></span><?php echo $row['d_name'] ?>
                        </a>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
    </li>
</ul>
