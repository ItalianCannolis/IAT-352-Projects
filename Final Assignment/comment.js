$(document).ready(function() {
    $('#comment-form').submit(function(event) {
        event.preventDefault(); 
// serialize
        var formData = $(this).serialize(); 
        $.post('add_comment.php', formData, function(response) {
// append the new comment
            $('#comments-container').append(response); 
            // clear textarea after sub
            $('textarea[name=commentText]').val('');
        });
    });
});
