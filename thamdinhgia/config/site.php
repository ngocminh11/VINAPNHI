<?php

return [
    'brand' => [
        'name' => 'VINAP',
        'tagline' => 'Chuyên nghiệp - Minh bạch - Chính xác - Khách Quan',
        'hotline' => '1900 1234',
    ],

    // Menu dùng route name + hash (anchor trên home)
    'menu' => [
        ['label' => 'TRANG CHỦ',       'route' => 'home'],
        ['label' => 'GIỚI THIỆU',      'route' => 'about'],
        ['label' => 'THƯ NGỎ',         'route' => 'letter'],
        ['label' => 'HỒ SƠ NĂNG LỰC',  'route' => 'profile'],
        ['label' => 'KHÁCH HÀNG',      'route' => 'customers'],
        ['label' => 'LIÊN HỆ',         'route' => 'contact'],
    ],

    // 4 ô trên trang chủ
    'services_top' => [
        ['title'=>'Thẩm định bất động sản','desc'=>'Nhà ở, đất nền, dự án','icon'=>'home','url'=> '/dich-vu/bat-dong-san'],
        ['title'=>'Máy móc thiết bị','desc'=>'Dây chuyền, phương tiện','icon'=>'gear','url'=> '/dich-vu/may-moc-thiet-bi'],
        ['title'=>'Doanh nghiệp & dự án','desc'=>'M&A, chuyển nhượng','icon'=>'briefcase','url'=> '/dich-vu/doanh-nghiep-du-an'],
        ['title'=>'Báo cáo thị trường','desc'=>'Dữ liệu giá cập nhật','icon'=>'chart','url'=> '/dich-vu/bao-cao-thi-truong'],
    ],

    // Danh mục dịch vụ (route: /dich-vu/{slug})
    'services_catalog' => [
        [
            'slug' => 'bat-dong-san',
            'title' => 'Thẩm định bất động sản',
            'icon' => 'home',
            'content' => 'Định giá nhà đất, căn hộ, dự án; phục vụ vay vốn, mua bán, pháp lý.',
            'bullets' => ['Nhà phố, căn hộ, đất nền', 'Khu công nghiệp, thương mại', 'Dự án phát triển đô thị']
        ],
        [
            'slug' => 'may-moc-thiet-bi',
            'title' => 'Thẩm định máy móc thiết bị',
            'icon' => 'gear',
            'content' => 'Định giá dây chuyền, phương tiện vận tải, thiết bị chuyên dụng.',
            'bullets' => ['Máy sản xuất, phương tiện', 'Thiết bị y tế, viễn thông', 'Hệ thống công nghiệp']
        ],
        [
            'slug' => 'doanh-nghiep-du-an',
            'title' => 'Định giá doanh nghiệp & dự án',
            'icon' => 'briefcase',
            'content' => 'Phục vụ M&A, góp vốn, cổ phần hóa, chuyển nhượng.',
            'bullets' => ['Dòng tiền chiết khấu (DCF)', 'So sánh thị trường', 'Tài sản ròng']
        ],
        [
            'slug' => 'bao-cao-thi-truong',
            'title' => 'Báo cáo thị trường',
            'icon' => 'chart',
            'content' => 'Tổng hợp dữ liệu giá, xu hướng, cung cầu theo khu vực.',
            'bullets' => ['Cập nhật quý/tháng', 'Dashboards trực quan', 'Nguồn dữ liệu kiểm chứng']
        ],
    ],

    'badges' => ['ISO 17025','Thành viên VVA','Bảo mật dữ liệu','Hóa đơn điện tử'],

    'process_steps' => [
        'Tiếp nhận & tư vấn sơ bộ',
        'Ký hợp đồng dịch vụ',
        'Khảo sát hiện trạng',
        'Phân tích chứng cứ giá',
        'Lập & phát hành chứng thư',
    ],

    'cases' => [
        ['logo'=>'/images/logo1.png','name'=>'SASCO'],
        ['logo'=>'/images/logo2.png','name'=>'VSIP'],
        ['logo'=>'/images/logo3.png','name'=>'CentralLand'],
        ['logo'=>'/images/logo4.png','name'=>'CityBank'],
    ],

    'pricing_note' => 'Mức phí tùy loại tài sản và phạm vi. VINAP báo giá minh bạch trước khi ký.',

    // Hoạt động, Tin tức, Sidebar… (như bạn đã có)
    'activities' => [
        ['title'=>'Xây dựng văn hóa doanh nghiệp','thumb'=>'/images/act1.png','excerpt'=>'Nền tảng giá trị, kỷ luật và chuyển giao tri thức.','url'=>'#'],
        ['title'=>'Chiến lược kinh doanh hiệu quả','thumb'=>'/images/act2.png','excerpt'=>'Khác biệt bền vững và kiến thức sâu.','url'=>'#'],
        ['title'=>'Tạo dựng thương hiệu bền vững','thumb'=>'/images/act3.png','excerpt'=>'Nhận diện nhất quán, trải nghiệm tốt.','url'=>'#'],
        ['title'=>'Doanh nghiệp với “thăng thế”', 'thumb'=>'/images/act4.png','excerpt'=>'Khai thác nền tảng số tối ưu chi phí.','url'=>'#'],
    ],
    'news' => [
        ['title'=>'Phổ biến nghiệp vụ thẩm định giá', 'date'=>'05/08/2017','url'=>'#'],
        ['title'=>'Mua bán nhà phố: đừng quên thẩm định', 'date'=>'15/08/2017','url'=>'#'],
        ['title'=>'Báo cáo giá thị trường 9/2017', 'date'=>'30/09/2017','url'=>'#'],
        ['title'=>'Ai định giá cho mua bán nội bộ?', 'date'=>'10/10/2017','url'=>'#'],
    ],
    'service_done' => [
        'image'=>'/images/service-done.jpg','caption'=>'Các dịch vụ định kỳ của Hội đồng định giá tại TP.HCM',
    ],
    'legal_docs' => [
        ['title'=>'Luật giá', 'url'=>'#'],['title'=>'Luật đất đai','url'=>'#'],
        ['title'=>'Nghị định chi tiết Luật giá','url'=>'#'],['title'=>'Nghị định xử phạt VPHC','url'=>'#'],
        ['title'=>'Nghị định quản lý giá','url'=>'#'],['title'=>'Thông tư 36/2014 BTNMT','url'=>'#'],
    ],
    'web_links' => [
        ['title'=>'Bộ Tài chính', 'url'=>'#'],['title'=>'Sở Tài chính TP.HCM','url'=>'#'],
        ['title'=>'Sở TN&MT TP.HCM','url'=>'#'],['title'=>'Cổng DVCTT TP.HCM','url'=>'#'],
        ['title'=>'ĐH Tài chính Marketing','url'=>'#'],['title'=>'Cổng TTĐT Chính phủ','url'=>'#'],
    ],

    'company' => [
        'full_name'   => 'Công ty CP Thẩm định giá & Tư vấn Đầu tư Việt Nam - VINAP',
        'license'     => 'Giấy CN ĐKDN: 0301234567',
        'address'     => 'Số 8/1, đường số 4, KDC Nam Long, P.An Phú, TP.Thủ Đức, TP.HCM',
        'phone'       => '(84.8) 37156868',
        'email'       => 'contact@vinap.vn',
        'website'     => 'www.vinap.vn',
        'copyright'   => '© '.date('Y').' VINAP. All rights reserved.',
        'footer_note' => 'Thiết kế website bởi NTVC',
    ],
];
