
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">{{$nav_title}}

            </a>
            {{$slot}}
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="{{ route($trashed.$folderName.'.index') }}" method="Get">
                <div class="input-group no-border">
                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="Search For {{$folderName}} by Name" >
                    <button type="submit" class="btn btn-default btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>

                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">




                                @if (Route::has('login'))
                                 <div class="top-right links">
                                    @auth
                                        <a class="dropdown-item" href="{{ url('/home') }}">Home</a>
                                        <form action="{{  route('logout')  }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('post') }}
                                            <button type="submit" class="dropdown-item" >LOG OUT</button>

                                        </form>
                                        <div class="clearfix"></div>
                                @else
                                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">Resiter</a>
                                    @endif
                                @endauth
                            </div>
                        @endif



                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
