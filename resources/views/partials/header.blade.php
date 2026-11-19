<header>
  <div class="container">
    <div class="nav">
      <a href="{{ route('home') }}" class="logo">Chak<span>ula</span></a>
      <ul>
        <li><a href="{{ route('home') }}#menu">Menu</a></li>
        <li><a href="{{ route('home') }}#how">How it works</a></li>
        <li><a href="{{ route('home') }}#why">Why Chakula</a></li>
        <li><a href="{{ route('home') }}#partners">For restaurants</a></li>
      </ul>
      <a class="cart" href="{{ route('order') }}">Cart (<span id="cart-count">0</span>)</a>
    </div>
  </div>
</header>