<header class="main-container">
    <a href="#">
        <img src="images/Logo.svg"/>
    </a>
    <nav class="">
        <ul class="">
            <li><a href="#" class="nav-link">About</a></li>
            <li><a href="#" class="nav-link">Features</a></li>
            <li><a href="#" class="nav-link">Pricing</a></li>
            <li><a href="{{route('quize')}}" class="nav-link">Testimonials</a></li>
            <li><a href="#" class="nav-link">Help</a></li>
        </ul>
        <ul class="burger-ul">
            <li><a href="#" class="nav-link">About</a></li>
            <li><a href="#" class="nav-link">Features</a></li>
            <li><a href="#" class="nav-link">Pricing</a></li>
            <li><a href="{{route('quize')}}" class="nav-link">Testimonials</a></li>
            <li><a href="#" class="nav-link">Help</a></li>
        </ul>
            <div class="header-buttons">
                <a href="#">Sign In</a>
                <a href="#" class="round-button">Sign Up</a>
            </div>
    </nav>
    <button id="burger" class="burger">
        <svg class="burger-btn" width="80" height="52" viewBox="0 0 40 26" xmlns="http://www.w3.org/2000/svg">
            <rect class="burger-btn--1" width="40" height="6" rx="3" ry="3" />
            <rect class="burger-btn--2" width="40" height="6" y="10" rx="3" ry="3" />
            <rect class="burger-btn--3" width="40" height="6" y="20" rx="3" ry="3" />
        </svg>
    </button>
</header>
