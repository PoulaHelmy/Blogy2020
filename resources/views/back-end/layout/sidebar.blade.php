
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
            @if(auth()->user()->hasRole('super_admin'))
                <li class="nav-item {{ is_active('controls') }}">
                    <a  class="nav-link"  href="{{ route('controls.index') }}">
                        <i class="material-icons">person</i>
                        <p>Users Control's</p>
                    </a>
                </li>
            @endif
            @permission('read_playlists')
            <li class="nav-item {{ is_active('playlists') }}">
                <a  class="nav-link"  href="{{ route('playlists.index') }}">
                    <i class="material-icons">playlist_add_check</i>
                    <p>Playlists</p>
                </a>
            </li>
            @endpermission
            @permission('read_videos')
            <li class="nav-item {{ is_active('videos') }}">
                <a  class="nav-link"  href="{{ route('videos.index') }}">
                    <i class="material-icons">video_call</i>
                    <p>Videos</p>
                </a>
            </li>
            @endpermission
            @permission('read_posts')
            <li class="nav-item {{ is_active('posts') }}">
                <a  class="nav-link"  href="{{ route('posts.index') }}">
                    <i class="material-icons">book</i>
                    <p>Posts</p>
                </a>
            </li>
            @endpermission

            @permission('read_tags','read_categories','read_skills')
            <li class="nav-item {{ is_active('secitems') }}" rel="tooltip"   data-original-title="Here You Find Tags, Skills, Categories Control's">
                <a  class="nav-link"  href="{{ route('secitems.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Secondary Items</p>
                </a>
            </li>
            @endpermission


            @role('super_admin')
            <li class="nav-item {{ is_active('trashedItems') }}"rel="tooltip"   data-original-title="Here You Find All Trashed Control's">
                <a  class="nav-link"  href="{{ route('trashedItems.index') }}">
                    <i class="material-icons">delete</i>
                    <p>Trashed Items</p>
                </a>
            </li>
            @endrole





{{--            <li class="nav-item {{ is_active('categories') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('categories.index') }}">--}}
{{--                    <i class="material-icons">bubble_chart</i>--}}
{{--                    <p>Categories</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item {{ is_active('skills') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('skills.index') }}">--}}
{{--                    <i class="material-icons">offline_bolt</i>--}}
{{--                    <p>Skills</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item {{ is_active('tags') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('tags.index') }}">--}}
{{--                    <i class="material-icons">turned_in_not</i>--}}
{{--                    <p>Tags</p>--}}
{{--                </a>--}}
{{--            </li>--}}


{{--            <li class="nav-item {{ is_active('trashedplaylists') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('trashedplaylists.index') }}">--}}
{{--                    <i class="material-icons">delete</i>--}}
{{--                    <p>Trashed PlayLists</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ is_active('trashedvideos') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('trashedvideos.index') }}">--}}
{{--                    <i class="material-icons">delete</i>--}}
{{--                    <p>Trashed Videos</p>--}}
{{--                </a>--}}
{{--            </li>--}}


{{--            <li class="nav-item {{ is_active('trashedposts') }}">--}}
{{--                <a  class="nav-link"  href="{{ route('trashedposts.index') }}">--}}
{{--                    <i class="material-icons">delete</i>--}}
{{--                    <p>Trashed Posts</p>--}}
{{--                </a>--}}
{{--            </li>--}}

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
