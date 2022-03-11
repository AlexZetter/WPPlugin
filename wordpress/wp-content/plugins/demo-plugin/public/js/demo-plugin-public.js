/* let form = document.getElementById("demo-plugin-form");

form.addEventListener("submit", function (event) {
    event.preventDefault();
    let data = new FormData(form);

    // URL for sending async stuff to WordPress
    fetch("/wp-admin/admin-ajax.php", {
        method: "POST",
        body: data
    }).then(response => console.log(response));
}) */



console.log("Admin CSS!");

let apiURL = `https://api.nasa.gov/planetary/apod?api_key=FeNfI1SHwefIskZ6RoKA4YSVY6faPY1JUkXP2XCv`;

async function getNASAPictures() {
  let response = await fetch(apiURL);
  let data = await response.json();


let title = data.title;
let url = data.url;

let nasaInfo = {title, url};
console.log(title,url );


document.querySelector("#nasapicturepublic").innerHTML = `<img src=${nasaInfo.url}></img><p>${nasaInfo.title}</p>`;
}

getNASAPictures();

