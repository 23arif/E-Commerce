$('#kategoriEkleBtn').on('click', function () {
    var datakategori = $('#kategoriEkleForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=kategoriEkle",
        type: "POST",
        data: datakategori,
        success: function (cevab) {
            $('#kategoriEkleAlert').html(cevab).hide().fadeIn(700);
        }
    });
})
$('#kategoriGuncelleBtn').on('click', function () {
    var datakategori = $('#kategoriGuncelleForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=kategoriGuncelle",
        type: "POST",
        data: datakategori,
        success: function (cevab) {
            $('#kategoriGuncelleAlert').html(cevab).hide().fadeIn(700);
        }
    });
})
$('#yGiris').on('click', function () {
    var datakategori = $('#yGirisForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=yGiris",
        type: "POST",
        data: datakategori,
        success: function (cevab) {
            $('#yGirisAlerti').html(cevab).hide().fadeIn(700);
        }
    });
})

function ParaFormat(Num) {
    Num += '';
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    x = Num.split(',');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    return x1 + x2;
}

$('#urunEkleBtn').on('click', function () {
    var data = new FormData($('#urunEkleForm')[0]);
    $.ajax({
        url: "ayarlar/islem.php?islem=urunEkle",
        type: "POST",
        data: data,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (cevab) {
            $('#urunEkleAlert').html(cevab).hide().fadeIn(700);
        }
    });
})
$('#urunGuncelleBtn').on('click', function () {
    var data = new FormData($('#urunGuncelleForm')[0]);
    $.ajax({
        url: "ayarlar/islem.php?islem=urunGuncelle",
        type: "POST",
        data: data,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (cevab) {
            $('#urunGuncelleAlert').html(cevab).hide().fadeIn(700);
        }
    });
})



