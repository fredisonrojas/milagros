const editar = document.getElementById('btn-editar');
const actualizar = document.getElementById('btn-update');
const cancelar = document.getElementById('btn-cancelar');
const input1 = document.querySelectorAll('.input-item')[0];
const input2 = document.querySelectorAll('.input-item')[1];
const input3 = document.querySelectorAll('.input-item')[2];
const input4 = document.querySelectorAll('.input-item')[3];
const input5 = document.querySelectorAll('.input-item')[4];
const input6 = document.querySelectorAll('.input-item')[5];
const input7 = document.querySelectorAll('.input-item')[6];


editar.addEventListener("click", () => {
    editar.classList.add('hidden');
    actualizar.classList.remove('hidden');
    cancelar.classList.remove('hidden');
    input1.toggleAttribute('readonly');
    input2.toggleAttribute('readonly');
    input3.toggleAttribute('readonly');
    input4.toggleAttribute('readonly');
    input5.toggleAttribute('readonly');
    input6.toggleAttribute('readonly');
    input7.toggleAttribute('readonly');
});

cancelar.addEventListener("click", () => {
    editar.classList.remove('hidden');  
    actualizar.classList.add('hidden');
    cancelar.classList.add('hidden');
    input1.toggleAttribute('readonly');
    input2.toggleAttribute('readonly');
    input3.toggleAttribute('readonly');
    input4.toggleAttribute('readonly');
    input5.toggleAttribute('readonly');
    input6.toggleAttribute('readonly');
    input7.toggleAttribute('readonly'); 
});