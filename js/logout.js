var request
$(document).ready(function () {
    $("#logoutButton").click(function (evenet) {
        console.log("button clicked");
        event.preventDefault();
        request = $.ajax({
            url: './include/logout.inc.php'
        })

        request.done(function (response, textStatus, jqXHR) {
            console.log(response)
            window.location.href = 'Signin.php';
        });
    })
    $("#logoutButton_employee").click(function (evenet) {
        console.log("button clicked");
        event.preventDefault();
        request = $.ajax({
            url: './include/logout.inc.php'
        })

        request.done(function (response, textStatus, jqXHR) {
            console.log(response)
            window.location.href = 'EmployeeSignin.php';
        });
    })
})