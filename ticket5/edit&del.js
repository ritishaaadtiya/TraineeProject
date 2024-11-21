$(document).ready(function () {
  $(".edit").click(function () {
    let id = $(this).attr("userid");
    window.location.href = "edit_html.php?id=" + id;
  });

  $(".logout-btn").click(function () {
    let logout = confirm("Are you sure want to logout?");

    if (logout === true) {
      window.location.href = "./logout.php";
    }
  });

  $(".del").click(function () {
    let id = $(this).attr("userid");
    var confirmDelete = confirm("Are you sure you want to delete this user?");

    if (confirmDelete) {
      $.ajax({
        url: "delete.php",
        type: "POST",
        data: JSON.stringify({
          id: id,
        }),
        contentType: "application/json",
        success: function (response) {
          if (response.status == "success") {
            console.log(response.message);
            alert(response.message);
            window.location.href = "dashboard.php";
          } else {
            console.log(response.message);
          }
        },

        error: function (xhr) {
          alert(xhr.responseText);
        },
      });
    }
  });
});
