$(document).ready(function () {
    $(".btn").click(function () {
        $(".error-msg").remove();
        let Isvalid = true;
        let taskid = $("#task-id").val().trim();
        let tasktitle = $("#task-title").val().trim();
        let taskdesc = $("#desc").val().trim();
        let taskduedate = $("#due-date").val().trim();
        let taskpriority = $("#priority").val().trim();
        let taskstatus = $("#status").val().trim();
        if (taskid == "") {
            $(".iderror").html(
                "<span class = 'error-msg'>Please fill the value </span>"
            );
            Isvalid = false;
        }
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
            $.ajax({
                url: "/create",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: JSON.stringify({
                    taskid: taskid,
                    tasktitle: tasktitle,
                    taskdesc: taskdesc,
                    taskduedate: taskduedate,
                    taskpriority: taskpriority,
                    taskstatus: taskstatus,
                }),
                contentType: "application/json",
                success: function (response) {
                    if (response.status == "error") {
                        console.log(response.error_msg);
                    }
                    console.log(response.taskid);
                    console.log(response.msg);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        }
    });
});
