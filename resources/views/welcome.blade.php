<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chakula - Online Food Ordering</title>
<style>
  * { box-sizing: border-box; }
  body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #12241c; background: #f4f7f2; line-height: 1.5; }
  a { color: inherit; text-decoration: none; }
  .container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }

  /* Header */
  header { background: #12372a; color: #fff; }
  .nav { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; padding: 18px 0; }
  .logo { font-size: 26px; font-weight: bold; }
  .logo span { color: #ff7a4d; }
  .nav ul { list-style: none; display: flex; flex-wrap: wrap; gap: 24px; margin: 0; padding: 0; }
  .cart { background: transparent; color: #fff; border: 1px solid #5b8a74; border-radius: 20px; padding: 10px 18px; font-size: 15px; cursor: pointer; }

  /* Hero */
  .hero { padding: 60px 0 80px; }
  .hero h1 { font-size: 46px; line-height: 1.1; margin: 0 0 16px; max-width: 600px; }
  .hero p { font-size: 18px; max-width: 520px; color: #d5e4da; margin: 0 0 28px; }
  .search { display: flex; flex-wrap: wrap; gap: 10px; max-width: 520px; }
  .search input { flex: 1 1 240px; padding: 14px 16px; font-size: 16px; border: none; border-radius: 8px; }
  .btn { background: #ff7a4d; color: #0e2a20; border: none; border-radius: 8px; padding: 14px 26px; font-size: 16px; font-weight: bold; cursor: pointer; }

  /* Sections */
  section { padding: 60px 0; }
  h2 { font-size: 32px; margin: 0 0 10px; }
  .sub { color: #4a5c52; margin: 0 0 30px; }

  /* Menu */
  .filters { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 28px; }
  .filters button { padding: 10px 20px; border: 1px solid #b9c9be; border-radius: 20px; background: #fff; font-size: 15px; cursor: pointer; }
  .filters button.active { background: #12372a; color: #fff; border-color: #12372a; }
  .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(230px, 1fr)); gap: 20px; }
  .card { background: #fff; border: 1px solid #e2e9e3; border-radius: 12px; padding: 20px; }
  .card h3 { margin: 0 0 6px; font-size: 19px; }
  .card p { margin: 0 0 14px; font-size: 15px; color: #4a5c52; }
  .tag { font-size: 13px; color: #5a6b61; }
  .row { display: flex; align-items: center; justify-content: space-between; }
  .price { font-weight: bold; }
  .add { background: #12372a; color: #fff; border: none; border-radius: 6px; padding: 10px 16px; cursor: pointer; }

  /* Steps */
  .white { background: #fff; }
  .steps { display: flex; flex-wrap: wrap; gap: 20px; }
  .step { flex: 1 1 260px; background: #f4f7f2; border-radius: 12px; padding: 24px; }
  .step .num { display: inline-block; width: 40px; height: 40px; line-height: 40px; text-align: center; background: #12372a; color: #fff; border-radius: 50%; font-weight: bold; }
  .step h3 { margin: 14px 0 6px; }
  .step p { margin: 0; color: #4a5c52; }

  /* Features */
  .dark { background: #12372a; color: #fff; }
  .features { display: flex; flex-wrap: wrap; gap: 20px; }
  .feature { flex: 1 1 220px; background: #1b4a39; border-radius: 12px; padding: 24px; }
  .feature h3 { margin: 0 0 6px; }
  .feature p { margin: 0; color: #d5e4da; }

  /* Partner */
  .partner { background: #ff7a4d; color: #0e2a20; border-radius: 16px; padding: 40px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px; }
  .partner h2 { margin: 0 0 8px; }
  .partner p { margin: 0; }
  .partner a { background: #0e2a20; color: #fff; padding: 14px 26px; border-radius: 8px; font-weight: bold; }

  /* Footer */
  footer { background: #0e2a20; color: #bfd2c6; padding: 30px 0; text-align: center; font-size: 14px; }
</style>
</head>
<body>

<header>
  <div class="container">
    <div class="nav">
      <div class="logo">Chak<span>ula</span></div>
      <ul>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#how">How it works</a></li>
        <li><a href="#why">Why Chakula</a></li>
        <li><a href="#partners">For restaurants</a></li>
      </ul>
      <button class="cart" type="button">Cart (<span id="cart-count">0</span>)</button>
    </div>

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
      <div class="card" data-cat="Mains">
        <span class="tag">Mains</span>
        <h3>Beef pilau</h3>
        <p>Spiced rice slow-cooked with tender beef, served with kachumbari.</p>
        <div class="row"><span class="price">KES 450</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Mains">
        <span class="tag">Mains</span>
        <h3>Chapati and beans</h3>
        <p>Soft layered chapati with slow-simmered beans and fresh greens.</p>
        <div class="row"><span class="price">KES 300</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Grill">
        <span class="tag">Grill</span>
        <h3>Nyama choma platter</h3>
        <p>Charred goat ribs with ugali and a tomato and onion salad.</p>
        <div class="row"><span class="price">KES 1,100</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Grill">
        <span class="tag">Grill</span>
        <h3>Spicy chicken wings</h3>
        <p>Crisp wings tossed in a smoky chilli glaze with a cooling dip.</p>
        <div class="row"><span class="price">KES 650</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Pizza">
        <span class="tag">Pizza</span>
        <h3>Margherita pizza</h3>
        <p>Tomato, mozzarella and basil on a thin, blistered crust.</p>
        <div class="row"><span class="price">KES 850</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Pizza">
        <span class="tag">Pizza</span>
        <h3>Pepperoni pizza</h3>
        <p>Crisp-edged pepperoni, stretchy mozzarella and a touch of honey.</p>
        <div class="row"><span class="price">KES 1,000</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Burgers">
        <span class="tag">Burgers</span>
        <h3>Smash burger and fries</h3>
        <p>Double smashed patty, melted cheddar and pickles with skin-on fries.</p>
        <div class="row"><span class="price">KES 750</span><button class="add">Add</button></div>
      </div>
      <div class="card" data-cat="Drinks">
        <span class="tag">Drinks</span>
        <h3>Mango and passion juice</h3>
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

<footer>
  <div class="container">&copy; 2026 Chakula. All rights reserved.</div>
</footer>

<script>
  // Add to cart counter
  var count = 0;
  var counter = document.getElementById('cart-count');
  document.querySelectorAll('.add').forEach(function (btn) {
    btn.addEventListener('click', function () {
      count++;
      counter.textContent = count;
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