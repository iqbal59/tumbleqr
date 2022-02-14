$(document).ready(function () {
  $(function () {
    $("#data-table").DataTable();
  });

  //-- show user role actions
  $(document).on("click", "#user", function () {
    $(".user_role_area").slideDown();
    $("this").checked();
    return false;
  });

  //-- hide user role actions
  $(document).on("click", "#admin", function () {
    $(".user_role_area").slideUp();
    $("this").checked();
    return false;
  });

  //-- ajax login user function
  $("#login-form").submit(function () {
    $.post(
      $("#login-form").attr("action"),
      $("#login-form").serialize(),
      function (json) {
        if (json.st == 0) {
          $("#login_pass").val("");
          swal({
            title: "Error..",
            text: "Sorry your email or password is not correct !",
            type: "error",
            confirmButtonText: "Try Again",
          });
        } else {
          window.location = json.url;
        }
      },
      "json"
    );
    return false;
  });

  $("#showchallan").click(function () {
    $("#challan_form").attr("action", $("#sendchallanurl").val());
    $("#challan_form").attr("target", "_self");
    $("#challan_form").submit();
  });

  $("#sendchallan").click(function () {
    $("#challan_form").attr("action", $("#sendchallanurlmail").val());
    $("#challan_form").attr("target", "_self");
    $("#challan_form").submit();
  });

  $("#printchallan").click(function () {
    store_id = $("#store_id").val();
    if (store_id != "") {
      $("#challan_form").attr(
        "action",
        $("#sendchallanurlprint").val() + "?store_id=" + store_id
      );
      $("#challan_form").attr("target", "_self");
      $("#challan_form").submit();
    } else {
      alert("Select Store");
      return;
    }
  });
});
