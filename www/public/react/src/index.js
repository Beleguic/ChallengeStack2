import { createElement } from './vdom.js'
import {createDom,updateDom} from './dom.js'


let nextUnitOfWork = null;
let wipRoot = null;
let currentRoot = null; //valeur courante de notre arbre dom
let deletions=[] //tableau des éléments a supprimer

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
  const domParent = fiber.parent.dom
  if (fiber.effectTag == 'PLACEMENT' && fiber.dom != null) {
    domParent.appendChild(fiber.dom);
  } else if (fiber.effectTag == 'DELETION') {
    domParent.removeChild(fiber.dom)
    return
  } else if (fiber.effectTag == 'UPDATE' && fiber.dom != null) {
    updateDom(fiber.dom,fiber.alternate.props,fiber.props)
  }
  
  commitWork(fiber.child);
  commitWork(fiber.sibling);
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
  
  if (!fiber.dom) { //si pas d'élément qui correzpond dans mon dom,on convertit l'element avec createDom
   
    fiber.dom = createDom(fiber)
  }

  

  const elements = fiber.props.children
  reconcileChildren(fiber,elements)
  

  
  
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
  render
  
}


function step1() {
  /** @jsx React.createElement */
  const element2 = (
    <div id="foo">
      <h1>Bienvenue sur le site</h1>
      <button onclick={step2}>En savoir plus !</button>
    </div>
  )
  React.render(element2, document.getElementById('root'));
}




function step2() {
  /** @jsx React.createElement */
  const element2 = (
    <div id="foo">
      <h1>poage2</h1>
      <button onclick={step1}>En savoir plus !</button>
     
    </div>
  )
  
  React.render(element2, document.getElementById('root'));
}

step1();


