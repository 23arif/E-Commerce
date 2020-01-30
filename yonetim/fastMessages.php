<?php
$id = g('id');
$veri = $db->prepare("SELECT *FROM message where id=? ");
$veri->execute(array($id));
$v = $veri->fetch(PDO::FETCH_ASSOC);
?>
<head><title><?php echo ucfirst($v['sender_name']) ?>'s&nbsp;&nbsp;message</title></head>
<header class="page-header">
    <h2>Messages</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-md-6 col-lg-offset-3">
        <form>
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>

                    <h2 class="panel-title"><?php echo ucfirst($v['sender_name']) ?>'s&nbsp;&nbsp;message</h2>
                </header>

                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <input type="text" name="firstName" placeholder="Sender First Name"
                                   class="form-control" value="<?php echo $v['sender_name'] ?>">
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>

                        <div class="col-lg-6">
                            <input type="text" name="email" placeholder="Sender Email" class="form-control" value="<?php echo $v['sender_email'] ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <input type="text" name="email" placeholder="Message Subject" class="form-control" value="<?php echo $v['message_subject'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" placeholder="Message Content"><?php echo $v['message_content'] ?></textarea>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
<!-- end: page -->