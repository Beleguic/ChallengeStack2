const isEvent = k => k.startsWith('on');
const eventName = k => k.toLowerCase().substring(2);
const  isProperty = k => k != 'children';


/**
 * Convertit un fiber en élément
 * @param {object} fiber 
 * @returns {Fiber}
 */


export function createDom(fiber) {
    const dom =
    fiber.type === "TEXT_ELEMENT"
    ? document.createTextNode(fiber.props.nodeValue) 
      : document.createElement(fiber.type);
  
    updateDom(dom, {}, fiber.props);
 
    return dom;
}


export function updateDom(dom, prevProps, nextProps) {
    //supprime les anciennes propriété
    Object.keys(prevProps)
        .filter(isProperty)
        .forEach(name => {
            if (!(name in nextProps)) {
                if (isEvent(name)) {
                 dom.removeEventListener(eventName(name),prevProps[name])
                } else {
                    dom[name]=''
                }
        }
        })
    
    //Ajoute ou modifie les nouvelles propriétés
    Object.keys(nextProps)
        .filter(isProperty)
        .forEach(name => {
            if (prevProps[name] != nextProps[name]) {
                if (isEvent(name)) {
                    if (prevProps[name]) {
                        dom.removeEventListener(eventName(name), prevProps[name]);
                    }
                    dom.addEventListener(eventName(name), nextProps[name]);
                } else {
                    dom[name] = nextProps[name]
                }
}
    })
}