import BrowserRouter from "./components/BrowserRouter.js";
import routes from "./routes.js";
var data;
function fetchData() {
    console.log("salut");
    fetch('/api/installer')
        .then(response => response.json())
        .then(data => {
            // Utilisez les données récupérées
            console.log(data);
        })
        .catch(error => {
            // Gérez les erreurs
            console.error('Une erreur:', error);
        });
}

fetchData();


const root = document.getElementById("root");
BrowserRouter(routes, root, root.dataset.baseurl);
