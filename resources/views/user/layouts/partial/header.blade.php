

        <!-- Start Main Top -->
        <div class="main-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                        <div class="right-phone-box">
                            <p>Call US :- <a href="#"> +88029811393</a></p>
                        </div>
                        <div class="our-link">
                            <ul>
                                <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                                <li><router-link to="/ourLocation"><i class="fas fa-location-arrow"></i> Our location</router-link></li>
                                <li><router-link to="/contactUs"><i class="fas fa-headset"></i> Contact Us</router-link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @guest
                        <div class="dropdown text-right">
                            <a href="#" class="dropdown-toggle text-white font-weight-bold dropdown-background p-2" data-toggle="dropdown">
                                    Sign-In / Sign-Up
                                <i class="fas fa-angle-down pl-1"></i>
                            </a>
                            <ul class="dropdown-menu text-center dropdown-background dropdown-signin">
                                <li class="border-bottom">
                                    <a href="{{ route('register') }}" class="text-white">Sign-Up</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" class="text-white">Sign-In
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @else
                            <div class="dropdown text-right">
                                <a id="navbarDropdown" class=" dropdown-toggle dropdown-background" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <img src="{{URL('uploads/users/profile/'.Auth::user()->image)}}" class=" profileImage" alt="#" style="height: 40px;width:40px;">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right profile-background" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                                    <router-link :to='"/profileChange/{{ Auth::user()->id }}"' class="dropdown-item">Profile-Change</router-link>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Top -->