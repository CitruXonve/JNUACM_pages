/**
 * Created by semprathlon on 2/23/16.
 */
/*function loadIndexPage() {
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
 }*/