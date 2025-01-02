$(document).ready(function () {
    $(".button-primary").click(function () {
        let Isvalid = true;
        let email = $("#email").val().trim();
        let emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
        let validemail = emailPattern.test(email);
        if (email == "") {
            $("#emailres").html(
                "<span class = 'error-msg'>Please fill the value</span>"
            );
            Isvalid = false;
        } else if (!validemail) {
            $("#emailres").html(
                "<span class = 'error-msg'>Invalid email format</span>"
            );
            Isvalid = false;
        }
        if (Isvalid) {
            $.ajax({
                url: "/sendmail",
                method: "POST",
                contentType: "application/json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: JSON.stringify({
                    email: email,
                }),
                success: function (response) {
                    console.log(response);
                    if (response.status == "error") {
                        let data = response.error;
                        $("#emailres").html(
                            "<span class = 'error-msg'>" +
                                response.error.email +
                                "</span>"
                        );
                    } else {
                        console.log(response);
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
