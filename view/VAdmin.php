<?php
    $function = new Vfunction();
    $function->start_page('User', '/css/index.css');
    $show=new CDefault();

?>

<header>
    <div class="boxFreeNote">
        <h1><a href="http://groupehcbc.alwaysdata.net/home/connected">BACK</a></h1>
    </div>
    <div class="boxMenu">
        <?php if($_SESSION['nom'] == 'ADMIN') {
            echo '<h2><a href="http://groupehcbc.alwaysdata.net/home/admin">Liste USER</a></h2>';
        }?>
    </div>
</header>
<section class="allChat">
    <div class="ChatList">
        <?php $show->showUser();?>

    </div>
</section>

<?php $function->end_page();?>