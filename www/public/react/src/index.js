function createElement(type, props, ...children) {
  
    return {
      type,
      props: {
        ...props,
        children: children.map(child =>
          typeof child === "object"
            ? child
            : createTextElement(child)
        ),
      },
    }
  }
  
  function createTextElement(text) {
    return {
      type: "TEXT_ELEMENT",
      props: {
        nodeValue: text,
        children: [],
      },
    }
  }
  
  function createDom(fiber) {
    const dom =
      fiber.type == "TEXT_ELEMENT"
        ? document.createTextNode("")
        : document.createElement(fiber.type)
  
    updateDom(dom, {}, fiber.props)
  
    return dom
  }
  
  const isEvent = key => key.startsWith("on")
  const isProperty = key =>
    key !== "children" && !isEvent(key)
  const isNew = (prev, next) => key =>
    prev[key] !== next[key]
  const isGone = (prev, next) => key => !(key in next)
  function updateDom(dom, prevProps, nextProps) {
    //Remove old or changed event listeners
    Object.keys(prevProps)
      .filter(isEvent)
      .filter(
        key =>
          !(key in nextProps) ||
          isNew(prevProps, nextProps)(key)
      )
      .forEach(name => {
        const eventType = name
          .toLowerCase()
          .substring(2)
        dom.removeEventListener(
          eventType,
          prevProps[name]
        )
      })
  
    // Remove old properties
    Object.keys(prevProps)
      .filter(isProperty)
      .filter(isGone(prevProps, nextProps))
      .forEach(name => {
        dom[name] = ""
      })
  
    // Set new or changed properties
    Object.keys(nextProps)
      .filter(isProperty)
      .filter(isNew(prevProps, nextProps))
      .forEach(name => {
        dom[name] = nextProps[name]
      })
  
    // Add event listeners
    Object.keys(nextProps)
      .filter(isEvent)
      .filter(isNew(prevProps, nextProps))
      .forEach(name => {
        const eventType = name
          .toLowerCase()
          .substring(2)
        dom.addEventListener(
          eventType,
          nextProps[name]
        )
      })
  }
  
  function commitRoot() {
    deletions.forEach(commitWork)
    commitWork(wipRoot.child)
    currentRoot = wipRoot
    wipRoot = null
  }
  
  function commitWork(fiber) {
    if (!fiber) {
      return
    }
  
    let domParentFiber = fiber.parent
    while (!domParentFiber.dom) {
      domParentFiber = domParentFiber.parent
    }
    const domParent = domParentFiber.dom
  
    if (
      fiber.effectTag === "PLACEMENT" &&
      fiber.dom != null
    ) {
      domParent.appendChild(fiber.dom)
    } else if (
      fiber.effectTag === "UPDATE" &&
      fiber.dom != null
    ) {
      updateDom(
        fiber.dom,
        fiber.alternate.props,
        fiber.props
      )
    } else if (fiber.effectTag === "DELETION") {
      commitDeletion(fiber, domParent)
    }
  
    commitWork(fiber.child)
    commitWork(fiber.sibling)
  }
  
  function commitDeletion(fiber, domParent) {
    if (fiber.dom) {
      domParent.removeChild(fiber.dom)
    } else {
      commitDeletion(fiber.child, domParent)
    }
  }
  
  function render(element, container) {
    wipRoot = {
      dom: container,
      props: {
        children: [element],
      },
      alternate: currentRoot,
    }
    deletions = []
    nextUnitOfWork = wipRoot
  }
  
  let nextUnitOfWork = null
  let currentRoot = null
  let wipRoot = null
  let deletions = null
  
  function workLoop(deadline) {
    let shouldYield = false
    while (nextUnitOfWork && !shouldYield) {
      nextUnitOfWork = performUnitOfWork(
        nextUnitOfWork
      )
      shouldYield = deadline.timeRemaining() < 1
    }
  
    if (!nextUnitOfWork && wipRoot) {
      commitRoot()
    }
  
    requestIdleCallback(workLoop)
  }
  
  requestIdleCallback(workLoop)
  
  function performUnitOfWork(fiber) {
    const isFunctionComponent =
      fiber.type instanceof Function
    if (isFunctionComponent) {
      updateFunctionComponent(fiber)
    } else {
      updateHostComponent(fiber)
    }
    if (fiber.child) {
      return fiber.child
    }
    let nextFiber = fiber
    while (nextFiber) {
      if (nextFiber.sibling) {
        return nextFiber.sibling
      }
      nextFiber = nextFiber.parent
    }
  }
  
  let wipFiber = null
  let hookIndex = null
  
  function updateFunctionComponent(fiber) {
    wipFiber = fiber
    hookIndex = 0
    wipFiber.hooks = []
    const children = [fiber.type(fiber.props)]
    reconcileChildren(fiber, children)
  }
  
  function useState(initial) {
    const oldHook =
      wipFiber.alternate &&
      wipFiber.alternate.hooks &&
      wipFiber.alternate.hooks[hookIndex]
    const hook = {
      state: oldHook ? oldHook.state : initial,
      queue: [],
    }
  
    const actions = oldHook ? oldHook.queue : []
    actions.forEach(action => {
      hook.state = action(hook.state)
    })
  
    const setState = action => {
      hook.queue.push(action)
      wipRoot = {
        dom: currentRoot.dom,
        props: currentRoot.props,
        alternate: currentRoot,
      }
      nextUnitOfWork = wipRoot
      deletions = []
    }
  
    wipFiber.hooks.push(hook)
    hookIndex++
    return [hook.state, setState]
  }
  
  function updateHostComponent(fiber) {
    if (!fiber.dom) {
      fiber.dom = createDom(fiber)
    }
    reconcileChildren(fiber, fiber.props.children)
  }
  
  function reconcileChildren(wipFiber, elements) {
    let index = 0
    let oldFiber =
      wipFiber.alternate && wipFiber.alternate.child
    let prevSibling = null
  
    while (
      index < elements.length ||
      oldFiber != null
    ) {
      const element = elements[index]
      let newFiber = null
  
      const sameType =
        oldFiber &&
        element &&
        element.type == oldFiber.type
  
      if (sameType) {
        newFiber = {
          type: oldFiber.type,
          props: element.props,
          dom: oldFiber.dom,
          parent: wipFiber,
          alternate: oldFiber,
          effectTag: "UPDATE",
        }
      }
      if (element && !sameType) {
        newFiber = {
          type: element.type,
          props: element.props,
          dom: null,
          parent: wipFiber,
          alternate: null,
          effectTag: "PLACEMENT",
        }
      }
      if (oldFiber && !sameType) {
        oldFiber.effectTag = "DELETION"
        deletions.push(oldFiber)
      }
  
      if (oldFiber) {
        oldFiber = oldFiber.sibling
      }
  
      if (index === 0) {
        wipFiber.child = newFiber
      } else if (element) {
        prevSibling.sibling = newFiber
      }
  
      prevSibling = newFiber
      index++
    }
  }
  
  const React = {
    createElement,
    render,
    useState,
  }
  
/** @jsx React.createElement */
function FormDatabse() {
    
  }


  /** @jsx React.createElement */
function FormDb(props) {
  function handleSubmit(event) {
    event.preventDefault();

    const formData = {
      host: event.target.elements.host.value,
      dbname: event.target.elements.dbname.value,
      port: event.target.elements.port.value,
      user: event.target.elements.user.value,
      password: event.target.elements.password.value,
      email: event.target.elements.email.value,
      name: event.target.elements.name.value,
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
          alert('Connexion Reussi !');
          window.location.href = '/'
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
      <button type="submit"className="px-3 mt-5 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">Envoyer</button>
      </form>
      </div>
  );
}
function FormUser() {
  function handleSubmit(event) {
    event.preventDefault();

    const formData = {
      host: event.target.elements.host.value,
      dbname: event.target.elements.dbname.value,
      port: event.target.elements.port.value,
      user: event.target.elements.user.value,
      password: event.target.elements.password.value,
      email: event.target.elements.email.value,
      name: event.target.elements.name.value,
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
          alert('Connexion Reussi !');
          window.location.href = '/'
        }
      })
      .catch(error => {
        console.error('Erreur lors de la requête API :', error);
      });
    
  }

  return (
    
    <form onSubmit={handleSubmit} className="max-w-md px-4 mx-auto mt-12">
      <input type="text" name="host" placeholder="Hôte" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <input type="text" name="dbname" placeholder="Nom de la base de données" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <input type="text" name="port" placeholder="Port" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
      <input type="text" name="user" placeholder="Utilisateur" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
      <input type="password" name="password" placeholder="Mot de passe" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
      <input type="text" name="email" placeholder="Votre adresse e-mail" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
      <input type="text" name="name" placeholder="Votre nom" className="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"/>
      <button type="submit"className="px-3 mt-5 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">Envoyer</button>
    </form>
  );
  
}
  
/** @jsx React.createElement */
function Test() {
  return  (
    <div className="max-w-5xl mx-auto px-4 md:px-8">
        <div className="flex justify-between p-4 rounded-md bg-blue-50 border border-blue-300">
            <div className="flex gap-3">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div className="self-center">
                    <span className="text-blue-600 font-medium">
                        New update available
                    </span>
                    <div className="text-blue-600">
                        <p className="mt-2 sm:text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <div className="mt-2">
                            <a
                                href="javascript:void(0)"
                                className="inline-flex items-center font-medium hover:underline sm:text-sm">
                                Details
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-3.5 w-3.5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fillRule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clipRule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
)
}



 /** @jsx React.createElement */
function App() {
  const [step, setStep] = React.useState(0);

  function goToNextStep() {
    console.log("coucou")
    setStep(c=>c+1);
  }

  function goToPreviousStep() {
    setStep(c=>c-1);
  }

  function renderContent() {
    switch (step) {
      case 0:
        return (
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
        );
      case 1:
        return <FormDb />;
      case 2:<FormUser/>
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
              <button onClick={goToPreviousStep}
              className="px-3 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg"
              >
                Précédent
              </button>
              <button onClick={goToNextStep}
                className="px-3 py-1.5 text-sm text-gray-700 duration-100 border rounded-lg hover:border-indigo-600 active:shadow-lg">
                Suivant
              </button>
            </div>
        </div>
        
      </div>
      
    </div>
    
  )
}


  
  const element = <App/>
  const container = document.getElementById("root")
  React.render(element, container)