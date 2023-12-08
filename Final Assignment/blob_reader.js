var xhr = new XMLHttpRequest();
xhr.open("GET", "cover");
xhr.responseType = "blob";
xhr.onload = response;
xhr.send();

function response(e) {
    var urlCreator = window.URL || window.webkitURL;
    var imageUrl = urlCreator.createObjectURL(this.response);
    document.querySelector("#image").src = imageUrl;
 }