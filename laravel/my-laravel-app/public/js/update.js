$(document).ready(function () {
    var token = localStorage.getItem("Auth_token");
    console.log("TOKEN IS " + token);
    $(".btn").click(function () {
        $(".error-msg").remove();
        let Isvalid = true;
        let id = $(this).attr("data-id");
        let tasktitle = $("#task-title").val().trim();
        let taskdesc = $("#desc").val().trim();
        let taskduedate = $("#due-date").val().trim();
        let taskpriority = $("#priority").val().trim();
        let taskstatus = $("#status").val().trim();
        let taskAttachment = $("#attachment")[0].files[0];
        if (taskdesc == "") {
            $(".descerror").html(
                "<span class = 'error-msg'>Please fill the value </span>"
            );
            Isvalid = false;
        }
        if (tasktitle == "") {
            $(".titlerror").html(
                "<span class = 'error-msg'>Please fill the value </span>"
            );
            Isvalid = false;
        }
        if (Isvalid) {
            $(".error-msg").remove();
            var formData = new FormData();
            formData.append("tasktitle", tasktitle);
            formData.append("taskdesc", taskdesc);
            formData.append("taskduedate", taskduedate);
            formData.append("taskpriority", taskpriority);
            formData.append("taskstatus", taskstatus);
            formData.append("_method", "PUT");
            if (taskAttachment) {
                formData.append("taskattachment", taskAttachment); // Attach the file
            }
            for (const [key, value] of formData.entries()) {
                console.log(`${key}:`, value);
            }
            $.ajax({
                url: "/update/" + id,
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                    Authorization: "Bearer " + token,
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (response.status == "error") {
                        console.log(response.error_msg);
                    } else {
                        // alert("Task created successfully");
                        // window.location.href = "/dashboard";
                        console.log("task created");
                        console.log(response.token);
                        console.log(response.msg);
                        window.location.href = "/dashboard";
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        }
    });
});