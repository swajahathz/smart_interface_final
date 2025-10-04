
            <aside class="app-sidebar sticky" id="sidebar">

                <!-- Start::main-sidebar-header -->
                 <div class="main-sidebar-header">
                    <a href="{{url('/')}}" class="header-logos">
                        {!! $domainSettings['logo'] !!}
                    </a>
                </div>
                <!-- End::main-sidebar-header -->

                <!-- Start::main-sidebar -->
                <div class="main-sidebar" id="sidebar-scroll">

                    <!-- Start::nav -->
                    <nav class="main-menu-container nav nav-pills flex-column sub-open">
                        <div class="slide-left" id="slide-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                        </div>
                        <ul class="main-menu">

                            <li class="slide">
                                <a href="{{url('dashboard')}}" class="side-menu__item">
                                    <i class='bx bxs-dashboard side-menu__icon'></i>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">Analytics</span></li>
                            <!-- End::slide__category -->
                            
                            <li class="slide">
                                <a href="{{url('subscriber/online')}}" class="side-menu__item">
                                <i class='bx bx-world bx-flashing side-menu__icon'></i>
                                    <span class="side-menu__label">Realtime</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="{{url('buglogs')}}" class="side-menu__item">
                                <i class='bx bx-bug side-menu__icon'></i>
                                    <span class="side-menu__label">Bug Logs</span>
                                </a>
                            </li>

                          @php
                        $apiUrll = config('app.api_base_url');
                        @endphp
                        
                        @if ($apiUrll === 'https://smartradapi.alburakinternet.net.pk/api')
                        
                         <li class="slide__category"><span class="category-name">Payments Gateway</span></li>
                        
                        <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-universal-access side-menu__icon"></i>
                                    <span class="side-menu__label">Online Topup</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide">
                                        <a href="{{url('1link')}}" class="side-menu__item">1 Bill</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('jazz')}}" class="side-menu__item">JazzCash</a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                             <!-- Start::slide__category -->
                             <li class="slide__category"><span class="category-name">Subscriber info</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx-universal-access side-menu__icon"></i>
                                    <span class="side-menu__label">Subscriber</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0);">Pages</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('subscriber')}}" class="side-menu__item">All Subscriber</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('subscriber_add')}}" class="side-menu__item">Add Subscriber</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('subscriber/active/list')}}" class="side-menu__item">Active</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('subscriber/expire/list')}}" class="side-menu__item">Expire</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('subscriber/upcomingexpire/list')}}" class="side-menu__item">Upcoming Expire</a>
                                    </li>
                                </ul>
                            </li>
                            
                               
                                                         <!-- Start::slide__category -->
                             <li class="slide__category"><span class="category-name">Managers info</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="bx bx bxs-user-detail side-menu__icon"></i>
                                    <span class="side-menu__label">Manager</span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0);">Pages</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('manager')}}" class="side-menu__item">Manager List</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{url('manager/add')}}" class="side-menu__item">Add</a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">Reporting</span></li>
                            <!-- End::slide__category -->
                            <li class="slide">
                                <a href="{{url('topup/invoices')}}" class="side-menu__item">
                                <i class='bx bx-wallet side-menu__icon'></i>
                                    <span class="side-menu__label">Topup Invoices</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="{{url('commission/invoices')}}" class="side-menu__item">
                                <i class='bx bx-wallet side-menu__icon'></i>
                                    <span class="side-menu__label">Commission Invoices</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="{{url('recharge/invoices')}}" class="side-menu__item">
                                <i class='bx bxs-report side-menu__icon'></i>
                                    <span class="side-menu__label">Recharge Invoices</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="{{url('commission')}}" class="side-menu__item">
                                <i class='bx  bx-dollar-circle side-menu__icon'  ></i> 
                                    <span class="side-menu__label">Commission</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="{{url('wallet/ledger')}}" class="side-menu__item">
                                <i class='bx bx-list-check side-menu__icon'></i>
                                    <span class="side-menu__label">Wallet Ledgers</span>
                                </a>
                            </li>
                      
                   
                            
                            
                            <li class="slide">
                                <a href="{{url('logout')}}" class="side-menu__item">
                                <i class='bx bx-log-out side-menu__icon'></i>
                                    <span class="side-menu__label">Logout</span>
                                </a>
                            </li>

                      
                      
                            <!-- End::slide -->
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->

            </aside>