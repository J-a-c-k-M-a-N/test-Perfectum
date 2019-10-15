$("#send").on("click", function() {

    let name = $.trim($("#name").val());
    let email = $("#email").val();
    let comment = $.trim($("#comment").val());

    const MIN_LENGTH_EMAIL = 4;
    const MIN_LENGTH_COMMENT = 2;

    /** Simple validation */
    if(email.length < MIN_LENGTH_EMAIL) {
        return $("#errorMess").html("<li>Enter your email address</li>");
    } else if(comment.length < MIN_LENGTH_COMMENT) {
        return $("#errorMess").html("<li>Comment should be at least 2 characters in length</li>");
    } else {
        $("#errorMess").text("");
    }
    $.ajax({
        url: '/create',
        type: 'POST',
        cache: false,
        data:  { json: JSON.stringify({'name': name, 'email': email, 'comment': comment}) },
        dataType: 'json',
        success: function(data) {

            $("#errorMess").text("");

           if (data) {

                /** The Page reload if the comment created*/
               if (data['status'] === 'Success') {
                   location.reload();
               }

                let errorList = "";
                for (key in data) {

                    errorList += "<li>" + data[key] + "</li></br>";
                }

                /** Print errors on page from back-end */
                $("#errorMess").html(errorList);
            }
            setTimeout(
                function() {
                    $("#errorMess").text("");
                }, 8000);
        },
    });
});