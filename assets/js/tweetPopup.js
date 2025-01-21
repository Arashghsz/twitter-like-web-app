$(function () {



    $(document).on('click','.addTweetBtn',function () {

        $.ajax('/tweet/tweet_popup', {
            success: function (data) {
                $('.popupTweet').show();
                $('.popupTweet').html(data);
            }
        });
    });

    $(document).on('submit','#popupForm',function (event) {

            // stop submit the form, we will post it manually.
            event.preventDefault();

            // Create an FormData object
            let data = new FormData($(this)[0]);
            data.append('file',$('#file')[0].files[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "/tweet/tweet_popup_submit",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.popupTweet').hide();
                    location.reload();

                }

            });

        });



    $(document).on('keyup','.status',function () {

        let text = $(this).val();
        text = text.length;
        let count = 140 - text;

        if ( count >= 0 ){
            $('#count1').text(count);
            $('.tweet-error1').text("");

        } else {
            $('#count1').text(0);
            $('.tweet-error1').text("the length of text must be lower than 140 . ");
        }
    });
    $(document).on('click','.closeTweetPopup',function () {

$('.popup-tweet-wrap').hide()

    });





});