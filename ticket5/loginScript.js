$(document).ready(function () {
  $(".button-primary").click(function () {
    let email = $("#email").val().trim();
    let password = $("#psw").val().trim();
    let Isvalid = true;
    $(".error-msg").remove();
    // $("input").each(function () {
    //   if ($(this).val() == "") {
    //     let id = $(this).next().attr("id");
    //     $("#" + id).html(
    //       "<span class = 'error-msg'>Please fill the value</span>"
    //     );
    //     Isvalid = false;
    //   }
    // });
    let emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
    let validemail = emailPattern.test(email);
    function validatePassword(password) {
      let hasDigit = false;
      let hasUppercase = false;
      let hasLowercase = false;
      let hasSpecialChar = false;
      const specialChars = "!@#$%^&*()_+-=[]{}|;:'\",.<>?/`~";

      // Iterate through each character in the password
      for (const char of password) {
        // Check if the character is a digit
        if (char >= "0" && char <= "9") {
          hasDigit = true;
        }
        // Check if the character is an uppercase letter
        else if (char >= "A" && char <= "Z") {
          hasUppercase = true;
        }
        // Check if the character is a lowercase letter
        else if (char >= "a" && char <= "z") {
          hasLowercase = true;
        }
        // Check if the character is a special character
        else if (specialChars.includes(char)) {
          hasSpecialChar = true;
        }
      }

      // Return true if all conditions are met
      return hasDigit && hasUppercase && hasLowercase && hasSpecialChar;
    }
    let validpassword = validatePassword(password);
    if (!validemail && email != "") {
      $("#emailres").html(
        "<span class = 'error-msg'>Invalid email format</span>"
      );
      Isvalid = false;
    }
    if ((!validpassword || password.length < 6) && password != "") {
      $("#pswres").html("<span class = 'error-msg'>Invalid password</span>");
      Isvalid = false;
    }
    if (Isvalid) {
      $(".error-msg").remove();
      $.ajax({
        url: "loginValidate.php",
        type: "POST",
        data: JSON.stringify({
          email: email,
          password: password,
        }),
        contentType: "application/json",
        success: function (response) {
          if (response.status == "error") {
            let data = response.Invalid;
            for (let val in data) {
              $("#" + val + "res").html(
                "<span class = 'error-msg'>" + data[val] + "</span>"
              );
            }
          } else {
            alert(response.message);
          }
        },
        error: function (xhr) {
          console.log(xhr.responseText);
        },
      });
    }
  });
});
