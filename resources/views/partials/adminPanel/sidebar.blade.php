<ul class="metismenu" id="menu">
    {{-- <li>
        <a href="{{route("dashboard")}}">
            <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
            <div class="menu-title">{{ __('admin.dashboard') }}</div>
        </a>
    </li> --}}


    <li class="menu-label">{{ __('admin.profile_section') }}</li>
    <li>
        <a href="{{route('profile.edit')}}">
            <div class="parent-icon"><i class="bi bi-person-lines-fill"></i></div>
            <div class="menu-title">{{ __('admin.user_dashboard') }}</div>
        </a>
    </li>
    <li class="menu-label">{{ __('admin.users') }}</li>

    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bi bi-lock-fill"></i></div>
            <div class="menu-title">{{ __('admin.user_management') }}</div>
        </a>
        <ul>
            <li><a href="{{route('admin.list')}}"><i class="bi bi-circle"></i>{{ __('admin.admin_list') }}</a></li>
        </ul>
        <ul>
            <li><a href="{{route('customer.list')}}"><i class="bi bi-circle"></i>{{ __('admin.customer_list') }}</a></li>
        </ul>
    </li>
    <li class="menu-label">{{ __('admin.products_section') }}</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-tag"></i></div>
            <div class="menu-title">{{ __('admin.categories') }}</div>
        </a>
        <ul>
            <li><a href="{{route('category.create')}}"><i class="bi bi-circle"></i>{{ __('admin.add_category') }}</a></li>
        </ul>
        <ul>
            <li><a href="{{route('subCategory.create')}}"><i class="bi bi-circle"></i>{{ __('admin.add_subcategory') }}</a></li>
        </ul>
    </li>


    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-cart"></i>
            </div>
            <div class="menu-title">{{ __('admin.products') }}</div>
        </a>
        <ul>
            <li><a href="{{route('product.index')}}"><i class="bi bi-circle"></i>{{ __('admin.view_products') }}</a></li>
            <li><a href="{{route('product.create')}}"><i class="bi bi-circle"></i>{{ __('admin.add_product') }}</a></li>
        </ul>

    </li>
    <li class="menu-label">{{ __('admin.sales_management') }}</li>
    <li>
        <a href="{{route('order.lists')}}">
            <div class="parent-icon"><i class="bi bi-person-lines-fill"></i></div>
            <div class="menu-title">{{ __('admin.orders') }}</div>
        </a>
    </li>
    <li class="menu-label">{{ __('admin.blog') }}</li>

    <li>
        <a href="{{route('blog.index')}}">
            <div ><i class="bi bi-file-earmark-break-fill"></i>
            </div>
            <div class="menu-title">{{ __('admin.blog') }}</div>
        </a>

    </li>
</ul>
