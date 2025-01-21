$(function () {

    var timmer;
    var getmsg;
    var autoScroll;

    $(document).on('click','#messagePopup',function () {

            $.ajax('/message/message_popup', {
                success: function (data) {
                    $('.popupTweet').show();
                    $('.popupTweet').html(data);
                }
            });
    });

    $(document).on('keyup','.search-user',function () {

        let search = $(this).val();

        if (search.length > 0){
            $.ajax('/message/message_search', {
                type: 'POST',
                data: {
                    search: search
                },
                success: function (data) {
                    $('.message-recent').html(data);
                }
            });
        }

    });

    $(document).on('click','.people-message',function () {

        let user_id = $(this).data('userid');


        $.ajax('/message/chat_page_popup', {
            type: 'POST',
            data: {
                user_id: user_id
            },
            success: function (data) {
                $('.popupTweet').show();
                $('.popupTweet').html(data);

                if (autoScroll){
                    scrolldown();
                }

                $('#chat').on('scroll',function () {

                    if ($(this).scrollTop() < this.scrollHeight - $(this).height()){
                        autoScroll = false;
                    }else{
                        autoScroll = true;
                    }
                });
            }
        });

        getmsg = function () {

            $.ajax('/message/message_list', {
                type: 'POST',
                data: {
                    user_id: user_id
                },
                success: function (data) {
                    $('.main-msg-inner').html(data);

                    if (autoScroll){
                        scrolldown();
                    }

                    $('#chat').on('scroll',function () {

                        if ($(this).scrollTop() < this.scrollHeight - $(this).height()){
                            autoScroll = false;
                        }else{
                            autoScroll = true;
                        }
                    });
                }
            });



        };

        timmer = setInterval(getmsg,2000);
        getmsg();

        autoScroll = true;
        scrolldown = function () {
            let selctor =  $('#chat');
            selctor.scrollTop(selctor[0].scrollHeight)
        }

    });



    $(document).on('click','.back-messages',function () {

        clearInterval(timmer);

        $.ajax('/message/message_popup', {
            success: function (data) {
                $('.popupTweet').show();
                $('.popupTweet').html(data);
            }
        });
    });

    $(document).on('click','.close-msgPopup ',function () {

        clearInterval(timmer);

        $('.popupTweet').hide();
        location.reload();

    });

    $(document).on('click','.fa-times',function () {

        location.reload();

    });


    $(document).on('submit',' #msgpopupForm',function () {


        // stop submit the form, we will post it manually.
        event.preventDefault();

        // Create an FormData object
        let data = new FormData($(this)[0]);
        data.append('file',$('#msg-upload')[0].files[0]);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/message/send_msg",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function () {
                $('#msg').val("");
                getmsg();

            }

        });

    });

    $(document).on('click',' .deleteMsg',function () {

       let id = $(this).data('msgid');

       $('.message-del-inner').height('150px');


        $(document).on('click',' .delete',function () {

            $.ajax('/message/delete_message', {
                type: 'POST',
                data: {
                    id: id
                },
                success: function (data) {
                    $('.message-del-inner').height('0px');
                    getmsg();
                }
            });


        });

    });

    $(document).on('click',' .cancel',function () {

        $('.message-del-inner').height('0px');


    });


    get_count = function () {

        $.ajax('/message/msg_count', {
            dataType: 'json',
            success: function (data) {

                if ( data.count_message > 0){
                    $('#msgcount').html('<span class=\"span-i\">' +data.count_message+'</span>');
                    $('#messageAudio')[0].play();
                }


            }
        });
    };

    setInterval(get_count,5000);
    get_count();

});