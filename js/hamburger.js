const sidebar = document.querySelector('.sidebar')
const hamburger=document.querySelector('.hamburger_menu');
const close=document.querySelector('.close');

console.log(sidebar)
hamburger.addEventListener('click',()=>{
    sidebar.classList.add("show")
})
close.addEventListener('click',()=>{
    sidebar.classList.remove("show")
})