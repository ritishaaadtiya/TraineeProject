$(document).ready(function () {
    // Validation rules
    $("#eye-icon").click(function () {
        if ($("#psw").attr("type") == "password") {
            $("#psw").attr("type", "text");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            $("#psw").attr("type", "password");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });
    const rules = {
        email: {
            required: true,
            pattern: /^[^\s@]+@[^\s@]+\.(com|org)$/,
            message: "Invalid email format",
        },
        psw: {
            required: true,
            minlength: 6,
            custom: function (value) {
                let hasDigit = /\d/.test(value);
                let hasUppercase = /[A-Z]/.test(value);
                let hasLowercase = /[a-z]/.test(value);
                let hasSpecialChar = /[!@#$%^&*()_+\-=[\]{}|;:'",.<>?/`~]/.test(
                    value
                );
                return (
                    hasDigit && hasUppercase && hasLowercase && hasSpecialChar
                );
            },
            message:
                "Password must contain at least one digit, one uppercase, one lowercase, and one special character.",
        },
    };

    // Validate function
    function validate(field) {
        let value = $(field).val().trim();
        let fieldId = $(field).attr("id");
        let errorContainer = $("#" + fieldId + "res");

        // Clear previous errors
        errorContainer.html("");

        let fieldRules = rules[fieldId];
        if (fieldRules) {
            // Check required
            if (fieldRules.required && value === "") {
                errorContainer.html(
                    `<span class='error-msg'>Please fill the value</span>`
                );
                return false;
            }
            // Check pattern
            if (fieldRules.pattern && !fieldRules.pattern.test(value)) {
                errorContainer.html(
                    `<span class='error-msg'>${fieldRules.message}</span>`
                );
                return false;
            }
            // Check minlength
            if (fieldRules.minlength && value.length < fieldRules.minlength) {
                errorContainer.html(
                    `<span class='error-msg'>Password must be at least ${fieldRules.minlength} characters long</span>`
                );
                return false;
            }
            // Check custom logic
            if (fieldRules.custom && !fieldRules.custom(value)) {
                errorContainer.html(
                    `<span class='error-msg'>${fieldRules.message}</span>`
                );
                return false;
            }
        }

        return true;
    }

    // Event listeners for validation
    $("input").on("keyup change", function () {
        validate(this);
    });

    // Form submission
    $(".button-primary").click(function (e) {
        let email = $("#email").val().trim();
        let password = $("#psw").val().trim();
        let remember = $(".checkbox").prop("checked") ? 1 : 0;

        e.preventDefault();
        let isValid = true;

        $("input").each(function () {
            if (!validate(this)) {
                isValid = false;
            }
        });

        if (isValid) {
            $.ajax({
                url: "/login",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: JSON.stringify({
                    email: email,
                    password: password,
                    remember: remember,
                }),

                contentType: "application/json",

                success: function (response) {
                    console.log(response);
                    if (response.status == "error") {
                        console.log(response.error_message);
                        const msg = response.error_message;
                        $("#pswres").html(
                            "<span class ='error-msg'>" + msg + "</span>"
                        );
                    } else {
                        console.log(response);
                        window.location.href = "/dashboard";
                    }
                },
                error: function (xhr, error, status) {
                    console.log("error is :" + error);
                    console.log("status is :" + status);
                    console.log(xhr.responseText);
                },
            });
        }
    });
});
