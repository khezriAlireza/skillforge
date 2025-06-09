<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'فیلد :attribute باید پذیرفته شود.',
    'accepted_if' => 'فیلد :attribute باید پذیرفته شود وقتی :other برابر با :value است.',
    'active_url' => 'فیلد :attribute باید یک URL معتبر باشد.',
    'after' => 'فیلد :attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => 'فیلد :attribute باید تاریخی بعد یا برابر با :date باشد.',
    'alpha' => 'فیلد :attribute فقط باید حروف الفبا داشته باشد.',
    'alpha_dash' => 'فیلد :attribute فقط می‌تواند شامل حروف الفبا، اعداد، خطوط زیره، و خطوط خط‌خورده باشد.',
    'alpha_num' => 'فیلد :attribute فقط می‌تواند شامل حروف الفبا و اعداد باشد.',
    'array' => 'فیلد :attribute باید یک آرایه باشد.',
    'before' => 'فیلد :attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => 'فیلد :attribute باید تاریخی قبل یا برابر با :date باشد.',
    'between' => [
        'array' => 'فیلد :attribute باید حاوی بین :min و :max آیتم باشد.',
        'file' => 'اندازه فایل :attribute باید بین :min و :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بین :min و :max باشد.',
        'string' => 'طول فیلد :attribute باید بین :min و :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد :attribute باید true یا false باشد.',
    'can' => 'مقدار فیلد :attribute غیر مجاز است.',
    'confirmed' => 'تأییدیه فیلد :attribute مطابقت ندارد.',
    'current_password' => 'رمز عبور وارد‌شده صحیح نیست.',
    'date' => 'فیلد :attribute تاریخ معتبری نیست.',
    'date_equals' => 'فیلد :attribute باید تاریخی برابر با :date باشد.',
    'date_format' => 'فرمت فیلد :attribute با تاریخ :format مطابقت ندارد.',
    'decimal' => 'فیلد :attribute باید دارای :decimal رقم اعشار باشد.',
    'declined' => 'فیلد :attribute باید رد شود.',
    'declined_if' => 'فیلد :attribute باید رد شود وقتی :other برابر با :value است.',
    'different' => 'فیلد :attribute و :other باید متفاوت باشند.',
    'digits' => 'فیلد :attribute باید :digits رقم باشد.',
    'digits_between' => 'فیلد :attribute باید بین :min و :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر :attribute معتبر نیست.',
    'distinct' => 'فیلد :attribute دارای یک مقدار تکراری است.',
    'doesnt_end_with' => 'فیلد :attribute نباید با یکی از موارد زیر پایان یابد: :values.',
    'doesnt_start_with' => 'فیلد :attribute نباید با یکی از موارد زیر شروع شود: :values.',
    'email' => 'فرمت :attribute معتبر نیست.',
    'ends_with' => 'فیلد :attribute باید با یکی از موارد زیر پایان یابد: :values.',
    'enum' => 'مقدار انتخاب‌شده :attribute غیر مجاز است.',
    'exists' => 'مقدار انتخاب‌شده :attribute معتبر نیست.',
    'file' => 'فیلد :attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید دارای مقداری باشد.',
    'gt' => [
        'array' => 'فیلد :attribute باید بیشتر از :value آیتم داشته باشد.',
        'file' => 'اندازه فایل :attribute باید بیشتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بیشتر از :value باشد.',
        'string' => 'طول فیلد :attribute باید بیشتر از :value کاراکتر باشد.',
    ],
    'gte' => [
        'array' => 'فیلد :attribute باید حاوی :value آیتم یا بیشتر باشد.',
        'file' => 'اندازه فایل :attribute باید برابر یا بیشتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید برابر یا بیشتر از :value باشد.',
        'string' => 'طول فیلد :attribute باید برابر یا بیشتر از :value کاراکتر باشد.',
    ],
    'image' => 'فیلد :attribute باید یک تصویر باشد.',
    'in' => 'مقدار انتخاب‌شده :attribute غیر مجاز است.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => 'فیلد :attribute باید یک عدد صحیح باشد.',
    'ip' => 'فیلد :attribute باید یک IP معتبر باشد.',
    'ipv4' => 'فیلد :attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد :attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد :attribute باید یک رشته JSON معتبر باشد.',
    'lowercase' => 'فیلد :attribute باید حاوی حروف کوچک باشد.',
    'lt' => [
        'array' => 'فیلد :attribute باید دارای کمتر از :value آیتم باشد.',
        'file' => 'اندازه فایل :attribute باید کمتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کمتر از :value باشد.',
        'string' => 'طول فیلد :attribute باید کمتر از :value کاراکتر باشد.',
    ],
    'lte' => [
        'array' => 'فیلد :attribute نباید دارای بیشتر از :value آیتم باشد.',
        'file' => 'اندازه فایل :attribute باید کمتر یا برابر :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کمتر یا برابر :value باشد.',
        'string' => 'طول فیلد :attribute باید کمتر یا برابر :value کاراکتر باشد.',
    ],
    'mac_address' => 'فیلد :attribute باید یک آدرس MAC معتبر باشد.',
    'max' => [
        'array' => 'فیلد :attribute نباید دارای بیشتر از :max آیتم باشد.',
        'file' => 'اندازه فایل :attribute نباید بیشتر از :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute نباید بیشتر از :max باشد.',
        'string' => 'طول فیلد :attribute نباید بیشتر از :max کاراکتر باشد.',
    ],
    'max_digits' => 'فیلد :attribute نباید دارای بیشتر از :max رقم باشد.',
    'mimes' => 'فیلد :attribute باید یک فایل از نوع :values باشد.',
    'mimetypes' => 'فیلد :attribute باید یک فایل از نوع :values باشد.',
    'min' => [
        'array' => 'فیلد :attribute باید حاوی حداقل :min آیتم باشد.',
        'file' => 'اندازه فایل :attribute باید حداقل :min کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید حداقل :min باشد.',
        'string' => 'طول فیلد :attribute باید حداقل :min کاراکتر باشد.',
    ],
    'min_digits' => 'فیلد :attribute باید حداقل دارای :min رقم باشد.',
    'missing' => 'فیلد :attribute باید خالی باشد.',
    'missing_if' => 'فیلد :attribute باید خالی باشد وقتی :other برابر با :value است.',
    'missing_unless' => 'فیلد :attribute باید خالی باشد مگر اینکه :other برابر با :value باشد.',
    'missing_with' => 'فیلد :attribute باید خالی باشد وقتی :values وجود دارد.',
    'missing_with_all' => 'فیلد :attribute باید خالی باشد وقتی همه‌ی :values وجود دارند.',
    'multiple_of' => 'فیلد :attribute باید مضربی از :value باشد.',
    'not_in' => 'مقدار انتخاب‌شده :attribute غیر مجاز است.',
    'not_regex' => 'فرمت :attribute غیر معتبر است.',
    'numeric' => 'فیلد :attribute باید یک عدد باشد.',
    'password' => [
        'required' => 'وارد کردن رمز عبور فعلی الزامی است.',
        'min' => 'رمز عبور جدید باید حداقل :min کاراکتر باشد.',
        'different' => 'رمز عبور جدید باید با رمز عبور فعلی متفاوت باشد.',
        'confirmed' => 'تأیید رمز عبور جدید با تطابق ندارد.',
        'attribute-name' => 'رمز عبور',
    ],
    'passwords' => 'رمزعبور صحیح نیست.',
    'present' => 'فیلد :attribute باید وجود داشته باشد.',
    'prohibited' => 'فیلد :attribute ممنوع است.',
    'prohibited_if' => 'فیلد :attribute ممنوع است وقتی :other برابر با :value است.',
    'prohibited_unless' => 'فیلد :attribute ممنوع است مگر اینکه :other در :values باشد.',
    'regex' => 'فرمت :attribute غیر معتبر است.',
    'relatable' => 'این :attribute ممکن است با این منبع ارتباط داشته باشد.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_if' => 'فیلد :attribute الزامی است وقتی :other برابر با :value است.',
    'required_unless' => 'فیلد :attribute الزامی است مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute الزامی است وقتی :values وجود دارد.',
    'required_with_all' => 'فیلد :attribute الزامی است وقتی همه‌ی :values وجود دارند.',
    'required_without' => 'فیلد :attribute الزامی است وقتی :values وجود ندارد.',
    'required_without_all' => 'فیلد :attribute الزامی است وقتی هیچ‌کدام از :values وجود ندارند.',
    'same' => 'مقدار :attribute باید با مقدار :other یکسان باشد.',
    'size' => [
        'array' => 'فیلد :attribute باید دارای :size آیتم باشد.',
        'file' => 'اندازه فایل :attribute باید :size کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید برابر با :size باشد.',
        'string' => 'طول فیلد :attribute باید :size کاراکتر باشد.',
    ],
    'starts_with' => 'فیلد :attribute باید با یکی از موارد زیر شروع شود: :values.',
    'string' => 'فیلد :attribute باید یک رشته باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => 'این :attribute قبلاً انتخاب شده است.',
    'uploaded' => 'آپلود :attribute با مشکل مواجه شده است.',
    'url' => 'فرمت :attribute اعتبار ندارد.',
    'uuid' => 'فیلد :attribute باید یک UUID معتبر باشد.',

    // Custom Validation Messages
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    // Custom Validation Attributes
    'attributes' => [
        'attribute-name' => 'نام فیلد',
        'password' => 'رمز عبور',
        'current_password' => 'رمز عبور فعلی',
        'user_name' => 'نام کاربری',
        'phone' => 'شماره تلفن',
    ],




];
