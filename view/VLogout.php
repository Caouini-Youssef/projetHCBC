<?php
    $function = new Vfunction();
    $function->start_page('Logout', '../css/index.css');
    session_destroy();
    ?>
    <header>
        <div class="boxFreeNote">
            <h1> <?php echo 'Deconnecté !'; ?></h1>
        </div>
        <div class="boxMenu">
        </div>
    </header>
    <?php echo '<meta http-equiv="refresh" content="1;http://groupehcbc.alwaysdata.net/" />'; ?>
<?php
$function->end_page();

