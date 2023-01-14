<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{url('/img/favicon.png')}}" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="{{url('/admin/css/app.css')}}">
    @yield('css')
    <style type="text/css">
        .w-5 { 
            width: 5px;
        }
        .h-5 { 
            height: 5px;
        }
        .dataTables_wrapper .row div:nth-child(2){
            display: flex!important;
        }
        .dataTables_filter{
            margin-left: auto !important;
        }
        .dataTables_paginate{
            margin-left: auto !important;
        }
       .loader {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 ) 
                        url('{{url("/img/ajax-loader.gif")}}') 
                        50% 50% 
                        no-repeat;
        }
        body.loading .loader {
            overflow: hidden;   
        }
        body.loading .loader {
            display: block;
        }
        .mw-60{
            max-width: 60%;
        }
        #dashboard-nav .nav-item .indicator{
            width: 14px;
            height: 14px;
            color:white;
            padding-left: 6px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand navbar-light fixed-top border-bottom bg-light" id="dashboard-nav" >
            <a href="{{route('admin.home')}}" class="navbar-brand col-sm-3 col-md-2 mr-0">
                <img src="{{url('/front/img/logo.jpg')}}" class="img-fluid mw-60" alt="town house logo image" />
            </a>
            <ul class="navbar-nav px-3 ml-sm-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle='dropdown'>
                        <i class="fas fa-bell"></i>
                        @if(Auth::user()->unreadNotifications->count()>0)<span class="indicator">{{Auth::user()->unreadNotifications->count()}}</span>@endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <h6><a href="{{route('admin.notification.index')}}">Notifications</a></h6>
                        </a>
                        @if(Auth::user()->unreadNotifications->count() > 0)
                        <div class="dropdown-divider"></div>
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            @if($loop->index <= 2)
                            <a href="{{$notification->data['link']}}" class="dropdown-item">
                                {{$notification->data['message']}}
                                <span class="float-right">
                                    <small>{{date('d M', strtotime($notification->created_at))}}</small>
                                </span>
                            </a>
                            @endif
                        @endforeach
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle='dropdown'>
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                       {{--  <a href="#" class="dropdown-item">
                            <i class="fas fa-user"></i> Account
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog"></i> setting
                        </a> --}}
                        <a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>Log Out</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="menu-icon">
                            <div class="menu-bar"></div>
                            <div class="menu-bar"></div>
                            <div class="menu-bar"></div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container-fluid">
            <div class="row pt-5">
                <nav class="col-lg-2 col-md-2  d-block sidebar overflow-auto">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <a href="javascript:void(0)" class="close-btn d-inline d-md-none">&times;</a>
                            {{--  <li class="nav-item profile-img">
                                <a href="javascript:void(0)" class="nav-link active">
                                    <img src="{{url('admin/img/student.png')}}" alt="" />
                                    <h4> Charlotte Deo</h4> 
                                    <!-- <p><small>Nuerologist</small></p> -->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard.html" class="nav-link active">
                                    <i class="fas fa-hospital"></i> Dashboard</a>
                            </li> --}}
                            @can('role-list')
                                <li class="nav-item"> 
                                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                                        <i class="fas fa-user-alt"></i> Roles
                                    </a>
                                </li>
                            @endcan
                            @can('users-list')
                                <li class="nav-item"> 
                                    <a href="{{route('admin.users.index')}}" class="nav-link">
                                        <i class="fas fa-user-alt"></i>Employees 
                                    </a>
                                </li>
                            @endcan
                            @can('user-list')   
                                <li class="nav-item"> 
                                    <a href="#user" class="nav-link" data-toggle="collapse">
                                        <i class="far fa-times-circle"></i> User
                                    </a>
                                    @can('user-list')
                                        <div id="user" class="collapse collapse-nav">
                                            <a href="{{route('admin.user')}}" class="nav-link"> <small>Users</small></a>
                                        </div>
                                    @endcan
                                    @can('user-verification-list')
                                        <div id="user" class="collapse collapse-nav">
                                            <a href="{{route('admin.user.verification')}}" class="nav-link"> <small>User verification</small></a>
                                        </div>
                                    @endcan
                                </li>
                            @endcan   
                            @can('cowork-space-owner-list') 
                                <li class="nav-item"> 
                                    <a href="{{route('admin.co-work-space.owners')}}" class="nav-link">
                                        <i class="fas fa-user-alt"></i> Co-work Space Owner
                                    </a>
                                </li>
                            @endcan
                            @can('professional-interests-list') 
                                <li class="nav-item"> 
                                    <a href="{{route('admin.professional-interests')}}" class="nav-link">
                                        <i class="fas fa-user-alt"></i> Professional Interests
                                    </a>
                                </li>
                            @endcan
                            @can('social-interests-list') 
                                <li class="nav-item"> 
                                    <a href="{{route('admin.social-interests')}}" class="nav-link">
                                        <i class="fas fa-user-alt"></i> Social Interests
                                    </a>
                                </li>
                            @endcan
                            @can('cowork-space-list')
                                <li class="nav-item"> 
                                    <a href="{{route('admin.co-work-space')}}" class="nav-link">
                                        <i class="fas fa-user-circle"></i> Co-Work Space
                                    </a>
                                    {{-- <div id="coWorkSapceCollapse" class="collapse collapse-nav">
                                        <a href="{{route('admin.co-work-space')}}" class="nav-link"> Co Work Space Listing</a>
                                    </div> --}}
                                </li>
                            @endcan
                            @can('cowork-space-list')
                                <li class="nav-item"> 
                                    <a href="{{route('admin.co-work-space.packages.index')}}" class="nav-link">
                                        <i class="fas fa-user-circle"></i> Co-Work Space Packages
                                    </a>
                                    {{-- <div id="coWorkSapceCollapse" class="collapse collapse-nav">
                                        <a href="{{route('admin.co-work-space')}}" class="nav-link"> Co Work Space Listing</a>
                                    </div> --}}
                                </li>
                            @endcan
                            @can('cowork-space-booking-list')    
                                <li class="nav-item"> 
                                    <a href="{{route('admin.co-work-space-booking')}}" class="nav-link">
                                        <i class="fas fa-user-circle"></i> Co-Work Space Booking
                                    </a>
                                    {{-- <div id="coWorkSapceCollapse" class="collapse collapse-nav">
                                        <a href="{{route('admin.co-work-space')}}" class="nav-link"> Co Work Space Listing</a>
                                    </div> --}}
                                </li>
                            @endcan    
                            @can('terms-and-condition-list')    
                                <li class="nav-item"> 
                                    <a href="#terms" class="nav-link" data-toggle="collapse">
                                        <i class="far fa-times-circle"></i> Terms & Condition
                                    </a>
                                    @can('terms-and-condition-customized-enquiry-list')
                                        <div id="terms" class="collapse collapse-nav">
                                            <a href="{{route('admin.term.condition')}}" class="nav-link"> <small>Customised Enquiries</small></a>
                                        </div>
                                    @endcan
                                    @can('terms-and-condition-setting-list')
                                        <div id="terms" class="collapse collapse-nav">
                                            <a href="{{route('admin.term.condition.setting')}}" class="nav-link"> <small>Setting</small></a>
                                        </div>
                                    @endcan
                                </li>
                            @endcan
                            @can('cowork-space-booking-availability-list')
                                <li class="nav-item"> 
                                    <a href="{{route('admin.check-booking-available')}}" class="nav-link">
                                        <i class="fas fa-user-circle"></i>Booking Availability Check
                                    </a>
                                    {{-- <div id="coWorkSapceCollapse" class="collapse collapse-nav">
                                        <a href="{{route('admin.co-work-space')}}" class="nav-link"> Co Work Space Listing</a>
                                    </div> --}}
                                </li>
                            @endcan
                            {{-- <li class="nav-item"> 
                                <a href="{{route('admin.co-live-space')}}" class="nav-link">
                                    <i class="fas fa-user-circle"></i> Co-Live Space
                                </a>
                                <a href="#coLiveSapceCollapse" class="nav-link" data-toggle="collapse">
                                    <i class="fas fa-user-circle"></i> CoLiveSpace
                                </a>
                                <div id="coLiveSapceCollapse" class="collapse collapse-nav">
                                    <a href="{{route('admin.co-live-space')}}" class="nav-link"> CoLiveSpace Listing</a>
                                </div>
                            </li> --}}
                            @can('enquiry-list')
                                <li class="nav-item"> 
                                    <a href="#enquiry" class="nav-link" data-toggle="collapse">
                                        <i class="far fa-times-circle"></i> Enquiry
                                    </a>
                                    @can('enquiry-cowork-space-list')
                                        <div id="enquiry" class="collapse collapse-nav">
                                            <a href="{{route('admin.enquiry')}}" class="nav-link"> <small>CoWorkSpace</small></a>
                                        </div>
                                    @endcan
                                    @can('enquiry-cowork-space-membership-list')
                                        <div id="enquiry" class="collapse collapse-nav">
                                            <a href="{{route('admin.membership-enquiry')}}" class="nav-link"> <small>CoWorkSpace Membership</small> </a>
                                        </div>
                                    @endcan
                                    @can('enquiry-cowork-space-tourschedule-list')    
                                        <div id="enquiry" class="collapse collapse-nav">
                                            <a href="{{route('admin.schedule-tour')}}" class="nav-link"> <small>CoWorkSpace Tour Schedule </small></a>
                                        </div>
                                    @endcan    
                                </li>
                            @endcan    
                           {{--  <li class="nav-item">
                                <a href="payment-list.html" class="nav-link active">
                                    <i class="far fa-money-bill-alt"></i> Payment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="membership.html" class="nav-link active">
                                    <i class="fas fa-user-plus"></i> Membership
                                </a>
                            </li> --}}
                            @can('facility-list')
                                <li class="nav-item"> 
                                    <a href="#facilities" class="nav-link" data-toggle="collapse">
                                        <i class="fas fa-user-circle"></i> Facility
                                    </a>
                                    <div id="facilities" class="collapse collapse-nav">
                                        {{-- <a  href="{{route('admin.facilities')}}" class="nav-link">
                                            Add facilities
                                        </a> --}}
                                        <a  href="{{route('admin.listFacilities')}}" class="nav-link">
                                            <small>List facilities</small>
                                        </a>
                                    </div>
                                </li>
                            @endcan
                            @can('amenity-list')
                                <li class="nav-item"> 
                                    <a href="#amenities" class="nav-link" data-toggle="collapse">
                                        <i class="fas fa-user-circle"></i> Amenities
                                    </a>
                                    <div id="amenities" class="collapse collapse-nav">
                                        <a  href="{{route('admin.amenity-category')}}" class="nav-link">
                                            Amenity Category
                                        </a>
                                        <a  href="{{route('admin.amenities')}}" class="nav-link">
                                            <small>Amenities</small>
                                        </a>
                                    </div>
                                </li>
                            @endcan 
                            @can('price-setting-list')   
                                <li class="nav-item"> 
                                    <a href="{{route('admin.price-setting.index')}}" class="nav-link" >
                                        <i class="fas fa-user-circle"></i> Price Setting
                                    </a>
                                </li>
                            @endcan
                            @can('algorithm-list')    
                                <li class="nav-item"> 
                                    <a href="{{route('admin.algorithms')}}" class="nav-link" >
                                        <i class="fas fa-user-circle"></i> Algorithm
                                    </a>
                                </li>
                            @endcan
                            @can('about-list') 
                                <li class="nav-item"> 
                                    <a href="#about" class="nav-link" data-toggle="collapse">
                                        <i class="far fa-times-circle"></i> About
                                    </a>
                                    @can('about-blogspot-list')
                                        <div id="about" class="collapse collapse-nav">
                                            <a href="{{route('admin.about.blogspot')}}" class="nav-link"> <small>BlogSpot</small></a>
                                        </div>
                                    @endcan
                                    @can('about-team-list')    
                                        <div id="about" class="collapse collapse-nav">
                                            <a href="{{route('admin.about.team')}}" class="nav-link"> <small>Team</small> </a>
                                        </div>
                                    @endcan
                                    @can('about-story-list')    
                                        <div id="about" class="collapse collapse-nav">
                                            <a href="{{route('admin.about.story')}}" class="nav-link"> <small>Story</small> </a>
                                        </div>
                                    @endcan
                                    @can('about-terms-list')    
                                        <div id="about" class="collapse collapse-nav">
                                            <a href="{{route('admin.about.terms')}}" class="nav-link"> <small>Terms and Condition</small> </a>
                                        </div>
                                    @endcan
                                </li>
                            @endcan
                            @can('develop-list')     
                                <li class="nav-item"> 
                                    <a href="{{route('admin.develop')}}" class="nav-link" >
                                        <i class="fas fa-user-circle"></i> Develop
                                    </a>
                                </li>
                            @endcan
                            @can('promo-code-list')     
                                <li class="nav-item"> 
                                    <a href="{{route('admin.promo-codes')}}" class="nav-link" >
                                        <i class="fas fa-user-circle"></i> Promo Code
                                    </a>
                                </li>
                            @endcan
                            @can('transaction-list')     
                                <li class="nav-item"> 
                                    <a href="#transactions" class="nav-link" data-toggle="collapse">
                                        <i class="far fa-times-circle"></i> Transactions
                                    </a>
                                    @can('transaction-cws-listing-payment')
                                        <div id="transactions" class="collapse collapse-nav">
                                            <a href="{{route('admin.transaction.listing')}}" class="nav-link"> <small>CoWorkSpace Listing Payments</small></a>
                                        </div>
                                    @endcan
                                    @can('transaction-cws-booking-payment')    
                                        <div id="transactions" class="collapse collapse-nav">
                                            <a href="{{route('admin.transaction.booking')}}" class="nav-link"> <small>CoWorkSpace Booking Payments</small> </a>
                                        </div>
                                    @endcan    
                                </li>
                            @endcan    
                        </ul>
                    </div>
                </nav>
                <div role="main" class="main col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript" src="{{url('admin/js/app.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".menu-icon").click(function() {
                $(".sidebar").css("width","50%");
                $(".sidebar .sidebar-sticky").css("display","block");
            });
            $(".sidebar .sidebar-sticky .close-btn").click(function () {
                $(".sidebar").css("width","0");
                $(".sidebar .sidebar-sticky").css("display","none");    
            });

        });
        setTimeout(function() {
            $('.time-out-alert').fadeOut('fast');
        }, 3000); 
</script>
    @yield('js')
</body>
</html>