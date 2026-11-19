<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product - Chakula</title>
@vite(['resources/css/app.css'])
</head>
<body>

@include('partials.header')

<section class="white">
  <div class="container">
    <p class="sub"><a href="{{ route('home') }}#menu">&larr; Back to menu</a></p>

    <div class="steps">
      <div class="step">
        <span class="tag" id="p-cat">Mains</span>
        <h2 id="p-name">Beef pilau</h2>
        <p id="p-desc">Spiced rice slow-cooked with tender beef, served with kachumbari.</p>
        <div class="row">
          <span class="price" id="p-price">KES 450</span>
          <button class="add" id="p-add" type="button">Add to cart</button>
        </div>
      </div>

      <div class="step">
        <h3>What you get</h3>
        <p id="p-details">One generous portion, freshly prepared and packed hot for delivery or pickup.</p>
        <h3>Delivery</h3>
        <p>Delivery or pickup, with live tracking from the kitchen to your door.</p>
        <h3>Payment</h3>
        <p>Pay with M-Pesa, card, or cash on delivery.</p>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <h2>You may also like</h2>
    <p class="sub">More from the menu.</p>
    <div class="grid">
      <div class="card" data-item="nyama-choma">
        <span class="tag">Grill</span>
        <h3><a href="{{ route('products', ['item' => 'nyama-choma']) }}">Nyama choma platter</a></h3>
        <p>Charred goat ribs with ugali and a tomato and onion salad.</p>
        <div class="row"><span class="price">KES 1,100</span></div>
      </div>
      <div class="card" data-item="margherita">
        <span class="tag">Pizza</span>
        <h3><a href="{{ route('products', ['item' => 'margherita']) }}">Margherita pizza</a></h3>
        <p>Tomato, mozzarella and basil on a thin, blistered crust.</p>
        <div class="row"><span class="price">KES 850</span></div>
      </div>
      <div class="card" data-item="smash-burger">
        <span class="tag">Burgers</span>
        <h3><a href="{{ route('products', ['item' => 'smash-burger']) }}">Smash burger and fries</a></h3>
        <p>Double smashed patty, melted cheddar and pickles with skin-on fries.</p>
        <div class="row"><span class="price">KES 750</span></div>
      </div>
      <div class="card" data-item="mango-juice">
        <span class="tag">Drinks</span>
        <h3><a href="{{ route('products', ['item' => 'mango-juice']) }}">Mango and passion juice</a></h3>
        <p>Cold-pressed and lightly sweet, served over ice.</p>
        <div class="row"><span class="price">KES 250</span></div>
      </div>
    </div>
  </div>
</section>

@include('partials.footer')

<script>
  var products = {
    'beef-pilau':    { cat: 'Mains',   name: 'Beef pilau', price: 'KES 450', desc: 'Spiced rice slow-cooked with tender beef, served with kachumbari.' },
    'chapati-beans': { cat: 'Mains',   name: 'Chapati and beans', price: 'KES 300', desc: 'Soft layered chapati with slow-simmered beans and fresh greens.' },
    'nyama-choma':   { cat: 'Grill',   name: 'Nyama choma platter', price: 'KES 1,100', desc: 'Charred goat ribs with ugali and a tomato and onion salad.' },
    'chicken-wings': { cat: 'Grill',   name: 'Spicy chicken wings', price: 'KES 650', desc: 'Crisp wings tossed in a smoky chilli glaze with a cooling dip.' },
    'margherita':    { cat: 'Pizza',   name: 'Margherita pizza', price: 'KES 850', desc: 'Tomato, mozzarella and basil on a thin, blistered crust.' },
    'pepperoni':     { cat: 'Pizza',   name: 'Pepperoni pizza', price: 'KES 1,000', desc: 'Crisp-edged pepperoni, stretchy mozzarella and a touch of honey.' },
    'smash-burger':  { cat: 'Burgers', name: 'Smash burger and fries', price: 'KES 750', desc: 'Double smashed patty, melted cheddar and pickles with skin-on fries.' },
    'mango-juice':   { cat: 'Drinks',  name: 'Mango and passion juice', price: 'KES 250', desc: 'Cold-pressed and lightly sweet, served over ice.' }
  };

  // Pick the product from the link, e.g. /products?item=margherita
  var id = new URLSearchParams(window.location.search).get('item');
  if (!products[id]) { id = 'beef-pilau'; }
  var p = products[id];

  document.title = p.name + ' - Chakula';
  document.getElementById('p-cat').textContent = p.cat;
  document.getElementById('p-name').textContent = p.name;
  document.getElementById('p-desc').textContent = p.desc;
  document.getElementById('p-price').textContent = p.price;

  // Hide the current product from "You may also like"
  document.querySelectorAll('.card').forEach(function (card) {
    if (card.getAttribute('data-item') === id) { card.style.display = 'none'; }
  });

  // Add to cart
  Cart.showCount();
  document.getElementById('p-add').addEventListener('click', function () {
    Cart.add(id, p.name, parseInt(p.price.replace(/\D/g, ''), 10));
    Cart.showCount();
  });
</script>

</body>
</html>