        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.profile') }}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Edit Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.book') }}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">List Penjualan Buku</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.book.create') }}" aria-expanded="false"><i class="mdi mdi-cart-outline"></i><span class="hide-menu">Jual Buku</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.book.history') }}" aria-expanded="false"><i class="mdi mdi-history"></i><span class="hide-menu"></span>History</a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>