import { BrowserLink } from "../components/BrowserRouter.js";

export default function Page3() {
  const component = {
    type: "div",
    children: [
      BrowserLink("Page 2", "/page2"),
      {
        type: "p",
        children: ["Texte de présentation"],
      },
      {
        type: "button",
        attributes: {
          type: "button",
        },
        events: {
          click: () => {
            renderPage(Page1Form(), true);
          },
        },
        children: ["Suivant"],
      },
    ],
  };

  return component;
}

function Page1Form() {
  const component = {
    type: "div",
    children: [
      BrowserLink("Page 2", "/page2"),
      {
        type: "p",
        children: ["Texte deddd présentation"],
      },
      {
        type: "button",
        attributes: {
          type: "button",
        },
        events: {
          click: () => {
            renderPage(Page1Form(), true);
          },
        },
        children: ["Suivant"],
      },
    ],
  };

  return component;
}

function handleSubmit(event) {
  event.preventDefault();

  // Traitez les données du formulaire

  // Appelez renderPage avec le composant de la page suivante et false pour masquer le formulaire
  renderPage(Page1(), false);
}


function renderPage(component, showForm) {
  const pageElement = document.createElement("div");
  root.innerHTML = ""; // Effacer le contenu précédent

  if (showForm) {
    const form = document.createElement("form");
    form.addEventListener("submit", handleSubmit);

    // Ajoutez ici les éléments de votre formulaire

    pageElement.appendChild(form);
  } else {
    pageElement.appendChild(component);
  }

  root.appendChild(pageElement);
}
