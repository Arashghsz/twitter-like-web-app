$(function () {

    $(document).on('click','#save',function () {

        $('#editForm').submit();

    });

    $(document).on('change','#file-up',function () {

         $('#profileCoverForm').submit();

    });

    $(document).on('change','#profileImage',function () {

         $('#profileImageFrom').submit();

    });

    $(document).on('click','#removeProfileImage',function () {


        $.ajax('/user/removeProfileImage', {
            type: 'POST',
            success: function (data) {
               location.href='/user/profileEdit';
            }
        });

    });





});