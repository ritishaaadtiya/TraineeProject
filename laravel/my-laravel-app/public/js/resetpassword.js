$(document).ready(function () {
    $("#button-primary").click(function () {
        console.log("button clicked");
        let psw = $("#psw").val().trim();
        let confirmpsw = $("#confirm").val().trim();
        let email = $("#email").val().trim();
        let token = $("#token").val().trim();
        let Isvalid = true;
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
            console.log("data is valid sendng the ajax call");

            $.ajax({
                url: "/resetpassword",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: JSON.stringify({
                    email: email,
                    password: psw,
                    confirmpsw: confirmpsw,
                    token: token,
                }),
                contentType: "application/json",
                success: function (response) {
                    console.log(response);
                    window.location.href = "/login";
                },
                error: function (error, status, xhr) {
                    console.log(error);
                    console.log(status);
                },
            });
        }
    });
});
