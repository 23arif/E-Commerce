<?php
$id = g('id');
$veri = $db->prepare("SELECT *FROM message ORDER BY message_time DESC ");
$veri->execute(array());
$v = $veri->fetchALL(PDO::FETCH_ASSOC);
$say = $veri->rowCount();
?>
<head><title><?php if($say>0){echo '('.$say.')';} ?> Messages | AlikExpress</title></head>
<header class="page-header">
    <h2><?php echo $say ?> - Messages</h2>
</header>

<!-- start: page -->
<div class="row">
    <div id="messageAlert" class="com-md-12"></div>
    <?php
    foreach ($v as $msg) {
        ?>
        <div class="col-md-6">
            <form>
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        </div>

                        <h2 class="panel-title"><?php echo ucfirst($msg['sender_name']) ?>'s&nbsp;&nbsp;message</h2>
                    </header>

                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <input type="text" name="firstName" placeholder="Sender First Name"
                                       class="form-control" value="<?php echo $msg['sender_name'] ?>">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-6">
                                <input type="text" name="email" placeholder="Sender Email" class="form-control" value="<?php echo $msg['sender_email'] ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <input type="text" name="email" placeholder="Message Subject" class="form-control" value="<?php echo $msg['message_subject'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="5" placeholder="Message Content"><?php echo $msg['message_content'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    <?php } ?>
</div>
<!-- end: page -->