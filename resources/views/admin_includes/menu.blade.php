<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="/backend/images/icon/logo-3.jpg" alt="Cool Admin" style="width:100px;height:70px;" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a class="js-arrow" href="/index">
                        <i class="fas fa-tachometer-alt"></i>Quản lí chính</a>
                    <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul> -->
                </li>
                <!-- <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                <li class="active">
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li> -->
                <li class="has-sub">
                    <div class="js-arrow">
                        <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Loại sản phẩm</span>
                    </div>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/all-category"><i class="fas fa-eye"></i>Hiển thị loại sản phẩm</a>
                        </li>
                        <li>
                            <a href="/add-category"><i class="fas fa-plus"></i>Thêm loại sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Sản phẩm</span>
                    </div>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/all-product"><i class="fas fa-eye"></i>Hiển thị sản phẩm</a>
                        </li>
                        <li>
                            <a href="/add-product"><i class="fas fa-plus"></i>Thêm sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <a href="/show-donhang"><i class="fas fa-shopping-cart"></i>Quản lí đơn hàng</a>
                    </div>
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Mã giảm giá</span>
                    </div>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/all-magiamgia"><i class="fas fa-eye"></i>Hiển thị mã giảm giá</a>
                        </li>
                        <li>
                            <a href="/add-magiamgia"><i class="fas fa-plus"></i>Thêm mã giảm giá</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <a href="/phi-van-chuyen"><i class="fas fa-truck"></i><span style="padding: 0px 0px 0px 10px;">Phí vận chuyển</span></a>
                        <!-- <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Phí vận chuyển</span> -->
                    </div>
                    <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href=""><i class="fas fa-eye"></i>Hiển thị mã giảm giá</a>
                        </li>
                        <li>
                            <a href=""><i class="fas fa-plus"></i>Thêm mã giảm giá</a>
                        </li>
                    </ul> -->
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <a href="/all-banner"><i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Quản lí Banner</span></a>
                        <!-- <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Phí vận chuyển</span> -->
                    </div>
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <a href="/all-size"><i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Quản lí size giày</span></a>
                        <!-- <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Phí vận chuyển</span> -->
                    </div>
                </li>
                <li class="has-sub">
                    <div class="js-arrow">
                        <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Quản lý tin tức</span>
                    </div>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/all-tintuc"><i class="fas fa-eye"></i>Hiển thị tin tức</a>
                        </li>
                        <li>
                            <a href="/add-tintuc"><i class="fas fa-plus"></i>Thêm tin tức</a>
                        </li>
                    </ul>
                </li>

                @if(Auth()->user()->admin_email=="admin@gmail.com")
                <li class="has-sub">
                    <div class="js-arrow">
                        <a href="/all-user"><i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Quản lí tài khoản</span></a>
                        <!-- <i class="fas fa-copy"></i><span style="padding: 0px 0px 0px 10px;">Phí vận chuyển</span> -->
                    </div>
                </li>
                @else
                <span></span>
                @endif

                <!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </div>
</aside>