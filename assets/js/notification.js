$(function () {


    let get_notif_count = function () {

    $.ajax('/notification/get_notif_count', {
        dataType: 'json',
        success: function (data) {

            if ( data.notif_count > 0){
                $('#notifcount').html('<span class=\"span-i\">' +data.notif_count+'</span>');
                $('#notificationAudio')[0].play();
            }


        }
    });
};

setInterval(get_notif_count,5000);
get_notif_count();

});