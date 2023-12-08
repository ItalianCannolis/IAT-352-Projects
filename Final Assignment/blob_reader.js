$(document).ready(function() {
// Hands-on 2
  $('.generate_btn').on('click', function(event) {
    // Make sure clicking this button will not redirect the page
    event.preventDefault();

    // Get the parent with data-prod_id
    //var product_id = $(this).parents('li').data().prod_id;
    var product_id = 5864;

    $.ajax({
      url: 'http://localhost/Iat-352-projects/Final%20Assignment/cover_art_collage.php',
      data: {id: product_id},
      success: function(res) {
        console.log(res);
        alert(res);
    }

    })
    .done(function(res) {
      alert(res);
    })
    .fail(function(res) {
      console.log(res);
      console.log("error");
    })

  })

});