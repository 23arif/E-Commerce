<?php
if(g('silme') == "ok"){
    echo '<div class="alert alert-success">Silme islemi basariyla yekunlasdi</div>';
}elseif(g("silme")== "no"){
    echo '<div class="alert alert-danger">Silme islemi zamani xeta bas verdi!</div>';
}elseif(g("ekle")== "ok"){
    echo '<div class="alert alert-success">Elave etme islemi ugurla basa catdi.</div>';
}elseif(g("guncelle")== "ok"){
    echo '<div class="alert alert-success">Guncelleme islemi ugurla basa catdi.</div>';
}
?>