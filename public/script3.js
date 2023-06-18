const url = "http://localhost:8080/";
const dissip = document.querySelector('#discip');
const spans = document.querySelectorAll('#span');
const Selectnote = document.querySelector('#select-note');
const classe = document.querySelector('#current-classe').value;
var noteMax
var dissipValue;




function creatingElement(elName, attributs, elementContent) {
    const element = document.createElement(elName);
    for (const cle in attributs) {
        element.setAttribute(cle, attributs[cle])
    }
    element.textContent = elementContent;
    return element;
}

function getValue(select) {
    return select.options[select.selectedIndex].value;
}

function afficheMessage(message, container) {
    const mess = creatingElement('div', { class: 'dflex jcc aic' }, message);
    container.append(mess);
    setTimeout(() => {
        container.removeChild(mess);
    }, 5000)
}

async function getData(url) {
    let data = await fetch(url);
    let d = await data.json();
    return d;
}




dissip.addEventListener('change', () => {
    dissipValue = dissip.value;
})

Selectnote.addEventListener("change", () => {
    fetch(url + "classe/note", {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify({
            "idDissip": dissipValue,
            "idClasse": classe,
        })
    }).then(res => res.json()).then(data => {
        spans.forEach(span => {
            if (Selectnote.value == 0) {
                span.innerHTML = '/' + data[0].Ressource
            } else if (Selectnote.value == 1) {
                span.innerHTML = '/' + data[0].Examen
            }
        })
        
    });
})






