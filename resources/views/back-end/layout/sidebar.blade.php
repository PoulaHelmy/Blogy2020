
<div class="sidebar" data-color="purple" data-background-color="black" data-image="/BackEndAssets/img/sidebar-2.jpg">

    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            Blogy DashBourd
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ is_active('home') }}">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if(auth()->user()->hasPermission('read_users'))
                <li class="nav-item {{ is_active('users') }}">
                    <a  class="nav-link"  href="{{ route('users.index') }}">
                        <i class="material-icons">person</i>
                        <p>Users</p>
                    </a>
                </li>
            @endif

            <li class="nav-item {{ is_active('playlists') }}">
                <a  class="nav-link"  href="{{ route('playlists.index') }}">
                    <i class="material-icons">playlist_add_check</i>
                    <p>Playlists</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('videos') }}">
                <a  class="nav-link"  href="{{ route('videos.index') }}">
                    <i class="material-icons">video_call</i>
                    <p>Videos</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('posts') }}">
                <a  class="nav-link"  href="{{ route('posts.index') }}">
                    <i class="material-icons">book</i>
                    <p>Posts</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('categories') }}">
                <a  class="nav-link"  href="{{ route('categories.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item {{ is_active('skills') }}">
                <a  class="nav-link"  href="{{ route('skills.index') }}">
                    <i class="material-icons">offline_bolt</i>
                    <p>Skills</p>
                </a>
            </li>

            <li class="nav-item {{ is_active('tags') }}">
                <a  class="nav-link"  href="{{ route('tags.index') }}">
                    <i class="material-icons">turned_in_not</i>
                    <p>Tags</p>
                </a>
            </li>


            <li class="nav-item {{ is_active('trashedplaylists') }}">
                <a  class="nav-link"  href="{{ route('trashedplaylists.index') }}">
                    <i class="material-icons">delete</i>
                    <p>Trashed PlayLists</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('trashedvideos') }}">
                <a  class="nav-link"  href="{{ route('trashedvideos.index') }}">
                    <i class="material-icons">delete</i>
                    <p>Trashed Videos</p>
                </a>
            </li>


            <li class="nav-item {{ is_active('trashedposts') }}">
                <a  class="nav-link"  href="{{ route('trashedposts.index') }}">
                    <i class="material-icons">delete</i>
                    <p>Trashed Posts</p>
                </a>
            </li>

{{--            --}}
{{--            <li class="nav-item {{ is_active('messages') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('messages.index') }}">--}}
{{--                    <i class="material-icons">cloud</i>--}}
{{--                    <p>Messages</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ is_active('pages') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('pages.index') }}">--}}
{{--                    <i class="material-icons">content_paste</i>--}}
{{--                    <p>Pages</p>--}}
{{--                </a>--}}
{{--            </li>--}}



            <!-- your sidebar here -->
        </ul>
    </div>
</div>
