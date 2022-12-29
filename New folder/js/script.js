let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchfrom.classList.remove('active');
    cartitem.classList.remove('active');
}
let searchfrom = document.querySelector('.search-from');

document.querySelector('#search-btn').onclick = () =>{
    searchfrom.classList.toggle('active');
    navbar.classList.remove('active');
    cartitem.classList.remove('active');
}

let cartitem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartitem.classList.toggle('active');
    navbar.classList.remove('active');
    searchfrom.classList.remove('active');
}


window.onscroll = () =>{
    navbar.classList.remove('active');
    searchfrom.classList.remove('active');
    cartitem.classList.remove('active');
}