@php
    $id                     = Auth::user()->id;
    $profile                = \App\Models\User::find($id);
    $unreadsubscribercount  = \App\Models\Subscriber::whereNull('read_at')->count();
    $subscriber             = \App\Models\Subscriber::whereNull('read_at')->get();
    $unreadAskaboutuscount  = \App\Models\Askaboutus::whereNull('read_at')->count();
    $askaboutus             = \App\Models\Askaboutus::whereNull('read_at')->get();
    $unreadJoiningcount     = \App\Models\Joining::whereNull('read_at')->count();
    $Joining                = \App\Models\Joining::whereNull('read_at')->get();
    $unreadCommentcount     = \App\Models\Comment::whereNull('read_at')->count();
    $comment                = \App\Models\Comment::whereNull('read_at')->get();
    $unreadContactcount     = \App\Models\Contact::whereNull('read_at')->count();
    $contact                = \App\Models\Contact::whereNull('read_at')->get();

@endphp

<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="mobile-toggle-icon fs-3">
          <i class="bi bi-list"></i>
        </div>
        <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
            <input class="form-control" type="text" placeholder="Type here to search">
            <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
        </form>
        <div class="top-navbar-right ms-auto">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item search-toggle-icon">
              <a class="nav-link" href="#">
                <div class="">

                  <i class="bi bi-search"></i>
                </div>
              </a>
          </li>

          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="/"  target="_blank" >
                <i class="bi bi-globe" title="Website"></i>
              </a>
          </li>



          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="messages">
                @if($unreadContactcount)
                    <span class="notify-badge">{{ $unreadContactcount }}</span>
                @else

                @endif
                <i class="bi bi-book-half" title="Contact"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-0">
              <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0">Contact</h5>
              </div>
             <div class="header-message-list p-2">
                @forelse($contact as $item)
                 <a class="dropdown-item" href="{{ route('admin.contact.read-at', $item->id) }}">
                   <div class="d-flex align-items-center">
                      <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">
                              {{ $item->name }}
                            <span class="msg-time float-end text-secondary">
                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </span>
                        </h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">
                            {{ Str::limit($item->subject,40)  }}
                        </small>
                      </div>
                   </div>
                 </a>
                 @empty
                 <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">
                            No contact notification

                         </h6>

                       </div>
                    </div>
                  </a>
                 @endforelse

            </div>
            <div class="p-2">
              <div><hr class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.contact') }}">
                  <div class="text-center">View All Contact</div>
                </a>
            </div>
           </div>
          </li><!-- End Contact-->


          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="messages">
                @if($unreadCommentcount)
                    <span class="notify-badge">{{ $unreadCommentcount }}</span>
                @else

                @endif
                <i class="bi bi-chat-left-text-fill" title="Comments"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-0">
              <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0">Comments</h5>
              </div>
             <div class="header-message-list p-2">
                @forelse($comment as $item)
                 <a class="dropdown-item" href="{{ route('admin.comments.read-at', $item->id) }}">
                   <div class="d-flex align-items-center">
                      <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">
                              {{ Str::limit($item->body,40)  }}
                            <span class="msg-time float-end text-secondary">

                            </span>
                        </h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">
                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                        </small>
                      </div>
                   </div>
                 </a>
                 @empty
                 <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">
                            No Joining notification

                         </h6>

                       </div>
                    </div>
                  </a>
                 @endforelse

            </div>
            <div class="p-2">
              <div><hr class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.comments') }}">
                  <div class="text-center">View All Comments</div>
                </a>
            </div>
           </div>
          </li><!-- End Comments-->


          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="messages">
                @if($unreadJoiningcount)
                    <span class="notify-badge">{{ $unreadJoiningcount }}</span>
                @else

                @endif
                {{-- <i class="bi bi-chat-left-text-fill" title="Joining"></i> --}}
                <i class="bi bi-people-fill" title="Joining"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-0">
              <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0">Joining</h5>
              </div>
             <div class="header-message-list p-2">
                @forelse($Joining as $item)
                 <a class="dropdown-item" href="{{ route('admin.joining.read-at', $item->id) }}">
                   <div class="d-flex align-items-center">
                      <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">
                            {{ $item->name }}
                            <span class="msg-time float-end text-secondary">
                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </span>
                        </h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">
                            {{ Str::limit($item->message,40)  }}
                        </small>
                      </div>
                   </div>
                 </a>
                 @empty
                 <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">
                            No Joining notification

                         </h6>

                       </div>
                    </div>
                  </a>
                 @endforelse

            </div>
            <div class="p-2">
              <div><hr class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.joining') }}">
                  <div class="text-center">View All Joining</div>
                </a>
            </div>
           </div>
          </li><!-- End Joining-->

          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="messages">
                @if($unreadAskaboutuscount)
                    <span class="notify-badge">{{ $unreadAskaboutuscount }}</span>
                @else

                @endif
                <i class="bi bi-info-circle-fill" title="Ask about us"></i>
                {{-- <i class="bi bi-chat-right-fill" title="Ask about us"></i> --}}
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-0">
              <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0">Ask about us</h5>
              </div>
             <div class="header-message-list p-2">
                @forelse($askaboutus as $item)
                 <a class="dropdown-item" href="{{ route('admin.ask-about-us.read-at', $item->id) }}">
                   <div class="d-flex align-items-center">
                      <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">
                            {{ $item->name }}
                            <span class="msg-time float-end text-secondary">
                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </span>
                        </h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">
                            {{ Str::limit($item->message,40)  }}
                        </small>
                      </div>
                   </div>
                 </a>
                 @empty
                 <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <i class="bi bi-lightning-charge-fill" width="50" height="50"> </i>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">
                            No Ask about us notification

                         </h6>

                       </div>
                    </div>
                  </a>
                 @endforelse

            </div>
            <div class="p-2">
              <div><hr class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.ask-about-us') }}">
                  <div class="text-center">View All Ask about us</div>
                </a>
            </div>
           </div>
          </li><!-- End Ask about us-->

          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="notifications">
                @if($unreadsubscribercount)
                    <span class="notify-badge">{{ $unreadsubscribercount }}</span>
                @else

                @endif
                <i class="bi bi-bell-fill" title="Subscriber"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-0">
              <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0" >Subscriber</h5>
              </div>
              <div class="header-notifications-list p-2">
                @forelse($subscriber as $item)
                    <a class="dropdown-item" href="{{ route('admin.subscriber.read-at', $item->id) }}">
                        <div class="d-flex align-items-center">
                            <div class="notification-box bg-light-success text-success">
                                <i class="bi bi-lightbulb-fill"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">
                                {{ $item->email}}
                            </h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">
                                Subscriber  {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                            <div class="notification-box bg-light-success text-success">
                                <i class="bi bi-lightbulb-fill"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">
                                No Subscriber notification
                            </h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">

                            </small>
                            </div>
                        </div>
                    </a>
                @endforelse
             </div>
             <div class="p-2">
               <div><hr class="dropdown-divider"></div>
                 <a class="dropdown-item" href="{{ route('admin.subscriber') }}">
                   <div class="text-center">View All Subscriber</div>
                 </a>
             </div>
            </div>
          </li><!--End Subscriber-->

          </ul>
          </div>
          <div class="dropdown dropdown-user-setting">
            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="user-setting d-flex align-items-center gap-3">
                <img src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('upload/no_image.jpg') }}" class="user-img" alt="">
                <div class="d-none d-sm-block">
                   <p class="user-name mb-0">{{ $profile->name }}</p>
                  <small class="mb-0 dropdown-user-designation">{{ $profile->username }}</small>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
               <li>
                  <a class="dropdown-item" href="{{ route('admin.profile') }}">
                      <div class="d-flex align-items-center">
                            <div class="">
                                <i class="fadeIn animated bx bx-user-pin" style="font-size: 22px;"></i>
                            </div>
                            <div class="ms-3">
                                <span>Profile</span>
                            </div>
                      </div>
                  </a>
                </li>
                <li>
                <a class="dropdown-item" href="{{ route('admin.change.password') }}">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <i class="fadeIn animated bx bx-key" style="font-size: 22px;"></i>
                        </div>
                            <div class="ms-3">
                                <span>{{ __('Change Password') }}</span>
                            </div>
                      </div>
                </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a class="dropdown-item" href="{{ route('admin.logout') }}">
                     <div class="d-flex align-items-center">
                       <div class="">
                        <i class="fadeIn animated bx bx-log-out" style="font-size: 22px;"></i>
                        </div>
                       <div class="ms-3">
                            <span>Logout</span>
                        </div>
                     </div>
                   </a>
                </li>
            </ul>
          </div>
    </nav>
  </header>
