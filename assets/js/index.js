// entry

(function ($) {
  "use strict";


    // Toggle with login & register
    $("#registerForm").hide();


    $("#registerClick").click(()=>{
        $("#registerForm").toggle(500);
        $("#loginForm").toggle(500);
    })
    $("#loginClick").click(()=>{
        $("#registerForm").toggle(500);
        $("#loginForm").toggle(500);
    })
    // Toggle with login & register
  /*==================================================================
    [ Validate ]*/
  // var input = $(".validate-input .input100");

  // $(".validate-form").on("submit", function () {
  //   var check = true;

  //   for (var i = 0; i < input.length; i++) {
  //     if (validate(input[i]) == false) {
  //       showValidate(input[i]);
  //       check = false;
  //     }
  //   }

  //   return check;
  // });

  // $(".validate-form .input100").each(function () {
  //   $(this).focus(function () {
  //     hideValidate(this);
  //   });
  // });

  // function validate(input) {
  //     if ($(input).val() == "") {
  //       return true;
  //     }
  //   }

  // function showValidate(input) {
  //   var thisAlert = $(input).parent();

  //   $(thisAlert).addClass("alert-validate");
  // }

  // function hideValidate(input) {
  //   var thisAlert = $(input).parent();

  //   $(thisAlert).removeClass("alert-validate");
  // }
})(jQuery);
// entry
