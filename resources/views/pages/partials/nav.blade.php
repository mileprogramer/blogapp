<nav class="navbar navbar-area navbar-expand-lg nav-absolute white nav-style-01">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="/" class="logo">
                    <img src={{ asset("img/logo.png")}} alt="logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appside_main_menu" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="appside_main_menu">
            <ul class="navbar-nav">
                <li class="current-menu-item">
                    <a href="#">Home</a>
                </li>
                <li><a href="#about">About</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#team">Team</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="/blog">Blog 01</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
                <li class="button-wrapper">
                    <a href="#" class="boxed-btn btn-rounded">Download</a>
                </li>
            </ul>
        </div>
    </div>
</nav>