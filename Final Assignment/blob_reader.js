$(document).ready(function() {
// Hands-on 2
  $('.generate_btn').on('click', function(event) {
    // Make sure clicking this button will not redirect the page
    event.preventDefault();

    // Get the parent with data-prod_id
    //var product_id = $(this).parents('li').data().prod_id;
    var product_id = 5864;

    
    $.ajax({
      url: 'http://localhost/Iat-352-projects/Final%20Assignment/cover_art_getter.php',
      data: {id: product_id},
      success: function(res) {
        //console.log(res);
        console.log("success");
        //alert(res);

    }

    })
    .done(function(res) {
      //alert(res);
      console.log('done');
    })
    .fail(function(res) {
      //console.log(res);
      console.log("error");
    })
    


    $.get('http://localhost/Iat-352-projects/Final%20Assignment/cover_art_getter.php',blobToFile(image,"test.jpg"));

  })

});

function blobToFile(theBlob, fileName){
  //A Blob() is almost a File() - it's just missing the two properties below which we will add
  theBlob.lastModifiedDate = new Date();
  theBlob.name = fileName;
  return theBlob;
}