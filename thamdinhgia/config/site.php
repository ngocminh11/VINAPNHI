<?php

return [
    // Menu dùng chung cho mọi trang
    'contact_map_embed' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.773040225436!2d106.688757!3d10.777323!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1438fe04e92e1c66!2zVMOyYSBOaMOgIE9JSUM!5e0!3m2!1svi!2s!4v1506188822945',

    'nav' => [
        ['label' => 'TRANG CHỦ', 'href' => '/'],
        ['label' => 'GIỚI THIỆU', 'href' => '/gioi-thieu'],
        ['label' => 'THƯ NGỎ', 'href' => '/thu-ngo'],
        ['label' => 'HỒ SƠ NĂNG LỰC', 'href' => '/ho-so-nang-luc'],
        ['label' => 'KHÁCH HÀNG', 'href' => '/khach-hang'],
        ['label' => 'LIÊN HỆ', 'href' => '/lien-he'],
    ],

    // Sidebar dùng chung
    'laws' => [
        'Luật giá',
        'Luật đất đai',
        'Nghị định quy định chi tiết',
        'Nghị định đấu giá tài sản',
        'Nghị định bồi thường, hỗ trợ tái định cư',
        'Thông tư tài nguyên & môi trường'
    ],
    'links' => [
        ['label' => 'Bộ Tài chính', 'href' => '#'],
        ['label' => 'Cục Thuế TP.HCM', 'href' => '#'],
        ['label' => 'Sở Tài chính TP.HCM', 'href' => '#'],
        ['label' => 'Sở KH&ĐT TP.HCM', 'href' => '#'],
        ['label' => 'Cổng thông tin Chính phủ', 'href' => '#'],
    ],
    'featured' => [
        ['title' => 'Thẩm định giá', 'img' => 'https://picsum.photos/seed/a/600/400'],
        ['title' => 'Đấu giá tài sản', 'img' => 'https://picsum.photos/seed/b/600/400'],
        ['title' => 'Nghiên cứu thị trường', 'img' => 'https://picsum.photos/seed/c/600/400'],
    ],

    // Trang Home
    'home' => [
        'serviceTiles' => [
            ['title' => 'Thẩm định giá', 'img' => 'https://picsum.photos/seed/tile1/520/360'],
            ['title' => 'Đấu giá BĐS, tài sản', 'img' => 'https://picsum.photos/seed/tile2/520/360'],
            ['title' => 'Chuyển nhượng dự án', 'img' => 'https://picsum.photos/seed/tile3/520/360'],
            ['title' => 'Tư vấn đầu tư - BĐS', 'img' => 'https://picsum.photos/seed/tile4/520/360'],
            ['title' => 'Nghiên cứu thị trường', 'img' => 'https://picsum.photos/seed/tile5/520/360'],
        ],
        'companyActivities' => [
            ['title' => 'XÂY DỰNG VĂN HÓA DOANH NGHIỆP', 'desc' => 'Trong một doanh nghiệp, đặc biệt là những doanh nghiệp có quy mô lớn, là một tập hợp những con người khác nhau về trình độ chuyên môn, trình độ văn hóa, mức độ nhận thức, quan hệ xã hội, vùng miền địa lý, tư tưởng văn hóa ... ', 'img' => 'https://picsum.photos/seed/act1/140/100', 'date' => '07/09/2025'],
            ['title' => 'CHIẾN LƯỢC KINH DOANH HIỆU QUẢ', 'desc' => 'Một chiến lược kinh doanh hiệu quả khi và chỉ khi nó tạo ra được sự khác biệt và sự khác biệt đó phải mang lại thành công cho doanh nghiệp. Kiến thức - Chiến lược kinh doanh hiệu quả - chiến lược tạo sự khác biệt ...', 'img' => 'httpsum.photos/seed/act2/140/100', 'date' => '07/09/2025'],
            ['title' => 'TẠO DỰNG THƯƠNG HIỆU BỀN VỮNG', 'desc' => 'Xây dựng thương hiệu là một quá trình liên tục và không có điểm kết thúc. Công ty xây dựng thương hiệu chính là việc xây dựng sự phát triển bền vững và dài hạn ... ', 'img' => 'https://picsum.photos/seed/act3/140/100', 'date' => '07/09/2025'],
            ['title' => 'DOANH NGHIỆP NỘI "THẮNG THẾ" TRÊN MẶT TRẬN BĐS', 'desc' => 'Từng huy động vốn từ nước ngoài và tự mình phát triển thành công nhiều dự án bất động sản ở Việt Nam, Tổng giám đốc Indochina Land Peter Ryder mới đây bất ngờ tuyên bố sẽ bắt tay với một vài doanh nghiệp trong nước ... ', 'img' => 'https://picsum.photos/seed/act4/140/100', 'date' => '07/09/2025'],
        ],
        'deliveredServices' => [
            ['img' => 'https://picsum.photos/seed/done1/600/400', 'caption' => 'Trạm điện Solar 35kV'],
            ['img' => 'https://picsum.photos/seed/done2/600/400', 'caption' => 'Nhà xưởng công nghiệp'],
            ['img' => 'https://picsum.photos/seed/done3/600/400', 'caption' => 'Khu thương mại dịch vụ'],
        ],
        'news' => [
            ['title' => 'Báo cáo giá cả thị trường tháng 8/2025', 'date' => '07/09/2025'],
            ['title' => 'Hỗ trợ vay mua nhà: các điểm cần lưu ý', 'date' => '05/09/2025'],
            ['title' => 'Cập nhật khung giá tài sản đặc thù', 'date' => '02/09/2025'],
        ],
        'cases' => [
            ['tag' => 'Năng lượng', 'title' => 'Định giá nhà máy điện mặt trời 120MWp', 'img' => 'https://picsum.photos/seed/solar/1200/800'],
            ['tag' => 'Hạ tầng', 'title' => 'Định giá khu công nghiệp miền Nam', 'img' => 'https://picsum.photos/seed/infra/1200/800'],
            ['tag' => 'Thương mại', 'title' => 'Đấu giá trung tâm thương mại TP.HCM', 'img' => 'https://picsum.photos/seed/mall/1200/800'],
        ],
    ],

    // Trang Thư ngỏ
    'testimonials' => [
        [
            'person'  => 'Trần Ngọc Trí Nhân',
            'role_vi' => 'Giám đốc, quản lý cấp cao',
            'role_en' => 'Senior Manager, Director',
            'vi' => [
                'Hạnh rất nhanh nhẹn và kỹ lưỡng; vấn đề được xử lý dứt điểm và kịp thời, khác hẳn việc thường phải chờ đợi khi làm việc với bộ phận hỗ trợ.'
            ],
            'en' => [
                'Hanh successfully managed to resolve the issue in a timely and comprehensive manner. We are grateful for this, as we frequently encounter a long wait for assistance when contacting the support department.'
            ],
        ],
        [
            'person'  => 'Lê Anh Quỳnh',
            'role_vi' => 'Tổng giám đốc, Cố vấn pháp lý dự án',
            'role_en' => 'General Director, Senior Consultant at Law Firm',
            'vi' => [
                'Hương có kiến thức rất tốt và rất nhiệt tình; một vướng mắc tồn tại suốt hai tháng đã được giải quyết chỉ trong 20 phút.'
            ],
            'en' => [
                'Huong is not only highly knowledgeable but also extremely enthusiastic; She resolved an issue that had been a source of concern for us for two months in a brief 20 minutes.'
            ],
        ],
        [
            'person'  => 'Lê Anh Tuấn',
            'role_vi' => 'Chủ tịch HĐQT Công ty Tư vấn và Đầu tư Bất động sản',
            'role_en' => 'Chairman of the Board, Consulting & Real Estate',
            'vi' => [
                'Lily rất tận tình. Cô ấy đã đảm bảo mọi thắc mắc của tôi được giải đáp trước khi kết thúc cuộc gọi dịch vụ. Cô ấy là một tấm gương hoàn hảo về Dịch vụ Khách hàng tuyệt vời.'
            ],
            'en' => [
                'Lily is exceedingly dedicated. She ensured that all of my inquiries were satisfactorily addressed prior to concluding the service call. She is an exemplary illustration of superb customer service.'
            ],
        ],
        [
            'person'  => 'Cham Jayson',
            'role_vi' => 'Giám đốc Tư vấn, Nghiên cứu',
            'role_en' => 'Director of Consulting and Research',
            'vi' => [
                'Chúng tôi đã cùng làm việc để giải quyết vấn đề. Ngày nay, dịch vụ khách hàng dường như chỉ là một thủ tục và tôi thường có trải nghiệm tiêu cực. Trải nghiệm của tôi với VINAP rất tích cực và tôi cảm ơn Sam vì điều đó.'
            ],
            'en' => [
                'We collaborated to resolve the issue. I frequently encounter negative experiences, and customer service appears to be merely a formality in the present day. I am grateful to Sam for the positive experience I have had with VINAP.'
            ],
        ],

        // ----------- JAMES WONG (bản dài nhiều đoạn) -----------
        [
            'person'  => 'James Wong',
            'role_vi' => 'GĐ điều hành VPC Malaysia & GĐ Quốc tế VPC Asia Pacific',
            'role_en' => 'Managing Director of VPC Malaysia and International Director of VPC Asia Pacific',
            'vi' => [
                'Ông James Wong - Giám đốc điều hành của VPC Malaysia, một công ty định giá uy tín tại Malaysia và cũng là Giám đốc Quốc tế của VPC Asia Pacific, từng cộng tác rộng khắp ở nhiều quốc gia để thực hiện công tác thẩm định chuyên sâu. Ông James thường xuyên có nhiều kinh nghiệm và được ghi nhận cùng các tổ chức chuyên ngành uy tín như Hiệp hội Định giá ASEAN (AVA) và Rotary International.',
                'Đánh giá cao năng lực báo cáo cũng như quy trình chuyên nghiệp của VINAP – một công ty thẩm định giá tại Việt Nam. Ông bày tỏ sự biết ơn khi được hợp tác với Ms. Toan and Ms. Sam Tang trong quá trình thẩm định và tư vấn: minh bạch về phương pháp định giá, quy trình và tinh thần hỗ trợ nhiệt thành.',
                'Rất vinh hạnh được đồng hành với VINAP. Xin cảm ơn và mong tiếp tục hợp tác!'
            ],
            'en' => [
                'James Wong as the managing director of VPC Malaysia, a reputable valuation firm in Malaysia and also the International Director of VPC Asia Pacific, frequently engages with a variety of countries to undertake complex valuation assignments. He is often granted recognition by esteemed professional bodies and organizations, including ASEAN Valuers Association (AVA) and Rotary International.',
                'He recognized VINAP, a new valuation company in Vietnam, for the outstanding report quality and professional process. He was extremely grateful to be associated with Ms. Toan and Ms. Sam Tang for the highly qualified valuation expertise; clarity of the valuation service, the process, and the ardent care and advice provided by VINAP.',
                'Honored to collaborate with VINAP. Thank you and looking forward to future cooperation!'
            ],
        ],

        // ----------- NGÔ NHÂN ĐỨC (hai đoạn) -----------
        [
            'person'  => 'Ngô Nhân Đức',
            'role_vi' => 'Phó phòng pháp lý Công ty Kinh doanh Bất động sản',
            'role_en' => 'Deputy Head of Legal Department, Real Estate Business',
            'vi' => [
                'Loan rất nhiệt tình trong quá trình tư vấn. Tôi biết ơn vì đã đi tới 100% vấn đề và tới giải pháp cuối cùng! Cô ấy giải thích rất rõ ràng và giúp tôi hiểu được các bước cần làm cũng như thời hạn; tôi có thể tin cậy 100%.',
            ],
            'en' => [
                'Loan was exceedingly enthusiastic during our telephone conversations. I was very appreciative that we arrived at 100% answers; she is both an expert and one that explains with clarity, helping me to understand what steps to take and the timeframe needed. Gratitude is expressed to Loan.'
            ],
        ],
    ],

    // Trang Hồ sơ năng lực
    'capacity' => [
        'hr' => [
            ['vi' => 'Số nhân viên có trình độ Cao học: 7 người.', 'en' => 'Master Degree: Seven individuals.'],
            ['vi' => 'Tỷ lệ nhân sự có trình độ Đại học: 100%.', 'en' => 'University level: One hundred percent.'],
            ['vi' => 'Thẻ Thẩm định viên về giá: 5 người.', 'en' => 'Valuer Certificate: Five individuals.'],
            ['vi' => 'Chứng chỉ định giá đất: 1 người.', 'en' => 'Land valuation certificate: One individual.'],
            ['vi' => 'Chứng chỉ đấu giá viên: 1 người.', 'en' => 'Auction certificate: One individual.'],
            ['vi' => 'Chứng chỉ quản lý giao dịch BĐS: 2 người.', 'en' => 'Managing real estate transaction certificate: Two individuals.'],
            ['vi' => 'Chứng chỉ định giá bất động sản: 1 người.', 'en' => 'Estate appraisal certificate: One individual.'],
        ],
        'team' => [
            // 1
            [
                'name' => 'Tăng Hùng Dũng',
                'role_vi' => 'Giám đốc',
                'role_en' => 'Director',
                'certs' => [
                    'Mã số thẻ TĐV: <strong>IX14.1080</strong> (Valuer Certificate No: IX14.1080, signed by Minister of Finance)',
                    'Chứng chỉ Định giá đất số: <strong>04080119</strong> (Land valuation certificate number 04080119, issued by MONRE)',
                ],
                'edu_vi' => [
                    'Trình độ: Cử nhân Tài chính Kế toán Doanh nghiệp',
                ],
                'edu_en' => [
                    'Professional ability: Bachelor of Corporate Accounting Finance',
                ],
                'exp_vi' => [
                    'Nguyên Phó Giám đốc Sở Tài chính tỉnh Kiên Giang.',
                    'Kế toán văn phòng UBND Huyện Thới Bình, tỉnh Cà Mau.',
                    'Phó văn phòng Liên hiệp Công đoàn tỉnh Kiên Giang.',
                    'Chánh văn phòng Huyện ủy Châu Thành, tỉnh Kiên Giang.',
                    'Trưởng phòng quản lý xí nghiệp cấp huyện tại Chi cục Thu quốc doanh – Sở Tài chính Kiên Giang.',
                    'Chánh văn phòng / Trưởng phòng Quản lý giá – Công sản tại Sở Tài chính Kiên Giang.',
                    'Phó Giám đốc Sở Tài chính Kiên Giang.',
                    'Cố vấn Tổng Giám đốc SIVC.',
                ],
                'exp_en' => [
                    'Former Vice Director, Department of Finance, Kien Giang Province.',
                    'Accountant at People’s Committee of Thoi Binh District, Ca Mau Province.',
                    'Deputy Chief of Office at Kien Giang Union.',
                    'Chief of Office at Chau Thanh District Party Committee, Kien Giang.',
                    'Chief of Office, district enterprise management – Department of Finance, Kien Giang.',
                    'Chief of Office / Head of Price & Public Assets Management – Department of Finance, Kien Giang.',
                    'Vice Director, Department of Finance, Kien Giang.',
                    'Consultant for General Director at SIVC.',
                ],
                'years' => '48 years',
            ],

            // 2
            [
                'name' => 'Tăng Thái Bích Toàn',
                'role_vi' => 'Phó Giám đốc',
                'role_en' => 'Deputy Director',
                'certs' => [
                    'Mã số thẻ TĐV: <strong>IX14.1209</strong> (Valuer Certificate No: IX14.1209, signed by Minister of Finance)',
                    'Chứng chỉ Định giá đất: <strong>04110119</strong> (issued by MONRE)',
                    'Chứng chỉ Đấu thầu cơ bản: <strong>040-DTCB11118/KHXD</strong>',
                ],
                'edu_vi' => [
                    'Cử nhân Tài chính – Ngân hàng (UEH).',
                    'Thạc sĩ Quản trị Kinh doanh (ĐH Tôn Đức Thắng).',
                    'Nghiên cứu sinh Kinh tế học – UCSI Malaysia.',
                ],
                'edu_en' => [
                    'Bachelor of Finance – Banking (UEH).',
                    'MBA – Ton Duc Thang University.',
                    'Postgraduate, Economics – UCSI University Malaysia.',
                ],
                'exp_vi' => [
                    'Giám đốc Marketing, Trợ lý TGĐ SIVC (2012–2017).',
                    'Giám đốc Phòng 7 SIVC (2012–2017).',
                    'Giám đốc các Chi nhánh Kiên Giang / Thừa Thiên Huế / Đà Nẵng (2012–2017).',
                    'Điều hành & quản lý VINAP (2017–nay).',
                    'Chuyên gia về giá tại Sở Công Thương TP.HCM (2021–2022).',
                    'Điều hành & quản lý GOLDEN VALUE (2023).',
                ],
                'exp_en' => [
                    'Marketing Director, Assistant to GD at SIVC (2012–2017).',
                    'Director of Dept. 7 – SIVC (2012–2017).',
                    'Branch Director: Kien Giang / Thua Thien Hue / Da Nang (2012–2017).',
                    'Operating & managing (owner) at VINAP (2017–present).',
                    'Price expert at HCMC Department of Industry & Trade (2021–2022).',
                    'Operating & managing GOLDEN VALUE (2023).',
                ],
                'years' => '16 years',
            ],

            // 3
            [
                'name' => 'Nguyễn Thu Trang',
                'role_vi' => 'Thẩm định viên',
                'role_en' => 'Valuer',
                'certs' => [
                    'Mã số thẻ TĐV: <strong>XIII18.2076</strong> (Valuer Certificate No: XIII18.2076, signed by Ministry of Finance)',
                ],
                'edu_vi' => ['Cử nhân Mạng máy tính & Viễn thông'],
                'edu_en' => ['Bachelor of Computer Networks and Telecommunications'],
                'exp_vi' => [
                    'Chuyên viên phòng mua bán – FPT Software (6/2006–8/2019).',
                    'Thẩm định viên tại VINAP (9/2019–6/2022).',
                ],
                'exp_en' => [
                    'Purchasing Department Specialist – FPT Software (Jun 2006–Aug 2019).',
                    'Valuer at Vietnam Appraisal and Investment Consulting Corporation (Sep 2019–Jun 2022).',
                ],
                'years' => '20 years',
            ],

            // 4
            [
                'name' => 'Lê Văn Phi',
                'role_vi' => 'Thẩm định viên',
                'role_en' => 'Valuer',
                'certs' => [
                    'Mã số thẻ TĐV: <strong>XV23.2451</strong> (Valuer Certificate No: XV23.2451, signed by Ministry of Finance)',
                ],
                'edu_vi' => ['Chuyên môn nghiệp vụ: Kiểm toán'],
                'edu_en' => ['Professional ability: Audit'],
                'exp_vi' => [
                    'Trợ lý kiểm toán tại KSI Việt Nam.',
                    'Kiểm toán viên tại KSI Việt Nam.',
                    'Kiểm toán viên tại Công ty TNHH Tri Thức Việt.',
                    'Thẩm định viên tại VINAP.',
                ],
                'exp_en' => [
                    'Audit Assistant at KSI Vietnam Auditing Company Limited.',
                    'Auditor at KSI Vietnam Auditing Company Limited.',
                    'Auditor at Tri Thuc Viet Company Limited.',
                    'Valuer at Vietnam Appraisal and Investment Consulting Corporation.',
                ],
                'years' => '12 years',
            ],

            // 5
            [
                'name' => 'Tăng Thái Bích Thông',
                'role_vi' => 'Thẩm định viên',
                'role_en' => 'Valuer',
                'certs' => [
                    'Mã số thẻ TĐV: <strong>XIV19.2326</strong> (Valuer Certificate No: XIV19.2326, signed by Ministry of Finance)',
                ],
                'edu_vi' => [
                    'Cử nhân Sư phạm Toán – ĐH Sư phạm TP.HCM.',
                    'Thạc sĩ Quản trị Kinh doanh – Open University Malaysia.',
                    'Nghiên cứu sinh Kinh tế học – UCSI Malaysia.',
                ],
                'edu_en' => [
                    'Bachelor of Math – HCMC University of Pedagogy.',
                    'MBA – Open University Malaysia.',
                    'Postgraduate – majoring in Economics, UCSI University Malaysia.',
                ],
                'exp_vi' => [
                    'Cán bộ Khoa Ngoại ngữ – CĐ Cộng đồng Kiên Giang.',
                    'Chuyên viên thẩm định giá tại VINAP.',
                    'Phó phòng Nhân sự tại VINAP.',
                    'Giám đốc Tổ hợp tác quốc tế tại VINAP.',
                ],
                'exp_en' => [
                    'Officer of Foreign Languages Department, Kien Giang Community College.',
                    'Appraisal specialist at VINAP.',
                    'Deputy of Administration – Human Resources Department, VINAP.',
                    'Director of International Corporation Department, VINAP.',
                ],
                'years' => '14 years',
            ],

            // 6
            [
                'name' => 'Lưu Thị Ngà',
                'role_vi' => 'Thẩm định viên',
                'role_en' => 'Valuer',
                'certs' => [
                    'Mã số thẻ TĐV: <strong>XIV19.2228</strong> (Valuer Certificate No: XIV19.2228, signed by Ministry of Finance)',
                ],
                'edu_vi' => [
                    'Cử nhân Quản trị kinh doanh – chuyên ngành Thẩm định giá (ĐH Tài chính – Marketing).',
                ],
                'edu_en' => [
                    'Bachelor of Business Administration, Valuation major – University of Finance and Marketing.',
                ],
                'exp_vi' => [
                    'Nhân viên kế toán – Nam Việt (12/2019–7/2020).',
                    'Nhân viên kinh doanh – Folexpharm.',
                    'Thẩm định viên tại VINAP.',
                ],
                'exp_en' => [
                    'Accounting staff – Nam Viet Trading Co., Ltd (Dec 2019–Jul 2020).',
                    'Sales staff – Folexpharm Pharmaceutical JSC.',
                    'Valuer at Vietnam Appraisal and Investment Consulting Corporation.',
                ],
                'years' => '12 years',
            ],

            // 7
            [
                'name' => 'Huỳnh Quốc Chiến',
                'role_vi' => 'Giám đốc Chi nhánh Trà Vinh',
                'role_en' => 'Director – Tra Vinh branch',
                'certs' => [
                    'Estate Agent certificate – <strong>No 0004TV</strong>.',
                    'Estate Agent Appraisal certificate.',
                    'Managing and controlling Real estate transaction certificate.',
                    'Auction certificate – <strong>No 1228/TP-ĐG/CCHN</strong>.',
                    'Construction project quality accreditation certificate.',
                    'Construction project estimation certificate.',
                ],
                'edu_vi' => [
                    'Cử nhân Kinh tế – Kiểm toán (UEH).',
                    'Kỹ sư Công nghệ Hóa – ĐH Bách Khoa TP.HCM.',
                ],
                'edu_en' => [
                    'Bachelor of Economics, major in Audit and Accountancy (UEH).',
                    'Engineer major in Chemical Engineering, HCMUT.',
                ],
                'exp_vi' => [
                    'Trưởng văn phòng đại diện – Công ty TNHH Kiểm Toán & Tư vấn Phan Dũng (Trà Vinh).',
                    'Giám đốc Công ty TNHH MTV Bán đấu giá Tài sản Bảo Tín – Trà Vinh.',
                    'Trưởng ban kiểm soát – CTCP Muối I ốt Trà Vinh.',
                ],
                'exp_en' => [
                    'Chief of Representative Office at Tra Vinh – Phan Dung Auditing & Consulting Services Co., Ltd.',
                    'Director of Property Audition Bao Tin Limited Company.',
                    'Chief of Supervisory Board at Tra Vinh Iodize Salt JSC.',
                ],
                'years' => '35 years',
            ],

            // 8
            [
                'name' => 'Lại Thế Sơn',
                'role_vi' => 'Đại diện văn phòng Vũng Tàu',
                'role_en' => 'Vung Tau – Representative office',
                'certs' => [],
                'edu_vi' => ['Cử nhân Kế toán – Kiểm toán'],
                'edu_en' => ['Bachelor of Audit and Accountancy'],
                'exp_vi' => [
                    'Phụ trách IT, kế toán thanh toán – Maritime Bank CN Vũng Tàu.',
                    'Kế toán giao dịch, thanh toán, phụ trách CNTT – VBSP BR-VT.',
                    'Kiểm soát viên – Maritime Bank Vũng Tàu (PGD Bà Rịa).',
                    'Tổ trưởng quản lý & hỗ trợ tín dụng – HDBank CN Vũng Tàu.',
                    'Trưởng Phòng giao dịch – HDBank CN Vũng Tàu.',
                    'Giám đốc PGD – MHB CN Bà Rịa – Vũng Tàu.',
                    'Phó Giám đốc PGD Chí Linh – BIDV CN Vũng Tàu Côn Đảo.',
                ],
                'exp_en' => [
                    'Charge of IT & settlement accountant – Maritime Bank, Vung Tau branch.',
                    'Transaction & settlement accountant, in charge of IT – Vietnam Bank for Social Policies, Ba Ria–Vung Tau.',
                    'Auditor – Maritime Bank, Vung Tau Branch – Ba Ria Transaction Office.',
                    'Leader of Credit management & support team – HDBank, Vung Tau branch.',
                    'Chief of Transaction Office – HDBank, Vung Tau branch.',
                    'Director – Mekong Housing Bank (MHB), Ba Ria–Vung Tau branch.',
                    'Vice Director of Chi Linh Transaction Office – BIDV, Vung Tau Con Dao branch.',
                ],
                'years' => '21 years',
            ],

            // 9
            [
                'name' => 'Phạm Duy Dương',
                'role_vi' => 'Giám đốc Chi nhánh Long An',
                'role_en' => 'Director – Long An branch',
                'certs' => [
                    'Chứng chỉ Định giá đất số: <strong>0070124</strong> (Land valuation certificate number 0070124, issued by MONRE)',
                ],
                'edu_vi' => [
                    'Cử nhân Luật; Cử nhân Quản trị Kinh doanh; Chứng chỉ Thẩm định giá.',
                ],
                'edu_en' => [
                    'Bachelor of Law; Bachelor of Business Administration; Certificate of Valuation.',
                ],
                'exp_vi' => [
                    'Chuyên viên tín dụng – VPBank.',
                    'Chuyên viên thẩm định giá – VINAP (CN Long An).',
                    'Giám đốc Chi nhánh – Dinh Vang Valuation (Long An).',
                    'Chuyên viên thẩm định – LAHA Investment Consulting & Valuation Services.',
                ],
                'exp_en' => [
                    'Credit Specialist at Vietnam Prosperity Bank.',
                    'Valuation Specialist – VINAP, Long An branch.',
                    'Branch Director – Dinh Vang Valuation, Long An.',
                    'Valuation Specialist – LAHA investment consulting and valuation services Co., Ltd.',
                ],
                'years' => '15 years',
            ],

            // 10
            [
                'name' => 'Nguyễn Thị Kim Huệ',
                'role_vi' => 'Trưởng phòng Dịch vụ Khách hàng',
                'role_en' => 'Customer Service Manager',
                'certs' => [
                    'Chứng chỉ Định giá đất số: <strong>04100119</strong> (Land valuation certificate number 04100119, issued by MONRE)',
                ],
                'edu_vi' => [
                    'Cử nhân Quản trị Kinh doanh – chuyên ngành Thẩm định giá (ĐH Tài chính – Marketing).',
                ],
                'edu_en' => [
                    'Bachelor of Business Administration, Valuation major – University of Finance and Marketing.',
                ],
                'exp_vi' => [
                    'Chuyên viên thẩm định giá tại SIVC.',
                    'Chuyên viên thẩm định giá tại VINAP.',
                ],
                'exp_en' => [
                    'Appraisal Specialist at Southern Information and Valuation Corporation.',
                    'Appraisal Specialist at VINAP.',
                ],
                'years' => '10 years',
            ],

            // 11
            [
                'name' => 'Trần Thị Mỹ Hạnh',
                'role_vi' => 'Giám đốc Kinh doanh kiêm Trợ lý Giám đốc',
                'role_en' => 'Sales Director and Assistant General Manager',
                'certs' => [
                    'Chứng chỉ Định giá đất số: <strong>04090119</strong> (issued by MONRE)',
                    'Chứng chỉ Đấu thầu cơ bản: <strong>039-DTCB11118/KHXD</strong>',
                ],
                'edu_vi' => [
                    'Cử nhân Tài chính – Ngân hàng (UEH).',
                ],
                'edu_en' => [
                    'Bachelor of Finance – Banking, Ho Chi Minh City University of Economics.',
                ],
                'exp_vi' => [
                    'Phụ trách mảng Tổng hợp Marketing – SIVC.',
                    'Giám đốc Kinh doanh kiêm Trợ lý TGĐ.',
                ],
                'exp_en' => [
                    'In charge of Marketing range – SIVC.',
                    'Sales Director and Assistant General Manager.',
                ],
                'years' => '18 years',
            ],

            // 12
            [
                'name' => 'Huỳnh Nguyễn Kim Thảo',
                'role_vi' => 'Trưởng phòng Kiểm soát',
                'role_en' => 'Head of Internal Control Department',
                'certs' => [
                    'Chứng chỉ Định giá đất số: <strong>0890324</strong> (Land valuation certificate number 0890324, issued by MONRE)',
                ],
                'edu_vi' => [
                    'Cử nhân Quản lý đất đai – ĐH Tài Nguyên & Môi Trường TP.HCM.',
                ],
                'edu_en' => [
                    'Bachelor of Land Management, Ho Chi Minh University of Natural Resources and Environment.',
                ],
                'exp_vi' => [
                    'Trưởng phòng Kiểm soát tại VINAP.',
                ],
                'exp_en' => [
                    'Head of Control Department at VINAP.',
                ],
                'years' => '8 years',
            ],

            // 13
            [
                'name' => 'Trần Trang Yến Loan',
                'role_vi' => 'Phó phòng nghiệp vụ (Operations Dept. 1)',
                'role_en' => 'Deputy Head of Operations Department 1',
                'certs' => [
                    'Chứng chỉ Định giá đất số: <strong>0710324</strong> (Land valuation certificate number 0710324, issued by MONRE)',
                ],
                'edu_vi' => [
                    'Thạc sĩ Quản lý đất đai.',
                    'Cử nhân Quản lý đất đai – chuyên ngành địa chính.',
                    'Cử nhân Luật.',
                ],
                'edu_en' => [
                    'Master of Land Management.',
                    'Bachelor of Land Management – cadastral major.',
                    'Bachelor of Law.',
                ],
                'exp_vi' => [
                    'Chuyên viên Ban Bồi thường Giải phóng mặt bằng – Q. Tân Phú, TP.HCM.',
                    'Phó phòng Dịch vụ Khách hàng tại VINAP.',
                ],
                'exp_en' => [
                    'Specialist – Compensation & Clearance Dept., Tan Phu District, HCMC.',
                    'Customer Service Deputy at VINAP.',
                ],
                'years' => '7 years',
            ],

            // 14
            [
                'name' => 'Phạm Thị Minh Hương',
                'role_vi' => 'Phó phòng nghiệp vụ (Operations Dept. 2)',
                'role_en' => 'Deputy Head of Operations Department 2',
                'certs' => [
                    'Chứng chỉ Định giá đất số: <strong>10270122</strong> (Land valuation certificate number 10270122, issued by MONRE)',
                ],
                'edu_vi' => [
                    'Cử nhân Tài chính – Ngân hàng, chuyên ngành Thẩm định giá.',
                ],
                'edu_en' => [
                    'Bachelor of Banking and Finance – Valuation major.',
                ],
                'exp_vi' => [
                    'Phó phòng Dịch vụ Khách hàng tại VINAP.',
                ],
                'exp_en' => [
                    'Customer Service Deputy at VINAP.',
                ],
                'years' => '7 years',
            ],

        ],
    ],
];