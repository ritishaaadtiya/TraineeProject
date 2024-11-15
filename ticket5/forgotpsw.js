$(document).ready(function () {
  $("#button-primary").click(function () {
    let psw = $("#psw").val().trim();
    let confirmpsw = $("#confirm").val().trim();
    let email = $("#email").val().trim();
    let Isvalid = true;
    console.log(confirmpsw, psw);
    if (psw == "") {
      $("#pswres").html(
        "<span class = 'error-msg' style = 'color :red;'>Please enter password!</span>"
      );
      Isvalid = false;
      return Isvalid;
    }
    if (confirmpsw == " ") {
      $("#confirmres").html(
        "<span class = 'error-msg' style = 'color :red;'>Please enter confirm password!</span>"
      );
      Isvalid = false;
      return Isvalid;
    }

    $(".error-msg").remove();

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
    let validpass = validatePassword(psw);
    let confrmpassvalid = validatePassword(confirmpsw);
    if ((!validpass || psw.length < 8) && psw != "") {
      $("#pswres").html(
        "<span class = 'error-msg' style = 'color :red;'>Invalid password!</span>"
      );
      Isvalid = false;
    } else if (psw != confirmpsw) {
      $("#confirmres").html(
        "<span class = 'error-msg' style = 'color :red;'>password should be match!gggggg</span>"
      );
      Isvalid = false;
    }
    if (Isvalid == true) {
      $(".error-msg").remove();
      $.ajax({
        url: "resetpsw.php",
        type: "POST",
        data: JSON.stringify({
          email: email,
          password: psw,
          confirmpsw: confirmpsw,
        }),
        contentType: "application/json",
        success: function (response) {
          if (response.status == "success") {
            alert(response.message);
            console.log(response.message);
          } else {
            const arr = response.Invalid;
            for (let key in arr) {
              $("#" + key + "res").html(
                "<span class ='error-msg'>" + arr[key] + "</span>"
              );
            }
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    }
  });
});
