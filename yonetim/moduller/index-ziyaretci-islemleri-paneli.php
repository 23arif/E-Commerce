<?php
include "../../ayarlar/function.php";
$veri = $db->prepare("SELECT id,MAX(id) as son_id FROM ziyaretcitakip group by ziyaretci_ip ORDER BY id desc");
$veri->execute(array());
$v = $veri->fetchALL(PDO::FETCH_ASSOC);
?>
<div class="col-lg-6 col-md-12">
    <section class="panel">
        <header class="panel-heading panel-heading-transparent">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>

            <h2 class="panel-title">Visitor Operations</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none">
                    <thead>
                    <tr>
                        <th>IP</th>
                        <th>Current Location</th>
                        <th>Status</th>
                        <th>Last Movement</th>
                        <th>Browser Language</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach ($v as $za) {
                        $z_id = $za['son_id'];
                        $veri = $db->prepare("SELECT *FROM ziyaretcitakip where id='$z_id'");
                        $veri->execute(array());
                        $v = $veri->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($v as $z) {
                            ?>

                            <tr>
                                <td><?php echo $z['ziyaretci_ip'] ?></td>
                                <td><?php echo $z['ziyaretci_bulundugu'] ?></td>
                                <td><?php echo onlinemi($z['ziyaretci_ip']) == 1 ? '<span class="label label-success">Online</span>' : '<span class="label label-danger">Offline</span>'; ?></td>
                                <td><?php echo $z['ziyaretci_zaman'] ?></td>
                                <td><?php echo $z['ziyaretci_dil'] ?></td>
                            </tr>

                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
