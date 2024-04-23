<div class="sidebar p-0">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar-container">
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li>
                <a href="{{ route('index') }}" class="nav-link py-4 mb-5 icon {{ request()->is('/') ? 'active' : '' }}"><i
                        class="fa-solid fa-shop fa-3x" style="color: #ffffff;"></i></a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}"
                    class="nav-link py-4 mb-5 icon {{ request()->is('admin/category') ? 'active' : '' }}"><i
                        class="fa-solid fa-tag fa-3x" style="color: #ffffff;"></i></a>
            </li>

            <li>
                <a href="{{ route('admin.product.index') }}"
                    class="nav-link py-4 mb-5 icon {{ request()->is('admin/product') ? 'active' : '' }}"><i
                        class="fa-solid fa-pen-to-square fa-3x" style="color: #ffffff;"></i></a>
            </li>
            <li>
                <a href="{{ route('admin.customer.index') }}"
                    class="nav-link py-4 mb-5 icon {{ request()->is('admin/customer') ? 'active' : '' }}"><i
                        class="fa-solid fa fa-users fa-3x" style="color: #ffffff;"></i></a>
            </li>
            <li>
                <a href="#" class="nav-link py-4 mb-5 icon"><i class="fa-solid fa-address-book fa-3x"
                        style="color: #ffffff;"></i></a>
            </li>

        </ul>
        <a href="" class="nav-link py-4 d-flex justify-content-center align-items-center logout"><i
                class="fa-solid fa-right-from-bracket fa-3x" style="color: #ffffff;"></i></a>
    </div>
</div>
