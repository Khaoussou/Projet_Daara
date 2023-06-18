const addLevel= document.querySelector('.btn-add');
console.log(addLevel);
const form = document.querySelector('.ajoutNiveau');
console.log(form);

addLevel.addEventListener('click',()=> {
    form.style.display = 'block';
    addLevel.style.display = 'none';
})