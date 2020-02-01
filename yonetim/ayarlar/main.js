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
        // async: false,
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
$('#profilePhotoBtn').on('click', function () {
    var data = new FormData($('#profilePhotoForm')[0]);
    $.ajax({
        url: "ayarlar/islem.php?islem=profilePhotoEdit",
        type: "POST",
        data: data,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response == 'yes') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Congratulations !',
                    text: 'Profile picture updated successfully.',
                    type: 'success',
                    addclass: 'notification-primary',
                    icon: 'fa fa-check-circle',
                    width: '350px'
                });
                setTimeout(function () {
                    window.location.href = "?do=profile";
                }, 2000);
            } else if (response == 'error') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Error',
                    text: 'Error Found During Update.',
                    type: 'error',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning'
                });
            }else if (response == 'fill') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Warning',
                    text: 'Please,select image for updating profile photo.',
                    type: 'warning',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning',
                    width: '400px'

                });
            }else if (response == 'oversize') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Warning',
                    text: 'Image could not be bigger than <strong>1mb</strong>',
                    type: 'warning',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning',
                    width: '350px'
                });
            }
        }
    })
})

$('#profileBtn').on('click', function () {
    var info = $('#profileInfoForm').serialize();

    $.ajax({
        url: "ayarlar/islem.php?islem=profileInfoEdit",
        type: "POST",
        data: info,
        success: function (response) {
            if (response == 'yes') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Congratulations !',
                    text: 'Changes updated successfully.',
                    type: 'success',
                    addclass: 'notification-primary',
                    icon: 'fa fa-check-circle'
                });
                setTimeout(function () {
                    window.location.href = "?do=profile";
                }, 2000);
            } else if (response == 'error') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Error',
                    text: 'Error Found During Update.',
                    type: 'error',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning'
                });
            }else if (response == 'fill') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Warning',
                    text: 'Please,fill all blanks.',
                    type: 'warning',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning'
                });
            } else if (response == 'invalidEmail') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Warning',
                    text: 'Please,enter <strong>valid</strong> email address.',
                    type: 'warning',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning'
                });
            }
        }
    })
})

$('#profilePassBtn').on('click', function () {
    var data = $('#profilePassForm').serialize();
    $.ajax({
        url: "ayarlar/islem.php?islem=profilePassEdit",
        type: "POST",
        data: data,
        success: function (response) {
            if (response == 'yes') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Congratulations !',
                    text: 'Password updated successfully.',
                    type: 'success',
                    addclass: 'notification-primary',
                    icon: 'fa fa-check-circle'
                });
                setTimeout(function () {
                    window.location.href = "?do=profile";
                }, 2000);
            } else if (response == 'fill') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Warning',
                    text: 'Please,fill all blanks.',
                    type: 'warning',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning'
                });
            } else if (response == 'invalidP') {
                PNotify.removeAll();
                new PNotify({
                    title: 'Warning',
                    text: 'Please,enter <strong>valid</strong> password.',
                    type: 'warning',
                    addclass: 'notification-primary',
                    icon: 'fa fa-warning'
                });
            }
            }
        })
})
// --Profile
