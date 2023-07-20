import { createElement } from './vdom.js'
import {createDom,updateDom} from './dom.js'


let nextUnitOfWork = null;
let wipRoot = null;
let currentRoot = null; //valeur courante de notre arbre dom
let deletions = [] //tableau des éléments a supprimer
let hookIndex = null;
let wipFiber = null;

/**
 * Ajout la racine de travail en cours au niveau du dom
 */
function commitRoot() {
  deletions.forEach(commitWork)
  commitWork(wipRoot.child)
  currentRoot = wipRoot; //une fois que tout est commit on garde en mémoire l'arbre en cours de travail

  wipRoot = null;
}

function commitWork(fiber) {
  if (!fiber) {
    return;
  }
  let domParentFiber = fiber.parent;
  while (!domParentFiber.dom) {
    domParentFiber = domParentFiber.parent;
  }
  const domParent = domParentFiber.dom;
  if (fiber.effectTag == 'PLACEMENT' && fiber.dom != null) {
    domParent.appendChild(fiber.dom);
  } else if (fiber.effectTag == 'DELETION') {
    commitDeletion(fiber, domParent);
    return
  } else if (fiber.effectTag == 'UPDATE' && fiber.dom != null) {
    updateDom(fiber.dom, fiber.alternate.props, fiber.props);
    domParent.appendChild(fiber.dom);
  }
  
  commitWork(fiber.child);
  commitWork(fiber.sibling);
}

function commitDeletion(fiber, domParent) {
  if (fiber.dom) {
    domParent.removeChild(fiber.dom);
  } else {
    commitDeletion(fiber.child, domParent);
  }
}

function render(element, container) {
  
  wipRoot = {
    dom: container,
    props: {
      children:[element]
    },
    alternate: currentRoot //reference à l'arbre précedent
  }

  nextUnitOfWork = wipRoot;
  deletions=[]
  
}

//boucle de travail pour exec la tache quand navigateur inatif
function workLoop(deadline) {
  let shouldYield = false; //permet la mise en pause de la boucle de travail, si true la boucle de travail laisse le passage
  
  while (nextUnitOfWork && !shouldYield) { //si on a une tache a faire et que shouldyiel n'est pas true
    
    nextUnitOfWork = performUnitOfWork(nextUnitOfWork);
    shouldYield = deadline.timeRemaining() < 1 //si il reste + de 1ms on performe la tache sinon on passe shoudYield sur true ce qui bloque nos taches
  }
  

  if (!nextUnitOfWork && wipRoot) { //quand plus de tache a faire on lui demande de creer les différents élement dans le dom
  commitRoot();
  } 
  requestIdleCallback(workLoop);
}



requestIdleCallback(workLoop);


/**
 * Performe une tache et renvoie la tache suivante à faire
 * @param {object} fiber
 * @returns {object|null}
 */
function performUnitOfWork(fiber) {
  
  if (fiber.type instanceof Function) {
    updateFunctionComponent(fiber) //quand on a à faire à un composant fonction
  } else {
    updateHostComponent(fiber)
  }
  

  
  
  if (fiber.child) {//declaration de la prochaine unitofwork, ici l'enfant
    return fiber.child
  }

  let nextFiber = fiber
  while (nextFiber) {
    if (nextFiber.sibling) {
      return nextFiber.sibling//declaration de la prochaine unitofwork, ici le voisin
    }
    nextFiber=nextFiber.parent//si pas de voisin on remonte vers le parent
  }
  
  return null;
}


function updateFunctionComponent(fiber) {
  wipFiber = fiber;
  hookIndex = 0;
  wipFiber.hooks = [];
  const children = [fiber.type(fiber.props)];
  reconcileChildren(fiber,children)
}

function useState(initial) {
  const oldHook = wipFiber.alternate && wipFiber.alternate.hooks && wipFiber.alternate.hooks[hookIndex];
  const hook = {
    state: oldHook ? oldHook.state : initial
  }
  wipFiber.hooks.push(hook)

  const setState = state => {
    hook.state = state;
    render(currentRoot.props.children[0],currentRoot.dom);
  }

  hookIndex++;
  return [hook.state,setState]

  
}

function updateHostComponent(fiber) {

  
  if (!fiber.dom) { //si pas d'élément qui correzpond dans mon dom,on convertit l'element avec createDom
   
    fiber.dom = createDom(fiber)
  }

  

  const elements = fiber.props.children
  reconcileChildren(fiber,elements)
}


function reconcileChildren(wipFiber, elements) {
  let index = 0;
  let oldFiber = wipFiber.alternate && wipFiber.alternate.child //permet d'avoir l'enfant de l'ancien arbre
  let prevSibling = null;


  while (
    index < elements.length ||
    oldFiber != null
  ) {
    const element = elements[index]
    const sameType = oldFiber && element && element.type == oldFiber.type;
    let newFiber = null;
    //il y a eu modification du dom
    if (sameType) {
      newFiber = {
        type: element.type,
        props: element.props,
        parent: wipFiber,
        dom: oldFiber.dom,
        alternate: oldFiber,
        effectTag : 'UPDATE'
      };
    }
    //element doit etre rajouté
    if (element && !sameType) {
      newFiber = {
        type: element.type,
        props: element.props,
        parent: wipFiber,
        dom: null,
        alternate: null,
        effectTag : 'PLACEMENT'
      };
    }
    //on doit supprimer l'anciene fibre
    if (oldFiber && !sameType) {
      oldFiber.effectTag = 'DELETION' 
      deletions.push(oldFiber)
    }

    if (oldFiber) {
      oldFiber=oldFiber.sibling
    }
    
    
    if (index == 0) {//on ajoute l'enfant de la fibre actuel avec la newfiber

      wipFiber.child = newFiber;
      
    } else if(element) {
      prevSibling.sibling = newFiber; 
    }
    prevSibling = newFiber;//on garde le précedent voisin
    
    index++;
  }
}





window.React = {
  createElement,
  render,
  useState
  
}



function useIncrement() {
  const [n, setN] = React.useState(0);
  const increment = function () {
    setN(n + 1);
  }
  return [n, increment];
}

function useStateArray() {
  const [array, setArray] = React.useState([]);

  const addElement = function (element) {
    setArray(prevArray => [...prevArray, element]);
  };

  return [array, addElement];
}


function Compteur({ name }) {
  const [n, increment] = useIncrement()
  
  return <div>
    Compteur : {n}
    <button onclick={()=>increment()}>Incrementer</button>
  </div>
}


function FirsPage() {
  return(
  <div >
            <div className="mt-2 ">
                <h3 className="text-xl text-gray-900 font-semibold hover:underline">
                    Bienvenue sur l'installateur MovingHouse
                </h3>
                <p className="text-gray-400 mt-1 leading-relaxed">
                    Avant de nous lancer, nous allons avoir besoin de certaines informations sur votre base de données. Il va vous falloir réunir les informations suivantes pour continuer
              </p>
              <ul className="list-disc list-inside">
                <li>Nom de la base de donnée</li>
                <li>Adresse de la base de donnée</li>
                <li>Le port d'accès</li>
                <li>Nom d'utilisateur</li>
                <li>Le mot de passe</li>
              </ul>
            </div>           
    </div>
  )
}

  /** @jsx React.createElement */
  function FormDb({increment}) {
    function handleSubmit(event) {
      event.preventDefault();
      console.log(event.target.elements.host.value);
      const formData = {
        host: event.target.elements.host.value,
        dbname: event.target.elements.dbname.value,
        port: event.target.elements.port.value,
        user: event.target.elements.user.value,
        password: event.target.elements.password.value,
        email:event.target.elements.email.value,
        prefixe:event.target.elements.prefixe.value,
        
      };
      console.log(formData);
      fetch('/api/installer', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      })
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            alert('Veuillez vérifier les informations daccès à la base de données. Connexion impossible.')
          } else {
            increment();
            alert('Connexion Reussi ! Cliquez sur suivant');
            
          }
        })
        .catch(error => {
          console.error('Erreur lors de la requête API :', error);
        });
      
    }
  
    return (
      <div className=" p-4 py-6 sm:p-6 ">
      <form onSubmit={handleSubmit} className="space-y-5">
        <input type="text" name="host" placeholder="Hôte" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
        <input type="text" name="dbname" placeholder="Nom de la base de données" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
        <input type="text" name="port" placeholder="Port" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
        <input type="text" name="user" placeholder="Utilisateur" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
        <input type="password" name="password" placeholder="Mot de passe" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
        <input type="text" name="prefixe" placeholder="Prefixe de table" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
        <input type="text" name="email" placeholder="Email" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
        <button type="submit"className="px-3 mt-5 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">Envoyer</button>
        </form>
        </div>
    );
  }

  /** @jsx React.createElement */
function FormRoot({increment}) {
  function handleSubmit(event) {
    event.preventDefault();
    const formData = {
      email: event.target.elements.email.value,
      confirmEmail: event.target.elements.confirmEmail.value,
      pwd: event.target.elements.pwd.value,
      confirmPwd: event.target.elements.confirmPwd.value,
      firstName:event.target.elements.firstName.value,
      lastName:event.target.elements.lastName.value
      
    };
    console.log(formData);
    fetch('/api/createUser', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(formData),
    })
      .then(response => response.json())
      .then(data => {
        console.log(data)
        if (data.error) {
          alert('Validation Error: ' + data.error); // Show validation error to the user
        } else {
          increment();
          alert('Création du compte Admin réussi ! '); // Show success message to the user
        }
      })
      .catch(error => {
        console.error('Erreur lors de la requête API :', error);
      });
    
  }

  return (
    <div className=" p-4 py-6 sm:p-6 ">
    <form onSubmit={handleSubmit} className="space-y-5">
      <input type="text" name="lastName" placeholder="Nom" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <input type="text" name="firstName" placeholder="Prenom" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <input type="text" name="email" placeholder="Email" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <input type="text" name="confirmEmail" placeholder="Confirmer votre email" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <input type="password" name="pwd" placeholder="Mot de passe" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
      <input type="password" name="confirmPwd" placeholder="Confirmez le mot de passe" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
      <button type="submit"className="px-3 mt-5 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">Envoyer</button>
      </form>
      </div>
  );
}

  /** @jsx React.createElement */
  function VerifyRoot({increment}) {
    function handleSubmit(event) {
      event.preventDefault();
      const formData = {
        code: event.target.elements.code.value,
      };
      console.log(formData);
      fetch('/api/verifyUser', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      })
        .then(response => response.json())
        .then(data => {
          console.log(data)
          if (data.error) {
            alert('Validation Error: ' + data.error); 
          } else {
            increment();
            alert('Le code est Valide'); 
          }
        })
        .catch(error => {
          console.error('Erreur lors de la requête API :', error);
        });
      
    }
  
    return (
      <div className=" p-4 py-6 sm:p-6 ">
      <form onSubmit={handleSubmit} className="space-y-5">
       
        
        <input type="number" name="code" placeholder="Confirmez le mot de passe" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
        <button type="submit"className="px-3 mt-5 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">Envoyer</button>
        </form>
        </div>
    );
  }

  /** @jsx React.createElement */
  function FinalStep() {
    const redirectToHomePage = () => {
      window.location.href = "/";
    };
  
    return (
      <div className="flex flex-col items-center gap-3">
        <h2>L'installation est terminée</h2>
        <button
          className="px-7 py-4 text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg"
          onClick={redirectToHomePage}
        >
          Allez vers le site
        </button>
      </div>
    );
  }


 /** @jsx React.createElement */
 function App() {
   const [n, increment] = useIncrement();
   

   console.log(n);
   
 

   function renderContent() {
    
    switch (n) {
      case 0:
        return (
          <FirsPage />
        );
      case 1:
        return <FormDb increment={increment}/>;
      case 2:
        return <FormRoot increment={increment}/>;
      case 3:
        return <VerifyRoot increment={increment}/>;
      case 4:
        return <FinalStep />;
      default:
        return (
          <FirsPage />
        );
    }
  }

  return (
    <div className="w-full h-[800px] flex flex-col items-center justify-center bg-gray-50 sm:px-4">
      <div className="w-full space-y-6 text-gray-600 sm:max-w-md">
      <div className="text-center">
                    
                    <div className="mt-5 space-y-2">
                        <h3 className="text-gray-800 text-2xl font-bold sm:text-3xl">Installation</h3>
                       
                    </div>
                </div>
        <div className="bg-white shadow p-4 py-6 sm:p-6 sm:rounded-lg">
          <div>
             {renderContent()}
          </div>
         

          <div className="mt-5 flex justify-around">
             
              <button onclick={()=>increment()}
                className="px-3 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">
                Suivant
              </button>
            </div>
        </div>
        
      </div>
      
    </div>
    
  )
}

React.render(<App />, document.getElementById('root'));

// function step1() {
//   /** @jsx React.createElement */
//   const element2 = (
//     <div id="foo">
//       <Compteur name={"jason"}/>
//       <button onclick={step2}>En savoir plus !</button>
//     </div>
//   )
//   React.render(element2, document.getElementById('root'));
// }




// function step2() {
//   /** @jsx React.createElement */
//   const element2 = (
//     <div id="foo">
//       <h1>poage2</h1>
//       <button onclick={step1}>En savoir plus !</button>
     
//     </div>
//   )
  
//   React.render(element2, document.getElementById('root'));
// }

// step1();


