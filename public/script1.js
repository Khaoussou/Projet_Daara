const niveau = document.querySelector('#niveau');
const classe = document.querySelector('#classe');
const newDiss = document.querySelector('#discipline');
const nomClasse = document.querySelector('#nom');
const gdd = document.querySelector('#gdd');
const item = document.querySelector('.item');
const ok = document.querySelector('.ok');
const update = document.querySelector('#update');
const updateNote = document.querySelector('.update');
const groupModalContenaire = document.querySelector('.groupModalContenaire');
const newGroup = document.querySelector('#new');
const addGroupe = document.querySelector('#addGroupe');
const group = document.querySelector('#groupe');




function creatingElement(elName, attributs, elementContent) {
    const element = document.createElement(elName);
    for (const cle in attributs) {
        element.setAttribute(cle, attributs[cle])
    }
    element.textContent = elementContent;
    return element;
}

function chargerDissp(data) {
    item.innerHTML = "";
    data.forEach(d => {
        let label = creatingElement('label', { for: '' }, d.libelleDiscipline)
        label.style.fontSize = '1.5rem';
        let h3 = creatingElement('h3', {}, (d.code));
        let input = creatingElement('input', { type: 'checkbox', value: d.idDiscipline, id: 'check' })
        input.checked = true;
        item.append(label, h3, input)
    });
}

function chargerSelectClasse(data, select, label = 'Selectionner') {
    select.innerHTML = '';
    const option = creatingElement('option', { value: 0 });
    option.innerHTML = label;
    select.appendChild(option);
    data.forEach(d => {
        const option = creatingElement('option', { value: d.idClasse });
        option.innerHTML = d.nomClasse;
        select.appendChild(option);
    });
}

function getValue(select) {
    return select.options[select.selectedIndex].value;
}

function getName(select) {
    return select.options[select.selectedIndex].innerHTML;
}

async function getData(url) {
    let data = await fetch(url);
    let d = await data.json();
    return d;
}

var dissip
gdd.addEventListener('change', () => {
    dissip = getValue(gdd);
})

niveau.addEventListener('change', () => {
    let level = getValue(niveau)
    const donne = getData("http://localhost:8080/classe/" + level)
    donne.then(data => {
        chargerSelectClasse(data, classe, 'Selectionner une classe');
    })
})

classe.addEventListener('change', () => {
    let idClasse = getValue(classe)
    const donne = getData("http://localhost:8080/discip/" + idClasse)
    donne.then(data => {
        item.innerHTML = "";
        chargerDissp(data);
    })
    nomClasse.innerHTML = getName(classe)
    nomClasse.style.fontSize = '1.7rem';
    nomClasse.style.Color = '#4fc3bf';
})

ok.addEventListener('click', () => {
    let input = newDiss.value
    let idClasse = getValue(classe)
    fetch("http://localhost:8080/addDiscipline", {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify({
            "name": input,
            "idGroup": dissip,
            "idClasse": idClasse
        })
    }).then(data => data.json()).then(data => {
        chargerDissp(data);
        // console.log(data);
    })
})

update.addEventListener('click', () => {
    const inputs = document.querySelectorAll('#check');
    inputs.forEach(input => {
        if (input.checked === false) {
            let valueInput = input.value;
            // console.log(input.value);
            let valueClasse = getValue(classe)
            // console.log(getValue(classe));
            fetch("http://localhost:8080/remove", {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    "idDissip": valueInput,
                    "idClasse": valueClasse
                })
            }).then(data => data.json()).then(data => {
                chargerDissp(data);
            });
        }
    })
})

// updateNote.addEventListener('click', () => {
//     const notes = document.querySelectorAll('.note');
//     notes.forEach(note => {
//         if (note.value != "") {
//             let valueInput = note.value;
//             // console.log(input.value);
//             let valueClasse = getValue(classe)
//             // console.log(getValue(classe));
//             fetch("http://localhost:8080/updateNote", {
//                 method: 'POST',
//                 headers: {
//                     'Content-type': 'application/json'
//                 },
//                 body: JSON.stringify({
//                     "idDissip": valueInput,
//                     "idClasse": valueClasse
//                 })
//             }).then(data => data.json()).then(data => {
//                 chargerDissp(data);
//             });
//         }
//     })
// })

addGroupe.disabled = true;

newGroup.addEventListener('click', () => {
    groupModalContenaire.style.display = 'block';
})

group.addEventListener('input', () => {
    if (group.value != "") {
        addGroupe.disabled = false;
        addGroupe.addEventListener('click', () => {
            let value = group.value
            fetch("http://localhost:8080/addGroupDiscipline", {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    "name": value,
                })
            }).then(data => data.json().then( d => {
                const option = creatingElement('option', { value : d[0].idGroupeDiscip , selected : true});
                option.innerHTML = d[0].libelleGroupe;
                gdd.append(option);
            }))
            groupModalContenaire.style.display = 'none';
        })
    } else {
        addGroupe.disabled = true;
    }

})
