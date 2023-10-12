<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> OCS - @yield('title')</title>
         

        <!-- Fonts -->
        <link rel="icon" type="image/x-icon" href="{{asset('logo1.ico')}}">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    </head>
    <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2 ">
                <div class="container-fluid"> 
                    <a class="navbar-brand"  href="{{ url('/membership') }}">
                        <img src="{{asset('logo1.jpg')}}" class="rounded-circle" alt="" width="50" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                           
                                <li class="nav-item {{ request()->is('membership*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('membership.index')}}">Registered Member</a>
                                </li> 
                                
                                <li class="nav-item {{ request()->is('payment*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('payment.create')}}">Payment Record</a>
                                </li> 

                                <li class="nav-item {{ request()->is('expense*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('expense.index')}}">Expense</a>
                                </li> 
                                <li class="nav-item {{ request()->is('doners*') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{route('doners.index')}}">Donation</a>
                                </li> 
                                <li class="nav-item {{ request()->is('card*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('card.index')}}">Card</a>
                                </li> 

                                <li class="nav-item dropdown {{ request()->is('emergency*') || request()->is('fee*') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      More
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('fee.index')}}">Registration Fee</a>
                                        <a class="dropdown-item" href="{{route('emergency.index')}}">Emergency Fund</a>
                                         
                                    </div>
                                  </li>
                        </ul>
                        <ul class="navbar-nav ">
                            @if(Auth::user()->role==1)
                            <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('user.index')}}">Users</a>
                            </li>
                            @endif
                            <li class="nav-item {{ request()->is('profile*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('profile.edit')}}">Profile</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  @if(Auth::user()->role==1)
                                   Administrator 
                                   @else 
                                   User 
                                   @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">{{Auth::user()->email}}</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
             
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                    
                                </div>
                              </li>
                        </ul>
                    </div>
                </div>
              </nav>
        </div>
        <main>
            @yield('content')
        </main>
        <footer id="footer" class="bg-dark text-white d-flex-column text-center">
            <hr class="mt-0">
            <!--Social buttons-->
            <div class="text-center">
              <h4>All Right Reserved</h4>
             
            </div>
            <!--/.Social buttons-->
            
            <!--Copyright-->
            <div class="py-3 text-center">
             &copy; Copyright   
              <script>
                document.write(new Date().getFullYear())
              </script> <a href="#">OCS(Overseas Chitrali in Saudi Arabia)</a> 
            </div>
            <!--/.Copyright--> 
          </footer>
          
 
    <!-- End of .container -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('js/custom.js')}}"></script>
         
    </body>
</html>