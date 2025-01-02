$(document).ready(function () {
    // Validation rules
    const rules = {
        username: {
            required: true,
            minlength: 5,
            pattern: /^[^\d].*$/, // Should not start with a digit
            message:
                "Username must be at least 5 characters and not start with a number.",
        },
        email: {
            required: true,
            pattern: /^[^\s@]+@[^\s@]+\.(com|org)$/,
            message: "Invalid email format.",
        },
        psw: {
            required: true,
            minlength: 8,
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
                "Password must contain at least one digit, one uppercase letter, one lowercase letter, and one special character.",
        },
        confirm_psw: {
            required: true,
            match: "#psw",
            message: "Passwords do not match.",
        },
    };

    // Validate function
    function validate(field) {
        let value = $(field).val().trim();
        let fieldId = $(field).attr("id");
        let errorContainer = $("#" + fieldId + "res");
        console.log(errorContainer);
        // Clear previous errors
        errorContainer.html("");

        let fieldRules = rules[fieldId];
        console.log(fieldRules);
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
                    `<span class='error-msg'>Must be at least ${fieldRules.minlength} characters long.</span>`
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
            // Check match with another field
            if (fieldRules.match && value !== $(fieldRules.match).val()) {
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
        let username = $("#username").val().trim();
        let email = $("#email").val().trim();
        let password = $("#psw").val().trim();
        let confirmPassword = $("#confirm_psw").val().trim();
        console.log(confirmPassword);
        e.preventDefault();
        let isValid = true;

        $("input").each(function () {
            if (!validate(this)) {
                isValid = false;
            }
        });

        if (isValid) {
            $.ajax({
                url: "/validate",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: JSON.stringify({
                    username: username,
                    email: email,
                    password: password,
                    confirm_password: confirmPassword,
                }),
                contentType: "application/json",
                success: function (response) {
                    console.log(response);
                    if (response.status === "error") {
                        const errors = response.error_message;
                        for (let key in errors) {
                            $(`#${key}res`).html(
                                `<span class='error-msg'>${errors[key]}</span>`
                            );
                        }
                    } else {
                        alert(response.msg);
                        window.location.href = "/login";
                    }
                },
                error: function (xhr, error, status) {
                    console.log("Error:", error);
                    console.log("Status:", status);
                    console.log(xhr.responseText);
                },
            });
        }
    });
});
