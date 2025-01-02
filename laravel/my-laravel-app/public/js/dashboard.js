$(document).ready(function () {
    $(".create-btn").click(function () {
        window.location.href = "/create";
        // console.log("btn click");
        // var token = localStorage.getItem("Auth_token").trim();
        // console.log("Sending token:", token);
        // if (!token) {
        //     alert("Somthing went wrong Try again!");
        //     // window.location.href = "login";
        // }

        // $.ajax({
        //     url: "/check",
        //     method: "GET",
        //     headers: {
        //         Authorization: "Bearer " + token, // Ensure no extra spaces or line breaks in the token
        //     },
        //     contentType: "application/json",
        //     success: function (response) {
        //         if (response.status === "error") {
        //             console.log(response.error_msg);
        //             return; // Stop further execution if an error occurs
        //         }

        //         console.log("Token is valid");
        //         console.log(response.user);

        //         // If authentication is successful, redirect to '/create' page
        //         if (response.status === "success") {
        //             console.log("Redirecting to create page...");
        //             let createUrl = response.url; // Replace with your desired URL
        //             // Redirect to create page

        //         }
        //     },
        //     error: function (xhr, error, status) {
        //         console.log(token + "\n");
        //         console.log(error);
        //         console.log("status is :" + status);
        //         console.log("token is invalid" + xhr.responseJSON);
        //     },
        // });
    });
    $(".logout-btn").click(function () {
        //  logout logic
        $.ajax({
            url: "/logout",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response.user);
                console.log(response.msg);
                console.log(response.cookiename);
                window.location.href = "/login";
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });

    $(".edit").click(function () {
        let id = $(this).attr("data-id");
        window.location.href = "/update/" + id;
    });
    $(".del").click(function () {
        console.log("button clicked !");
        let id = $(this).attr("data-id");

        $.ajax({
            url: "/delete/" + id,
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response.msg);
                window.location.reload();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
