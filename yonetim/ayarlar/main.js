//Settings
$('#settingsBtn').on('click', function () {
    var data = $('#settingsForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=settings",
        type: "POST",
        data: data,
        success: function (response) {
            $('#settingsAlert').html(response).hide().fadeIn(700);
        }
    })
})
//--Settings

//Category
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
//--Category

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

//Products
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
//--Products

// Advertisements
$('#addAdsBtn').on('click', function () {
    var data = new FormData($('#addAdsForm')[0]);
    $.ajax({
        url: "ayarlar/islem.php?islem=addAds",
        type: 'POST',
        data: data,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#addAdsAlert').html(response).hide().fadeIn(700);
        }
    })
})
$('#updateAdsBtn').on('click', function () {
    var data = $('#adsUpdateForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=updateAds",
        type: "POST",
        data: data,
        success: function (response) {
            $('#adsUpdateAlert').html(response).hide().fadeIn(700);
        }
    });
})
//--Advertisements

//Slide
$('#addSlideBtn').on('click', function () {
    var data = new FormData($('#addSlideForm')[0]);
    $.ajax({
        url: "ayarlar/islem.php?islem=addSlide",
        type: "POST",
        data: data,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#addSlideAlert').html(response).hide().fadeIn(700);
        }
    });
})
$('#slideUpdateBtn').on('click', function () {
    var data = $('#slideUpdateForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=updateSlide",
        type: "POST",
        data: data,
        success: function (cevab) {
            $('#slideUpdateAlert').html(cevab).hide().fadeIn(700);
        }
    });
})
//--Slide

//Slide Toggle
$('#slide_toggle').on('change', function () {
    var data = $('#slideToggleForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=slideToggle",
        type: "POST",
        data: data,
        success: function (response) {
            $('#slideToggleAlert').html(response).hide().fadeIn(700);
        }
    })
})
//--Slide Toggle

// Profile
$('#profileBtn').on('click',function () {
    var data = $('#profileForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=profileEdit",
        type: "POST",
        data: data,
        success: function (response) {
            if(response == 'yes'){
                $('#default-success').click();
            }else if(response== 'fill'){
                $('#default-notice').click();
            }else if(response== 'invalidEmail'){
                $('#default-invalidEmailNotice').click();
            }else if(response == 'invalidPass'){
                $('#default-invalidPassNotice').click();
            }
        }
    })
})
// --Profile