<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Front Page</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sliders"></i><a href="ui-buttons.html">Slider</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">About Us</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Services</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Features</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Offer</a></li>
                            <li><i class="fa fa-image"></i><a href="ui-alerts.html">Gallary</a></li>
                            <li><i class="fa fa-question-circle"></i><a href="ui-progressbar.html">FAQ</a></li>
                            <li><i class="fa fa-quote-left"></i><a href="ui-modals.html">Testimonial</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Blogs</a></li>
                        </ul>
                    </li>
                    
                    <li class="">
                        <a href="{{ route('settings')}}"  aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Website Settings</a>
                        
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->