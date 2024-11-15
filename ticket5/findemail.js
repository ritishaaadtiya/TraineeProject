$(document).ready(function () {
  $(".button-primary").click(function () {
    let email = $("#email").val().trim();
    let isvalid = true;
    $(".error-msg").remove();
    if (email == "") {
      $("#emailres").html(
        "<span class='error-msg'>Please fill the value</span>"
      );
      isvalid = false;
    }
    let emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
    let validemail = emailPattern.test(email);
    if (!validemail && email != "") {
      $("#emailres").html(
        "<span class='error-msg'>Invalid Email Format</span>"
      );
      isvalid = false;
    }
    if (isvalid) {
      $(".error-msg").remove();
      $.ajax({
        url: "checkmail.php",
        type: "POST",
        data: JSON.stringify({ email: email }),
        cotentType: "application/json",
        success: function (response) {
          if (response.status == "error") {
            let arr = response.Invalid;
            for (let i in arr) {
              $("#emailres").html(
                "<span class='error-msg'>" + arr[i] + "</span>"
              );
            }
          } else {
            let msg = response.Invalid;
            // console.log(msg.email);
            // window.location.href = 'mail.php?email='+encodeURIComponent(msg.email); ;
            // window.location.href =
            //   "./forgotpsw.php?email=" + encodeURIComponent(msg.email);
            $.ajax({
              url: "./mail.php",
              type: "POST",
              data: JSON.stringify({ email: response.Invalid.email }),
              contentType: "application/json",
              success: function (response) {
                if (response.status == "success") {
                  alert("Email sent successfully!");
                  window.location.href = "./login.php";
                } else {
                  console.log(response.message);
                }
              },
              error: function (xhr) {
                alert(xhr.responseText);
              },
            });
          }
        },
        error: function (xhr) {
          alert(xhr.responseText);
        },
      });
    }
  });
});
