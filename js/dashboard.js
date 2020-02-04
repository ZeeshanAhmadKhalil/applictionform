var request;
var applicationId;
$(document).ready(function () {

    var url_string = window.location.href;
    url = new URL(url_string);
    request = $.ajax({
        url: './include/getApplicationInformation.php',
        type: "POST"
    })

    request.done(function (response, textStatus, jqXHR) {
        $("#Table_data").html(response);
    });




    $("#newApplication").click(function () {
        console.log("hello");
        applicationId = create_UUID();
        var serializedData = "applicationId=" + applicationId;
        request = $.ajax({
            url: "./include/createApplication.php",
            type: "POST",
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR) {
            response=response.split(",_.")[0]
            window.location.href = './applicationform.php?applicationId=' + response;
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
        });

    });


    function create_UUID() {
        var dt = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = (dt + Math.random() * 16) % 16 | 0;
            dt = Math.floor(dt / 16);
            return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    }


    // $("#logoutButton").click(function (evenet) {
    //     console.log("button clicked");
    //     event.preventDefault();
    //     request = $.ajax({
    //         url: './include/logout.inc.php'
    //     })

    //     request.done(function (response, textStatus, jqXHR) {
    //         console.log(response)
    //         window.location.href = 'Signin.php';
    //     });
    // })
    // $("#logoutButton_employee").click(function (evenet) {
    //     console.log("button clicked");
    //     event.preventDefault();
    //     request = $.ajax({
    //         url: './include/logout.inc.php'
    //     })

    //     request.done(function (response, textStatus, jqXHR) {
    //         console.log(response)
    //         window.location.href = 'EmployeeSignin.php';
    //     });
    // })

});