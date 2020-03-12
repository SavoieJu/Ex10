function lireLaSuite(e) {

    let articleId = e.getAttribute("data-id");

    let articleState = e.getAttribute("data-state");

    if (articleState == "closed") {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            parsedRes = JSON.parse(this.responseText)
            console.log(parsedRes.content.rendered);

            fullArticle = document.querySelector(".nouvelle-full");

            // console.log(e.parentElement.parentElement);
            

            e.parentElement.parentElement.lastElementChild .insertAdjacentHTML("beforeend", parsedRes.content.rendered);
            e.setAttribute('data-state', 'opened');
        }
        };
        xhttp.open("GET", "http://localhost/sav/wp-json/wp/v2/posts/" + articleId + "", true);
        xhttp.send();
    } else {
        e.parentElement.parentElement.lastElementChild.innerHTML = "";
        e.setAttribute('data-state', 'closed');
    }
    
}