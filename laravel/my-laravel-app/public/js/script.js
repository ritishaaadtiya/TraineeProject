$(document).ready(function () {
    $(".button-primary").click(function () {
        let username = $("#username").val().trim();
        let email = $("#email").val().trim();
        let psw = $("#psw").val().trim();
        let confirmpsw = $("#confirm-psw").val().trim();
        let Isvalid = true;

        $(".error-msg").remove();
        $("input").each(function () {
            if ($(this).val() == "") {
                let id = $(this).parent().next().attr("id");
                $(`#${id}`).html(
                    "<span class = 'error-msg'  style = 'color :red;'>Please fill the values!</span>"
                );
                Isvalid = false;
            }
        });

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
        let emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
        let validEmail = emailPattern.test(email);

        let validpass = validatePassword(psw);
        let confrmpassvalid = validatePassword(confirmpsw);
        if (!validEmail && email != "") {
            $("#emailres").html(
                "<span class = 'error-msg'  style = 'color :red;'>Invalid Email Format</span>"
            );
        }
        let userpattern = /^\d/;

        let validuser = userpattern.test(username);

        if (validuser == true || (username != "" && username.length < 4)) {
            $("#usernameres").html(
                "<span class = 'error-msg'  style = 'color :red;'>Atleast 5 character and not start with number</span>"
            );
            Isvalid = false;
        }
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
            //   Send Data to Server using ajax == If client-side validation passes, proceed with AJAX request
            $.ajax({
                url: "/validate",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({
                    username: username,
                    email: email,
                    password: psw,
                    confirmpsw: confirmpsw,
                }),
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.status == "error") {
                        // Display error messages for invalid fields
                        console.log(response.error_message);
                        const arr = response.error_message;
                        for (let key in arr) {
                            $("#" + key + "res").html(
                                "<span class ='error-msg'>" +
                                    arr[key] +
                                    "</span>"
                            );
                        }
                    } else if (response.status == "success") {
                        alert(response.msg);
                        // alert(response.Message);
                        window.location.href = "/login";
                    }
                },

                error: function (xhr) {
                    error = xhr.responseText;
                    console.log(error);
                },
            });
        }
    });
});
