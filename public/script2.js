const updateNote = document.querySelector('.update');
const notes = document.querySelectorAll('.note');
const classeId = document.querySelector('#current-classe').value;
const td = document.querySelector('.td');
const url = "http://localhost:8080/";
var valueR
var valueE
var id



function creatingElement(elName, attributs, elementContent) {
    const element = document.createElement(elName);
    for (const cle in attributs) {
        element.setAttribute(cle, attributs[cle])
    }
    element.textContent = elementContent;
    return element;
}

function afficheMessage(message, container) {
    const mess = creatingElement('div', { class: 'dflex jcc aic' }, message);
    container.append(mess);
    setTimeout(() => {
        container.removeChild(mess);
    }, 5000)
}

function checkRequired(input) {
    if (input.value == '') {
        input.style.border = '2px solid red'; return false;
    } else {
        input.style.border = '2px solid rgb(31, 168, 31)'; return true;
    }
}

function checkValue(input) {
    if (input.value == 0 || input.value == undefined || input.value == null || input.value < 10) {
        input.style.border = '2px solid red'; return false;
    } else {
        input.style.border = '2px solid rgb(31, 168, 31)'; return true;
    }
}




updateNote.addEventListener('click', () => {
    const changed = document.querySelectorAll('.changed');
    changed.forEach(ch => {
        checkRequired(ch)
        if (ch.classList.contains('nRess')) {
            valueR = ch.value;
        }
        if (ch.classList.contains('nExam')) {
            if (!checkValue(ch)) {
                checkValue(ch)
                // afficheMessage("Veuillez revoir cette note svp!", td);
            } else {
                valueE = ch.value;
                // afficheMessage("Enregistrement réussi !", td);
                checkValue(ch)
            }
        }
        id = ch.getAttribute('idDissip');
        fetch(url + "updateNote", {
            method: "POST",
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                "idDissip": id,
                "idClasse": classeId,
                "valueR": valueR,
                "valueE": valueE
            })
        }).then(data => data.text().then(console.log))
    })
})

notes.forEach(note => {
    note.addEventListener('input', () => {
        if (note.value < 10) {
            note.style.border = '2px solid red';
        } else {
            note.style.border = '2px solid rgb(31, 168, 31)';
        }
        note.classList.add('changed');
    })
})

