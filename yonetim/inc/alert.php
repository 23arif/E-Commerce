<?php
if(g('silme') == "ok"){
    echo '<div class="alert alert-success text-center">Deleted successfully</div>';
}elseif(g("silme")== "no"){
    echo '<div class="alert alert-danger text-center">Error while deleting!</div>';
}elseif(g("ekle")== "ok"){
    echo '<div class="alert alert-success text-center">Added successfully.</div>';
}elseif(g("guncelle")== "ok"){
    echo '<div class="alert alert-success text-center">Updated successfully.</div>';
}
?>