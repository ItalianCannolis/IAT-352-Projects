$(document).ready(function() {
    // Hands-on 1
    // Change the h2 background color on hover based on its type
    $('.generate_btn').on('click', function(event) {
        // Get the child of product item that is h2 tag
        //var header = $(this).children("h2");
        for (let i = 0; i < 12; i++) {
        var randomNum = getRandomInt(12);
        var start = "image";
        var header = document.getElementById(start.concat(i+1));
        console.log(header);
        // Based on the h2's data-type, change the css color accordingly
        switch(randomNum) {
          case 0:
            header.src = "Img/across_the_spiderverse_cover_art.jpg";
            //header.css({"src": "Img/across_the_spiderverse_cover_art.jpg"});
            break;
          case 1:
            header.src = "Img/beatles-abbeyroad.jpg";
            //header.css({"src": "Img/beatles-abbeyroad.jpg"});
            break;
          case 2:
            header.src = "Img/damn.jpg";
            //header.css({"src": "Img/damn.jpg"});
            break;
          case 3:
            header.src ="Img/darksideofthemoon.jpg";
            //header.css({"src": "Img/darksideofthemoon.jpg"});
            break;
          case 4:
            header.src ="Img/dragon_force.jpg";
            //header.css({"src": "Img/adragon_force.jpg"});
            break;
          case 5:
            header.src ="Img/Drake_nothing_was_the_same.jpg";
            //header.css({"src": "Img/Drake_nothing_was_the_same.jpg"});
            break;
          case 6:
            header.src ="Img/Drake_Views_cover.jpg";
            //header.css({"src": "Img/Drake_Views_cover.jpg"});
            break;
          case 7:
            header.src ="Img/Littlebitofmambo.jpg";
            //header.css({"src": "Img/Littlebitofmambo.jpg"});
            break;
          case 8:
            header.src ="Img/Spiderverse_cover_art.jpg";
            //header.css({"src": "Img/Spiderverse_cover_art.jpg"});
            break;
          case 9:
            header.src ="Img/Queensofthestoneage.jpg";
            //header.css({"src": "Img/Drake_Views_cover.jpg"});
            break;
          case 10:
            header.src ="Img/bad_album.jpg";
            //header.css({"src": "Img/Littlebitofmambo.jpg"});
            break;
          case 11:
            header.src ="Img/tyler-the-creator-igor.jpg";
            //header.css({"src": "Img/Spiderverse_cover_art.jpg"});
            break;
          default:
            header.src ="Img/across_the_spiderverse_cover_art.jpg";
            //header.css({"src": "Img/across_the_spiderverse_cover_art.jpg"});
            break;
        }

        }
    });


});


function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }