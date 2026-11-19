<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your order - Chakula</title>
@vite(['resources/css/app.css'])
</head>
<body>

@include('partials.header')

<!-- Items in the cart -->
<section>
  <div class="container">
    <p class="sub"><a href="{{ route('home') }}#menu">&larr; Keep browsing</a></p>
    <h2 id="page-title">Your order</h2>

    <div id="empty-view" hidden>
      <p class="sub">Your cart is empty. Add something from the menu to get started.</p>
      <div class="row">
        <a class="btn" href="{{ route('home') }}#menu">Browse the menu</a>
      </div>
    </div>

    <div id="done-view" hidden>
      <div class="card">
        <span class="tag">Order received</span>
        <h3 id="done-number"></h3>
        <p id="done-text"></p>
        <div class="row">
          <a class="btn" href="{{ route('home') }}#menu">Back to the menu</a>
        </div>
      </div>
    </div>

    <p class="sub" id="items-hint" hidden>Change quantities below, then fill in your details.</p>
    <div class="grid" id="items"></div>
  </div>
</section>

<!-- Delivery, payment and summary -->
<section class="white" id="form-section" hidden>
  <div class="container">
    <h2>Delivery and payment</h2>
    <p class="sub">Tell us where to bring your order and how you'd like to pay.</p>

    <form id="order-form" novalidate>
      <div class="steps">
        <div class="step">
          <h3>Your details</h3>
          <div class="search">
            <input type="text" id="f-name" placeholder="Full name" aria-label="Full name" autocomplete="name">
            <input type="tel" id="f-phone" placeholder="Phone number" aria-label="Phone number" autocomplete="tel">
            <input type="text" id="f-address" placeholder="Delivery address" aria-label="Delivery address" autocomplete="street-address">
            <input type="text" id="f-note" placeholder="Note for the kitchen (optional)" aria-label="Note for the kitchen">
          </div>

          <h3>Get it by</h3>
          <p><label><input type="radio" name="method" value="delivery" checked> Delivery</label></p>
          <p><label><input type="radio" name="method" value="pickup"> Pickup</label></p>

          <h3>Payment</h3>
          <p><label><input type="radio" name="payment" value="M-Pesa" checked> M-Pesa</label></p>
          <p><label><input type="radio" name="payment" value="Card"> Card</label></p>
          <p><label><input type="radio" name="payment" value="Cash on delivery"> Cash on delivery</label></p>
        </div>

        <div class="step">
          <h3>Summary</h3>
          <div class="card">
            <div class="row"><span>Subtotal</span><span id="sum-subtotal">KES 0</span></div>
            <div class="row"><span>Delivery</span><span id="sum-delivery">KES 0</span></div>
            <div class="row"><span><strong>Total</strong></span><span class="price" id="sum-total">KES 0</span></div>
          </div>
          <p id="form-error" role="alert" hidden></p>
          <h3>Ready?</h3>
          <button class="btn" type="submit">Place order</button>
        </div>
      </div>
    </form>
  </div>
</section>

@include('partials.footer')

<script>
  var DELIVERY_FEE = 150; // placeholder flat fee: change it to your own

  var itemsBox = document.getElementById('items');
  var itemsHint = document.getElementById('items-hint');
  var emptyView = document.getElementById('empty-view');
  var doneView = document.getElementById('done-view');
  var formSection = document.getElementById('form-section');
  var form = document.getElementById('order-form');
  var addressInput = document.getElementById('f-address');
  var errorBox = document.getElementById('form-error');

  function el(tag, text, cls) {
    var e = document.createElement(tag);
    if (text !== undefined) { e.textContent = text; }
    if (cls) { e.className = cls; }
    return e;
  }

  function checked(name) {
    return form.querySelector('input[name="' + name + '"]:checked').value;
  }

  function updateSummary() {
    var isDelivery = checked('method') === 'delivery';
    var subtotal = Cart.total();
    var fee = isDelivery ? DELIVERY_FEE : 0;
    document.getElementById('sum-subtotal').textContent = Cart.money(subtotal);
    document.getElementById('sum-delivery').textContent = isDelivery ? Cart.money(fee) : 'Free (pickup)';
    document.getElementById('sum-total').textContent = Cart.money(subtotal + fee);
    addressInput.hidden = !isDelivery;
  }

  function render() {
    var cart = Cart.get();
    var ids = Object.keys(cart);
    Cart.showCount();

    emptyView.hidden = ids.length > 0;
    itemsHint.hidden = ids.length === 0;
    formSection.hidden = ids.length === 0;

    itemsBox.innerHTML = '';
    ids.forEach(function (id) {
      var item = cart[id];
      var card = el('div', undefined, 'card');
      card.appendChild(el('span', Cart.money(item.price) + ' each', 'tag'));
      card.appendChild(el('h3', item.name));

      var row = el('div', undefined, 'row');
      var controls = el('span');
      var minus = el('button', '−', 'add');
      minus.type = 'button';
      minus.setAttribute('aria-label', 'Decrease quantity of ' + item.name);
      minus.onclick = function () { Cart.setQty(id, item.qty - 1); render(); };
      var plus = el('button', '+', 'add');
      plus.type = 'button';
      plus.setAttribute('aria-label', 'Increase quantity of ' + item.name);
      plus.onclick = function () { Cart.setQty(id, item.qty + 1); render(); };
      controls.appendChild(minus);
      controls.appendChild(el('span', ' ' + item.qty + ' '));
      controls.appendChild(plus);
      row.appendChild(controls);
      row.appendChild(el('span', Cart.money(item.price * item.qty), 'price'));
      card.appendChild(row);

      var removeRow = el('div', undefined, 'row');
      var remove = el('button', 'Remove', 'add');
      remove.type = 'button';
      remove.setAttribute('aria-label', 'Remove ' + item.name + ' from the cart');
      remove.onclick = function () { Cart.setQty(id, 0); render(); };
      removeRow.appendChild(remove);
      card.appendChild(removeRow);

      itemsBox.appendChild(card);
    });

    updateSummary();
  }

  function showError(message) {
    errorBox.textContent = message;
    errorBox.hidden = false;
  }

  form.querySelectorAll('input[name="method"]').forEach(function (r) {
    r.addEventListener('change', updateSummary);
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    errorBox.hidden = true;

    var name = document.getElementById('f-name').value.trim();
    var phone = document.getElementById('f-phone').value.trim();
    var address = addressInput.value.trim();
    var method = checked('method');

    if (!name) { return showError('Please enter your name.'); }
    if (phone.replace(/\D/g, '').length < 9) { return showError('Please enter a valid phone number.'); }
    if (method === 'delivery' && !address) { return showError('Please enter a delivery address.'); }

    var count = Cart.count();
    var total = Cart.total() + (method === 'delivery' ? DELIVERY_FEE : 0);
    var number = 'CH-' + String(Date.now()).slice(-6);

    // Nothing is sent to a server yet: connect this to a Laravel route to save real orders.
    Cart.clear();
    Cart.showCount();

    document.getElementById('page-title').textContent = 'Thank you, ' + name;
    document.getElementById('done-number').textContent = 'Order ' + number;
    document.getElementById('done-text').textContent =
      count + (count === 1 ? ' item' : ' items') + ', ' + Cart.money(total) + '. ' +
      (method === 'delivery' ? 'Delivery to ' + address + '.' : 'Pickup from the restaurant.') +
      ' Payment: ' + checked('payment') + '.';

    itemsBox.innerHTML = '';
    itemsHint.hidden = true;
    formSection.hidden = true;
    doneView.hidden = false;
    window.scrollTo(0, 0);
  });

  render();
</script>

</body>
</html>