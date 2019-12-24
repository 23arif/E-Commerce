<!-- start: page -->
<header class="page-header">
    <h2>User Control</h2>
</header>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">User Control Table</h2>
            </header>
            <div class="panel-body">
                <?php include 'inc/alert.php' ?>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                    <tr>
                        <th>Ip</th>
                        <th>Current location</th>
                        <th>Previous location</th>
                        <th>Browser Language</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $veri = $db->prepare("SELECT id,MAX(id) as son_id FROM ziyaretcitakip group by ziyaretci_ip");
                    $veri->execute(array());
                    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
                    foreach ($v as $za) {
                    $z_id = $za['son_id'];
                    $veri = $db->prepare("SELECT *FROM ziyaretcitakip where id='$z_id'");
                    $veri->execute(array());
                    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
                    foreach ($v as $user) {
                    ?>

                    <tr class="gradeX">
                        <td><?php echo $user['ziyaretci_ip'] ?></td>
                        <td><?php echo $user['ziyaretci_bulundugu'] ?></td>
                        <td><?php echo $user['ziyaretci_geldigi'] ?></td>
                        <td><?php echo $user['ziyaretci_dil'] ?></td>
                        <td><?php echo $user['ziyaretci_zaman'] ?></td>
                        <td><?php echo onlinemi($user['ziyaretci_ip']) == 1 ? '<span class="label label-success">Online</span>' : '<span class="label label-danger">Offline</span>'; ?></td>

                    </tr>
                    <?php }
                    } ?>

                    </tbody>
                </table>
            </div>
        </section>

    </div>

</div>
