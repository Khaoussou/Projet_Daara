// const ajoutEleve = document.querySelector('.ajout-eleve');
// const ajoutClasse = document.querySelector('.add-classe');
// console.log(ajoutClasse);
// const save = document.querySelector('.save');
// const form = document.querySelector('#id-form');
// const select = document.querySelector('#classe');
// console.log(select);
// console.log(save);

// const modal = document.querySelector('.modal');
// const modal1 = document.querySelector('.modal1');
// console.log(modal1);

// // ajoutEleve.addEventListener('click', () => {
// //     modal.style.display = "block";
// // })

// ajoutClasse.addEventListener('click', () => {
//     console.log('bap bap bap');
//     modal1.style.display = "block";
// })

// // form.addEventListener('submit',(e)=>{
// //     e.preventDefault();
// // })

// function createElement(element, attributs, elementContent) {
//     const e = document.createElement(element)
//     for (const cle in attributs) {
//         e.setAttribute(cle, attributs[cle])
//     }
//     e.textContent = elementContent
//     return e
// }

// function emptyField(inputs) {
//     inputs.forEach(input => {
//         input.value = ''
//     })
// }

// function afficheMessage(message) {
//     const mess = createElement('div', { class: 'mess dflex jcc aic' }, message);
//     container.append(mess);
//     setTimeout(() => {
//         container.removeChild(mess);

//     }, 5000)
// }

// function checkRequired(input) {
//     if (input.value == '') {
//         input.style.border = '2px solid red'; return false;
//     } else {
//         input.style.border = '2px solid green'; return true;
//     }
// }

const addLevel= document.querySelector('.btn-add');
console.log(addLevel);
const form = document.querySelector('.ajoutNiveau');
console.log(form);


addLevel.addEventListener('click',()=> {
    form.style.display = 'block';
    addLevel.style.display = 'none';
})