<?php include 'functions/functions.php';?>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    let searchForm = document.querySelector('.custom-header .search-form');
    let navbar = document.querySelector('.custom-header .custom-navbar');

    document.querySelector('#search-btn').onclick = () =>{
        searchForm.classList.toggle('active');
        navbar.classList.remove('active');
    }

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
</script>


<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");

  * {
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none !important;
    outline: none;
    border: none;
    text-transform: capitalize;
    transition: all 0.2s linear;
  }

  html {
    font-size: 62.5%;
    overflow-x: hidden;
  }

  .section {
    padding: 2rem 9%;
  }

  .heading {
    text-align: center;
    background: crimson;
  }

  .heading h1 {
    font-size: 3rem;
    text-transform: uppercase;
    color: #fff;
  }

  .heading p {
    color: #fff;
    padding-top: 0.7rem;
    font-size: 1.7rem;
  }

  .heading p a {
    color: #fff;
  }

  .heading p a:hover {
    color: #333;
  }

  .title {
    font-size: 3rem;
    color: #333;
    margin-bottom: 2rem;
    padding: 0 1rem;
    text-align: center;
  }

  .custom-btn {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.8rem 2.8rem;
    font-size: 1.7rem;
    color: #333;
    border: 0.2rem solid #333;
    background: none;
    cursor: pointer;
    border-radius: 0.5rem;
  }

  .custom-btn:hover {
    background: #333;
    color: #fff;
  }

  .custom-header {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: #fff;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    padding: 0 9%;
  }

  .logo {
    font-size: 2.5rem;
    color: #333;
    font-weight: bolder;
    margin-right: auto;
  }

  .custom-navbar ul {
    list-style: none;
  }

  .custom-navbar ul li {
    position: relative;
    float: left;
  }

  .custom-navbar ul li:hover ul {
    display: block;
  }

  .custom-navbar ul li a {
    font-size: 1.7rem;
    color: #666;
    padding: 2rem;
    display: block;
  }

  .custom-navbar ul li a:hover {
    background: #eee;
  }

  .custom-navbar ul li ul {
    position: absolute;
    left: 0;
    width: 20rem;
    background: #fff;
    display: none;
  }

  .custom-navbar ul li ul li {
    width: 100%;
  }

  .icons div,
  .icons a {
    font-size: 2.5rem;
    color: #333;
    cursor: pointer;
    margin-left: 2rem;
  }

  .icons div:hover,
  .icons a:hover {
    color: crimson;
  }

  .search-form {
    position: absolute;
    top: 99%;
    left: 0;
    right: 0;
    border-top: 0.2rem solid #333;
    background: #fff;
    height: 7.5rem;
    display: flex;
    align-items: center;
    padding: 2rem;
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
    clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
  }

  .search-form.active {
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  }

  .search-form input {
    width: 100%;
    height: 100%;
    padding-right: 1rem;
    font-size: 1.7rem;
    color: #666;
    text-transform: none;
  }

  .search-form label {
    font-size: 2.5rem;
    color: #333;
    cursor: pointer;
  }

  .search-form label:hover {
    color: crimson;
  }

  #menu-btn {
    display: none;
  }

  @keyframes fadeIn {
    0% {
      transform: translateY(3rem);
      opacity: 0;
    }
  }
  .home .slide {
    display: flex;
    min-height: 60vh;
    padding: 2rem 7%;
    background-size: cover !important;
    background-position: center !important;
    display: flex;
    align-items: center;
    display: none;
}

.home .slide.active {
    display: flex;
}

.home .slide .content span {
    color: #fff;
    display: block;
    font-size: 2rem;
    animation: fadeIn 0.4s linear 0.2s backwards;
}

.home .slide .content h3 {
    color: #333;
    text-transform: uppercase;
    padding: 1rem 0;
    font-size: 6rem;
    animation: fadeIn 0.4s linear 0.4s backwards;
}

.home .slide .content .btn {
    animation: fadeIn 0.4s linear 0.6s backwards;
    border: #fff;
}

.home #next-slide,
.home #prev-slide {
    position: absolute;
    bottom: 2rem;
    right: 2rem;
    height: 6rem;
    width: 6rem;
    line-height: 5.5rem;
    font-size: 4rem;
    color: #333;
    border: 0.2rem solid #333;
    background: #fff;
    border-radius: 0.5rem;
    cursor: pointer;
    text-align: center;
}

.home #next-slide:hover,
.home #prev-slide:hover {
    background: #333;
    color: #fff;
}

.home #prev-slide {
    right: 9rem;
}

</style>
<body>

  <header class="custom-header">
    <a href="home.php" class="logo"> Glassify </a>

    <nav class="custom-navbar">
      <ul>
        <li><a href="home.php">home</a></li>
        <li><a href="#">Products+</a>
          <ul>
            <li><a href="sunglasses.php">Sunglasses</a></li>
            <li><a href="computerglasses.php">Compuer glasses</a></li>
            <!--<li><a href="contactlenses.php">Contact Lenses</a></li>-->
          </ul>
        </li>

        <li><a href="about.php">about</a>

        </li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="#">Profile +</a>
          <ul>
            <li><a href="my-orders.php">my orders</a></li>
            
            <li><a href="delete-account.php">delete my account</a></li>
            
          </ul>
        </li>

        <li><a href="#">account +</a>
          <?php
          if (!isset($_SESSION['customer_email'])) {
            echo ' <ul>
            <li><a href="login.php">login</a></li>
            <li><a href="register.php">register</a></li>
          </ul>';
          } else {
            echo '<ul><li><a href="./logout.php" class="login__link">Logout</a></li><ul>';
          }
          ?>

          <!--<ul>
              <li><a href="login.html">login</a></li>
              <li><a href="register.html">register</a></li>
            </ul>-->
        </li>
        </li>

      </ul>

    </nav>

    <div class="icons">
      <div id="menu-btn" class="fas fa-bars"></div>
      <div id="search-btn" class="fas fa-search"></div>
      <a href="cart.php" class="fas fa-shopping-cart"></a>
      <b>[
        <?php items();?>
      </b>]

    </div>

    <form action="search_results.php" method="GET" class="search-form">
  <input type="search" name="query" placeholder="Search by product name.." id="search-box">
  <button type="submit" id="search-btn" class="btn">Search</button>
</form>
  </header>
