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
</section>
<section class="AddMsg">
    <form action="http://groupehcbc.alwaysdata.net/discussion/new_mgs" method="post">
        <textarea class="textarea" type="text" name="message" placeholder="NOUVEAU MESSAGE"> </textarea> <br/>
        <input class="buttonMsg" value='Envoyer' type="submit"/> </br>
        <input type="hidden" name="action" value="msg" /> </br>
    </form>
    <form action="http://groupehcbc.alwaysdata.net/discussion/close" method="post">
        <input class="buttonMsg" value='Nouveau Message' type="submit"/> </br>
        <input type="hidden" name="closer" value="ferme" /> </br>
    </form>
    <?php if ($_SESSION['nom'] == 'ADMIN') { ?>
    <form action="http://groupehcbc.alwaysdata.net/discussion/del" method="post">
        <input type="submit" name="delete" value="delete" />
    </form>
    <?php } ?>
    <p>
        Lorsque la conversation ne comporte aucun message appuyez sur "Nouveau Message" pour commencer à discuter
    </p>
</section>

