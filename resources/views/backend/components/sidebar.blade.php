<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header"  style="background-color: #16327a">
      <div>
        <img src="{{ asset($setting->favicon) }}" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <span class="logo-text text-white" >{{ $setting->site_title }}</span>
      </div>
      <div class="toggle-icon ms-auto "> <i class="bi bi-list text-white"></i>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="{{route('admin.home')}}" >
            <div class="parent-icon">
                    <i class="bi bi-house-fill"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
      </li>


      <li>
        <a href="#BlogPost" class="has-arrow">
          <div class="parent-icon">
            <i class="bi bi-grid-fill"></i>
          </div>
          <div class="menu-title">Blog Post</div>
        </a>
        <ul>
        <li class="{{ (request()->is('admin/category*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.category') }}">
                <i class="bi bi-circle"></i>
                {{ __('Category') }}
            </a>
          </li>
          <li class="{{ (request()->is('admin/subcategory*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.subcategory') }}">
                <i class="bi bi-circle"></i>
                {{ __('Sub Category') }}
            </a>
          </li>
          <li class="{{ (request()->is('admin/blogpost*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.blogpost') }}">
                <i class="bi bi-circle"></i>
                {{ __('Post') }}
            </a>
          </li>

          <li class="{{ (request()->is('admin/photo_gallery*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.photo_gallery') }}">
                <i class="bi bi-circle"></i>
                {{ __('PhotoGallery') }}
            </a>
          </li>

          <li class="{{ (request()->is('admin/video*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.video') }}">
                <i class="bi bi-circle"></i>
                {{ __('Video') }}
            </a>
          </li>
          <li class="{{ (request()->is('admin/media_partner*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.media_partner') }}">
                <i class="bi bi-circle"></i>
                {{ __('Media Partner') }}
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon">
            <i class="bi bi-grid-fill"></i>
          </div>
          <div class="menu-title">Home Page</div>
        </a>
        <ul>
            <li class="{{ (request()->is('admin/slider*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.slider') }}">
                    <i class="bi bi-circle"></i>
                    Slider
                </a>
            </li>
            <li class="{{ (request()->is('admin/feature*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.feature') }}">
                    <i class="bi bi-circle"></i>
                    Feature
                </a>
            </li>
            <li class="{{ (request()->is('admin/home-about*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.home-about') }}" >
                    <i class="bi bi-circle"></i>
                    About
                </a>
            </li>
            <li>
                <a href="{{ route('admin.mission') }}">
                    <i class="bi bi-circle"></i>
                    Mission
                </a>
            </li>

            <li class="{{ (request()->is('admin/abilities*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.abilities') }}">
                    <i class="bi bi-circle"></i>
                    Abilities
                </a>
            </li>

            <li class="{{ (request()->is('admin/countdown*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.countdown') }}">
                    <i class="bi bi-circle"></i>
                    Countdown
                </a>
            </li>
            <li class="{{ (request()->is('admin/socialmedia*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.socialmedia') }}">
                    <i class="bi bi-circle"></i>
                    Social Media
                </a>
            </li>
        </ul>

      </li>

      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon">
            <i class="bi bi-grid-fill"></i>
          </div>
          <div class="menu-title">Pages</div>
        </a>
        <ul>
            {{-- <li class="{{ (request()->is('admin/aboutus*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.aboutus')}}">
                    <i class="bi bi-circle"></i>
                    Create new
                </a>
            </li> --}}

            <li class="{{ (request()->is('admin/aboutus*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.aboutus')}}">
                    <i class="bi bi-circle"></i>
                    About us
                </a>
            </li>
            <li class="{{ (request()->is('admin/party_member*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.party_member')}}">
                    <i class="bi bi-circle"></i>
                    Party Member
                </a>
            </li>
            <li class="{{ (request()->is('admin/ideology*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.ideology')}}">
                    <i class="bi bi-circle"></i>
                    Ideology
                </a>
            </li>
        </ul>
      </li>



      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon">
            <i class="bi bi-grid-fill"></i>
          </div>
          <div class="menu-title">eBook </div>
        </a>
        <ul>
            <li class="{{ (request()->is('admin/book_category*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.book_category')}}">
                    <i class="bi bi-circle"></i>
                    Category
                </a>
            </li>

            <li class="{{ (request()->is('admin/book_mangment*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.book_mangment')}}">
                    <i class="bi bi-circle"></i>
                    List
                </a>
            </li>
        </ul>
      </li>

      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon">
            <i class="bi bi-grid-fill"></i>
          </div>
          <div class="menu-title">Communication </div>
        </a>
        <ul>
            <li class="{{ (request()->is('admin/subscriber*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.subscriber')}}">
                    <i class="bi bi-circle"></i>
                    Subscriber
                </a>
            </li>
            <li class="{{ (request()->is('admin/ask-about-us*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.ask-about-us')}}">
                    <i class="bi bi-circle"></i>
                    Ask about us
                </a>
            </li>

            <li class="{{ (request()->is('admin/joining*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.joining')}}">
                    <i class="bi bi-circle"></i>
                    Joining
                </a>
            </li>
            <li class="{{ (request()->is('admin/comments*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.comments')}}">
                    <i class="bi bi-circle"></i>
                    Comments
                </a>
            </li>
            <li class="{{ (request()->is('admin/contact*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.contact')}}">
                    <i class="bi bi-circle"></i>
                    Contact
                </a>
            </li>
            <li class="{{ (request()->is('admin/visitor*')) ? 'mm-active' : '' }}">
                <a href="{{route('admin.visitor')}}">
                    <i class="bi bi-circle"></i>
                    Visitor
                </a>
            </li>
        </ul>
      </li>

      <li class="{{ (request()->is('admin/filemanager*')) ? 'mm-active' : '' }}">
        <a href="{{route('admin.filemanager')}}" >
            <div class="parent-icon">
                <i class="bi bi-grid-fill"></i>
            </div>
            <div class="menu-title">File Manager</div>
        </a>
      </li>




      <li class="menu-label">Setting</li>
      <li>
        <a class="has-arrow" href="#">
            <div class="parent-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            </div>
            <div class="menu-title">Setting</div>
        </a>
        <ul>

        <li class="{{ (request()->is('admin/menu*')) ? 'mm-active' : '' }}{{ (request()->is('admin/activemenu*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.menu') }}">
                <i class="bi bi-circle"></i>
                Menu
            </a>
        </li>
        <li class="{{ (request()->is('admin/permission*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.permission') }}">
                <i class="bi bi-circle"></i>
                Permission
            </a>
        </li>

        <li class="{{ (request()->is('admin/roles*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.roles') }}">
                <i class="bi bi-circle"></i>
                Roles
            </a>
        </li>


        <li class="{{ (request()->is('admin/role_permission*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.role_permission') }}">
                <i class="bi bi-circle"></i>
                Roles & Permission
            </a>
        </li>

        <li class="{{ (request()->is('admin/adminuser*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.adminuser') }}">
                <i class="bi bi-circle"></i>
                    User
            </a>
          </li>


          <li class="{{ (request()->is('admin/seo*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.seo.setting') }}">
                <i class="bi bi-circle"></i>
                SEO
            </a>
          </li>

          <li class="{{ (request()->is('admin/setting*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admin.setting') }}">
                <i class="bi bi-circle"></i>
                Site Setting
            </a>
            </li>

            <li class="{{ (request()->is('admin/setting/bgimage*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.setting.bgimage') }}">
                    <i class="bi bi-circle"></i>
                     Background Image
                </a>
            </li>


            <li class="{{ (request()->is('admin/settings/cacheclear*')) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.settings.cacheclear') }}">
                    <i class="bi bi-circle"></i>
                    Cache clear
                </a>
            </li>


        </ul>
      </li>

    </ul>
    <!--end navigation-->
 </aside>
