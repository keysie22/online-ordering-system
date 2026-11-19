// Shared cart helper. Items are kept in the browser (localStorage) as:
// { "beef-pilau": { name: "Beef pilau", price: 450, qty: 2 }, ... }
var Cart = {
  get: function () {
    try { return JSON.parse(localStorage.getItem('cart')) || {}; } catch (e) { return {}; }
  },
  save: function (cart) {
    try { localStorage.setItem('cart', JSON.stringify(cart)); } catch (e) {}
  },
  add: function (id, name, price) {
    var cart = this.get();
    if (cart[id]) { cart[id].qty++; } else { cart[id] = { name: name, price: price, qty: 1 }; }
    this.save(cart);
  },
  setQty: function (id, qty) {
    var cart = this.get();
    if (!cart[id]) { return; }
    if (qty <= 0) { delete cart[id]; } else { cart[id].qty = qty; }
    this.save(cart);
  },
  clear: function () {
    this.save({});
  },
  count: function () {
    var cart = this.get(), n = 0;
    for (var id in cart) { n += cart[id].qty; }
    return n;
  },
  total: function () {
    var cart = this.get(), sum = 0;
    for (var id in cart) { sum += cart[id].price * cart[id].qty; }
    return sum;
  },
  money: function (n) {
    return 'KES ' + n.toLocaleString('en-US');
  },
  showCount: function () {
    var el = document.getElementById('cart-count');
    if (el) { el.textContent = this.count(); }
  }
};