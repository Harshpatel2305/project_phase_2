let searchForm = document.querySelector('.header .search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.home .slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}



document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
        const productId = event.target.getAttribute('data-id');
        const productName = document.querySelector(`#${productId} h3`).innerText;
        const productPrice = parseFloat(document.querySelector(`#${productId} .price`).innerText.replace('$', ''));

        const product = {
            id: productId,
            name: productName,
            price: productPrice,
            quantity: 1,
        };

        let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        const existingProductIndex = cartItems.findIndex(item => item.id === productId);

        if (existingProductIndex !== -1) {
            cartItems[existingProductIndex].quantity += 1;
        } else {
            cartItems.push(product);
        }

        localStorage.setItem('cart', JSON.stringify(cartItems));
        alert(`${productName} added to the cart!`);
    }
});




