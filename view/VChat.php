<?php
    $function = new Vfunction();
    $function->start_page('Chat', '/css/index.css');
    $show = new CMessage();
?>
<h1 class="titre"> DISCUSSION </h1>
<section class="msgList">
     <?php
        $show->showMsg();
     ?>
    <form class="AddMsg" action="http://groupehcbc.alwaysdata.net/discussion/new_mgs" method="post">
        <textarea class="textarea" type="text" name="message" placeholder="NOUVEAU MESSAGE"> </textarea> <br/>
        <input class="box" value='Envoyer' type="submit"/> </br>
        <input class="box" type="hidden" name="action" value="msg" /> </br>
        <input class="box" value='Clore' type="submit"/> </br>
        <input class="box" type="hidden" name="action" value="msg" /> </br>
    </form>
</section>