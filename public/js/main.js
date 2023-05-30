const btn_add = document.querySelector('.btn-add');
const btn_close = document.querySelector('.btn-close');
const modal_tarea = document.querySelector('.modal-tarea');

btn_add.addEventListener('click',(e)=>{
    e.preventDefault();
    modal_tarea.style.display = 'flex';
    modal_tarea.style.transition = "0.6s";
    modal_tarea.style.opacity = '1';

});
btn_close.addEventListener('click',(e)=>{
    e.preventDefault();

    modal_tarea.style.display = 'none';
    modal_tarea.style.transition = "0.6s";
    modal_tarea.style.opacity = '0';


});
