<ul class="metismenu" id="menu">
    <li>
        <a href="{{route("dashboard")}}">
            <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
            <div class="menu-title">{{__('صفحه اصلی')}}</div>
        </a>
    </li>


    <li class="menu-label">پروفایل</li>
    <li>
        <a href="{{route('profile.edit')}}">
            <div class="parent-icon"><i class="bi bi-person-lines-fill"></i></div>
            <div class="menu-title">داشبورد کاربر</div>
        </a>
    </li>
    <li class="menu-label">کاربران</li>

    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bi bi-lock-fill"></i></div>
            <div class="menu-title">{{__('مدیریت کاربران')}}</div>
        </a>
        <ul>
            <li><a href="{{route('admin.list')}}"><i class="bi bi-circle"></i>{{__('لیست مدیران')}}</a></li>
        </ul>
        <ul>
            <li><a href="{{route('customer.list')}}"><i class="bi bi-circle"></i>{{__('لیست کاربران')}}</a></li>
        </ul>
    </li>
    <li class="menu-label">محصولات</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-tag"></i></div>
            <div class="menu-title">{{__('دسته بندی')}}</div>
        </a>
        <ul>
            <li><a href="{{route('category.create')}}"><i class="bi bi-circle"></i>{{__('افزودن دسته بندی')}}</a></li>
        </ul>
        <ul>
            <li><a href="{{route('subCategory.create')}}"><i class="bi bi-circle"></i>{{__('افزودن زیر دسته')}}</a></li>
        </ul>
    </li>


    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-cart"></i>
            </div>
            <div class="menu-title">{{__('محصولات')}}</div>
        </a>
        <ul>
            <li><a href="{{route('product.index')}}"><i class="bi bi-circle"></i>{{__('مشاهده محصولات')}}</a></li>
            <li><a href="{{route('product.create')}}"><i class="bi bi-circle"></i>{{__('افزودن محصول')}}</a></li>
        </ul>

    </li>
    <li class="menu-label">مدیریت فروش</li>
    <li>
        <a href="{{route('order.lists')}}">
            <div class="parent-icon"><i class="bi bi-person-lines-fill"></i></div>
            <div class="menu-title">سفارشات</div>
        </a>
    </li>
    <li class="menu-label">بلاگ</li>

    <li>
        <a href="{{route('blog.index')}}">
            <div ><i class="bi bi-file-earmark-break-fill"></i>
            </div>
            <div class="menu-title">بلاگ</div>
        </a>

    </li>
</ul>
