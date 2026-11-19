<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chakula - Online Food Ordering</title>
@vite(['resources/css/app.css'])
</head>
<body>

@include('partials.header')

<!-- Hero (same dark background as the header) -->
<header>
  <div class="container">
    <div class="hero">
      <h1>Hungry? Dinner is a few taps away.</h1>
      <p>Browse menus from restaurants near you, pay your way, and follow your order from the kitchen to your door.</p>
      <div class="search">
        <input type="text" placeholder="Enter your delivery address" aria-label="Delivery address">
        <button class="btn" type="button">Find food</button>
      </div>
    </div>
  </div>
</header>

<section id="menu">
  <div class="container">
    <h2>Popular right now</h2>
    <p class="sub">Pick a category and add your favourites to the cart.</p>

    <div class="filters">
      <button class="active" data-cat="All">All</button>
      <button data-cat="Mains">Mains</button>
      <button data-cat="Grill">Grill</button>
      <button data-cat="Pizza">Pizza</button>
      <button data-cat="Burgers">Burgers</button>
      <button data-cat="Drinks">Drinks</button>
    </div>

    <div class="grid">
      <div class="card" data-cat="Mains" data-id="beef-pilau">
        <span class="tag">Mains</span>
        <h3><a href="{{ route('products', ['item' => 'beef-pilau']) }}">Beef pilau</a></h3>
        <p>Spiced rice slow-cooked with tender beef, served with kachumbari.</p>
        <div class="row"><span class="price">KES 450</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Mains" data-id="chapati-beans">
        <span class="tag">Mains</span>
        <h3><a href="{{ route('products', ['item' => 'chapati-beans']) }}">Chapati and beans</a></h3>
        <p>Soft layered chapati with slow-simmered beans and fresh greens.</p>
        <div class="row"><span class="price">KES 300</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Grill" data-id="nyama-choma">
        <span class="tag">Grill</span>
        <h3><a href="{{ route('products', ['item' => 'nyama-choma']) }}">Nyama choma platter</a></h3>
        <p>Charred goat ribs with ugali and a tomato and onion salad.</p>
        <div class="row"><span class="price">KES 1,100</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Grill" data-id="chicken-wings">
        <span class="tag">Grill</span>
        <h3><a href="{{ route('products', ['item' => 'chicken-wings']) }}">Spicy chicken wings</a></h3>
        <p>Crisp wings tossed in a smoky chilli glaze with a cooling dip.</p>
        <div class="row"><span class="price">KES 650</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Pizza" data-id="margherita">
        <span class="tag">Pizza</span>
        <h3><a href="{{ route('products', ['item' => 'margherita']) }}">Margherita pizza</a></h3>
        <p>Tomato, mozzarella and basil on a thin, blistered crust.</p>
        <div class="row"><span class="price">KES 850</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Pizza" data-id="pepperoni">
        <span class="tag">Pizza</span>
        <h3><a href="{{ route('products', ['item' => 'pepperoni']) }}">Pepperoni pizza</a></h3>
        <p>Crisp-edged pepperoni, stretchy mozzarella and a touch of honey.</p>
        <div class="row"><span class="price">KES 1,000</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Burgers" data-id="smash-burger">
        <span class="tag">Burgers</span>
        <h3><a href="{{ route('products', ['item' => 'smash-burger']) }}">Smash burger and fries</a></h3>
        <p>Double smashed patty, melted cheddar and pickles with skin-on fries.</p>
        <div class="row"><span class="price">KES 750</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Drinks" data-id="mango-juice">
        <span class="tag">Drinks</span>
        <h3><a href="{{ route('products', ['item' => 'mango-juice']) }}">Mango and passion juice</a></h3>
        <p>Cold-pressed and lightly sweet, served over ice.</p>
        <div class="row"><span class="price">KES 250</span><button class="add">Add</button></div>
      </div>
    </div>
  </div>
</section>

<section id="how" class="white">
  <div class="container">
    <h2>How it works</h2>
    <p class="sub">From craving to doorstep in three steps.</p>
    <div class="steps">
      <div class="step">
        <span class="num">1</span>
        <h3>Pick a restaurant</h3>
        <p>Enter your address and browse menus from places that deliver to you.</p>
      </div>
      <div class="step">
        <span class="num">2</span>
        <h3>Place your order</h3>
        <p>Customise your meal, add a note for the kitchen, and pay with M-Pesa or card.</p>
      </div>
      <div class="step">
        <span class="num">3</span>
        <h3>Track it live</h3>
        <p>Watch your order move from the kitchen to your door, or collect it yourself.</p>
      </div>
    </div>
  </div>
</section>

<section id="why" class="dark">
  <div class="container">
    <h2>Ordering made simple</h2>
    <p class="sub" style="color:#d5e4da;">Customers get a smooth checkout. Restaurants get orders they can manage from one place.</p>
    <div class="features">
      <div class="feature">
        <h3>Live order tracking</h3>
        <p>See every stage of your order, from confirmed to delivered.</p>
      </div>
      <div class="feature">
        <h3>Pay your way</h3>
        <p>M-Pesa, card, or cash on delivery, whichever suits you.</p>
      </div>
      <div class="feature">
        <h3>Schedule ahead</h3>
        <p>Choose a delivery time now and have lunch arrive right on schedule.</p>
      </div>
      <div class="feature">
        <h3>Delivery or pickup</h3>
        <p>Have it brought to you, or skip the fee and collect it yourself.</p>
      </div>
    </div>
  </div>
</section>

<section id="partners">
  <div class="container">
    <div class="partner">
      <div>
        <h2>Run a restaurant?</h2>
        <p>Manage your menu and incoming orders from one dashboard, and start taking online orders.</p>
      </div>
      <a href="#">Become a partner</a>
    </div>
  </div>
</section>

@include('partials.footer')

<script>
  // Add to cart
  Cart.showCount();
  document.querySelectorAll('.add').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var card = btn.closest('.card');
      var price = parseInt(card.querySelector('.price').textContent.replace(/\D/g, ''), 10);
      Cart.add(card.getAttribute('data-id'), card.querySelector('h3').textContent, price);
      Cart.showCount();
    });
  });

  // Category filter
  var filterButtons = document.querySelectorAll('.filters button');
  var cards = document.querySelectorAll('.card');
  filterButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      filterButtons.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      var cat = btn.getAttribute('data-cat');
      cards.forEach(function (card) {
        card.style.display = (cat === 'All' || card.getAttribute('data-cat') === cat) ? '' : 'none';
      });
    });
  });
</script>

</body>
</html>