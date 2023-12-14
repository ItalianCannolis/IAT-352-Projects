$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); 

        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();

        // AJAX handiling form submission
        $.ajax({
            type: 'POST',
            //login php
            url: 'login.php',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                // think this handles response from the server
                if (response === 'success') {
                    //ake sure to redirect to the index page
                    window.location.href = 'index.php'; 
                } else {
                    $('#loginError').text('Invalid username or password');
                }
            },
            error: function() {
                $('#loginError').text('Error occurred during login');
            }
        });
    });
});
