<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{$image_asset_path.(isset($globalSettings['website_logo_white'])?$globalSettings['website_logo_white']:'')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_logo']:'')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="">
                        <a href="{{ route('menue_list') }}" > <i class="menu-icon fa fa-bars"></i>Menus</a>
                    </li>
                    <li class="">
                        <a href="{{ route('pages') }}" > <i class="menu-icon fa fa-file"></i>Pages</a>
                    </li>
                    <li class="">
                        <a href="{{ route('select_page') }}" > <i class="menu-icon fa fa-list"></i>Modules</a>
                    </li>
                    <li class="">
                        <a href="{{ route('blogs') }}" > <i class="menu-icon fa fa-blogger"></i>Blogs</a>
                    </li>
                    <li class="">
                        <a href="{{ route('settings')}}"  aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Website Settings</a>
                        
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->