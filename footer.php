<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/18
 * Time: 20:11
 */
?>
<script type="text/javascript">
    function SetCurrentDateTime() {
        $(document.getElementById('date_time')).load('time.php');
    }
    $(document).ready(function () {
        setInterval(SetCurrentDateTime, 1000);
    });
</script>
<div id="footer" align="center">
    <tbody>
    <tr>
        <td>
            <span id="date_time"></span>
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
