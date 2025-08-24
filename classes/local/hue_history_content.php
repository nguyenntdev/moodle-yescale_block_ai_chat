<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace block_ai_chat\local;

/**
 * Class hue_history_content
 *
 * Manages content for Hue History Education chatbot
 *
 * @package    block_ai_chat
 * @copyright  2025 Tobias Garske, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hue_history_content {

    /**
     * Get comprehensive timeline of Vietnamese history
     * @return array
     */
    public static function get_vietnamese_history_timeline(): array {
        return [
            'ancient_period' => [
                'title' => 'Thời kỳ cổ đại',
                'period' => '2879 TCN - 111 TCN',
                'events' => [
                    '2879 TCN' => 'Vua Hùng Vương lập nước Văn Lang',
                    '257 TCN' => 'Thục Phán lập nước Âu Lạc',
                    '111 TCN' => 'Nhà Hán xâm lược, Việt Nam bị đô hộ'
                ],
                'significance' => 'Thời kỳ hình thành văn hóa và dân tộc Việt Nam'
            ],
            'chinese_domination' => [
                'title' => 'Thời kỳ Bắc thuộc',
                'period' => '111 TCN - 938',
                'events' => [
                    '40-43' => 'Khởi nghĩa Hai Bà Trưng',
                    '248' => 'Khởi nghĩa Bà Triệu',
                    '544-602' => 'Nhà Tiền Lý độc lập',
                    '938' => 'Ngô Quyền đánh bại quân Nam Hán tại Bạch Đằng'
                ],
                'significance' => 'Thời kỳ chống Bắc thuộc, giữ gìn bản sắc dân tộc'
            ],
            'independent_dynasties' => [
                'title' => 'Các triều đại độc lập',
                'period' => '938-1802',
                'events' => [
                    '938-965' => 'Nhà Ngô',
                    '968-980' => 'Nhà Đinh',
                    '980-1009' => 'Nhà Tiền Lê',
                    '1009-1225' => 'Nhà Lý - Thăng Long',
                    '1225-1400' => 'Nhà Trần - Chống Nguyên Mông',
                    '1400-1407' => 'Nhà Hồ',
                    '1428-1527' => 'Nhà Lê sơ - Thời kỳ hoàng kim',
                    '1527-1592' => 'Nhà Mạc',
                    '1592-1789' => 'Nhà Lê trung hưng',
                    '1778-1802' => 'Nhà Tây Sơn'
                ],
                'significance' => 'Thời kỳ phát triển văn hóa, giáo dục và quân sự'
            ],
            'nguyen_dynasty' => [
                'title' => 'Triều đại Nguyễn',
                'period' => '1802-1945',
                'events' => [
                    '1802' => 'Nguyễn Ánh lên ngôi, lập triều Nguyễn',
                    '1802-1820' => 'Vua Gia Long - Thống nhất đất nước',
                    '1820-1841' => 'Vua Minh Mạng - Cải cách văn hóa',
                    '1847-1883' => 'Vua Tự Đức - Thời kỳ khó khăn',
                    '1883-1945' => 'Thời kỳ thuộc Pháp'
                ],
                'significance' => 'Thời kỳ thống nhất cuối cùng, xây dựng Huế'
            ],
            'modern_period' => [
                'title' => 'Thời kỳ hiện đại',
                'period' => '1945-nay',
                'events' => [
                    '1945' => 'Cách mạng tháng 8, độc lập',
                    '1954' => 'Chiến thắng Điện Biên Phủ',
                    '1975' => 'Giải phóng miền Nam, thống nhất đất nước',
                    '1986' => 'Đổi mới kinh tế',
                    '1993' => 'Huế được UNESCO công nhận di sản văn hóa'
                ],
                'significance' => 'Thời kỳ độc lập, phát triển và hội nhập'
            ]
        ];
    }

    /**
     * Get detailed timeline of Hue's development
     * @return array
     */
    public static function get_hue_development_timeline(): array {
        return [
            'pre_nguyen' => [
                'title' => 'Trước triều Nguyễn',
                'period' => 'Trước 1802',
                'events' => [
                    '1306' => 'Champa nhượng Châu Ô, Châu Lý cho Đại Việt',
                    '1558' => 'Nguyễn Hoàng vào trấn thủ Thuận Hóa',
                    '1687' => 'Phú Xuân trở thành thủ phủ Đàng Trong',
                    '1775' => 'Quân Trịnh chiếm Phú Xuân'
                ]
            ],
            'nguyen_establishment' => [
                'title' => 'Thành lập triều Nguyễn',
                'period' => '1802-1820',
                'events' => [
                    '1802' => 'Nguyễn Ánh lên ngôi, đặt tên nước là Việt Nam',
                    '1803' => 'Bắt đầu xây dựng Kinh thành Huế',
                    '1805' => 'Xây dựng Hoàng thành',
                    '1812' => 'Hoàn thành Tử Cấm Thành',
                    '1820' => 'Vua Gia Long băng hà'
                ]
            ],
            'cultural_development' => [
                'title' => 'Phát triển văn hóa',
                'period' => '1820-1847',
                'events' => [
                    '1820-1841' => 'Vua Minh Mạng - Cải cách giáo dục',
                    '1821' => 'Thiết lập Quốc Tử Giám',
                    '1822' => 'Mở khoa thi Hội đầu tiên',
                    '1836' => 'Hoàn thành bộ "Đại Nam nhất thống chí"'
                ]
            ],
            'late_independence' => [
                'title' => 'Cuối thời độc lập',
                'period' => '1847-1883',
                'events' => [
                    '1847-1883' => 'Vua Tự Đức - Thời kỳ văn học',
                    '1858' => 'Pháp tấn công Đà Nẵng',
                    '1862' => 'Hiệp ước Nhâm Tuất - Nhượng 3 tỉnh miền Đông',
                    '1883' => 'Vua Tự Đức băng hà'
                ]
            ],
            'colonial_period' => [
                'title' => 'Thời kỳ thuộc địa',
                'period' => '1883-1945',
                'events' => [
                    '1884' => 'Hiệp ước Patenôtre - Bảo hộ toàn bộ',
                    '1885' => 'Vua Hàm Nghi xuất bôn',
                    '1916' => 'Khởi nghĩa Duy Tân',
                    '1945' => 'Cách mạng tháng 8'
                ]
            ],
            'modern_hue' => [
                'title' => 'Huế hiện đại',
                'period' => '1945-nay',
                'events' => [
                    '1945' => 'Bảo Đại thoái vị',
                    '1968' => 'Chiến dịch Mậu Thân',
                    '1993' => 'UNESCO công nhận di sản văn hóa',
                    '2003' => 'Festival Huế đầu tiên'
                ]
            ]
        ];
    }

    /**
     * Get information about Hue's architectural landmarks
     * @return array
     */
    public static function get_hue_architectural_landmarks(): array {
        return [
            'imperial_city' => [
                'name' => 'Hoàng thành Huế',
                'built' => '1805-1812',
                'significance' => 'Trung tâm hành chính và chính trị của triều đại Nguyễn',
                'features' => [
                    'Kỳ Đài (Flag Tower)',
                    'Ngọ Môn (Noon Gate)',
                    'Điện Thái Hòa (Throne Palace)',
                    'Điện Cần Chánh (Royal Reception Hall)',
                    'Điện Càn Thành (Royal Residence)',
                    'Tử Cấm Thành (Forbidden Purple City)'
                ],
                'cultural_value' => 'Biểu tượng của quyền lực hoàng gia và kiến trúc truyền thống Việt Nam'
            ],
            'royal_tombs' => [
                'name' => 'Lăng tẩm hoàng gia',
                'locations' => [
                    'Lăng Gia Long' => [
                        'built' => '1814-1820',
                        'style' => 'Phong thủy truyền thống',
                        'significance' => 'Lăng đầu tiên của triều Nguyễn'
                    ],
                    'Lăng Minh Mạng' => [
                        'built' => '1840-1843',
                        'style' => 'Kiến trúc đối xứng hoàn hảo',
                        'significance' => 'Thể hiện tư tưởng Nho giáo'
                    ],
                    'Lăng Tự Đức' => [
                        'built' => '1864-1867',
                        'style' => 'Kiến trúc hài hòa với thiên nhiên',
                        'significance' => 'Lăng đẹp nhất với cảnh quan tự nhiên'
                    ]
                ]
            ],
            'religious_sites' => [
                'name' => 'Di tích tôn giáo',
                'sites' => [
                    'Chùa Thiên Mụ' => [
                        'built' => '1601',
                        'significance' => 'Biểu tượng tâm linh của Huế',
                        'features' => 'Tháp Phước Duyên, chuông Đại Hồng Chung'
                    ],
                    'Điện Hòn Chén' => [
                        'location' => 'Bờ sông Hương',
                        'significance' => 'Trung tâm thờ Mẫu Thiên Y A Na',
                        'festival' => 'Lễ hội điện Hòn Chén hàng năm'
                    ]
                ]
            ]
        ];
    }

    /**
     * Get information about Vietnamese cultural traditions
     * @return array
     */
    public static function get_vietnamese_cultural_traditions(): array {
        return [
            'royal_ceremonies' => [
                'title' => 'Nghi lễ hoàng gia',
                'ceremonies' => [
                    'Lễ Đăng Quang' => 'Lễ lên ngôi của vua mới',
                    'Lễ Tế Nam Giao' => 'Lễ tế trời đất tại đàn Nam Giao',
                    'Lễ Tế Xã Tắc' => 'Lễ tế thần đất và thần nông',
                    'Lễ Tế Miếu' => 'Lễ tế tổ tiên hoàng gia'
                ]
            ],
            'traditional_music' => [
                'title' => 'Âm nhạc truyền thống',
                'forms' => [
                    'Nhã nhạc cung đình Huế' => [
                        'description' => 'Âm nhạc cung đình được UNESCO công nhận',
                        'instruments' => ['Đàn nguyệt', 'Đàn tranh', 'Sáo trúc', 'Trống'],
                        'significance' => 'Biểu diễn trong các nghi lễ hoàng gia'
                    ],
                    'Ca Huế' => [
                        'description' => 'Dân ca truyền thống của Huế',
                        'themes' => ['Tình yêu', 'Quê hương', 'Lịch sử'],
                        'performance' => 'Trên thuyền sông Hương'
                    ]
                ]
            ],
            'traditional_cuisine' => [
                'title' => 'Ẩm thực truyền thống',
                'dishes' => [
                    'Bún bò Huế' => 'Món ăn đặc trưng của Huế',
                    'Bánh bèo' => 'Bánh truyền thống',
                    'Bánh nậm' => 'Bánh lá chuối',
                    'Bánh khoái' => 'Bánh xèo kiểu Huế',
                    'Chè Huế' => 'Các loại chè truyền thống'
                ],
                'characteristics' => 'Hương vị đậm đà, sử dụng nhiều gia vị, trình bày tinh tế'
            ],
            'traditional_costumes' => [
                'title' => 'Trang phục truyền thống',
                'costumes' => [
                    'Áo dài' => [
                        'origin' => 'Phát triển từ áo ngũ thân',
                        'features' => 'Ôm sát cơ thể, tà dài, cổ cao',
                        'significance' => 'Trang phục truyền thống của phụ nữ Việt Nam'
                    ],
                    'Áo gấm' => [
                        'usage' => 'Trang phục hoàng gia',
                        'materials' => 'Gấm thêu kim tuyến',
                        'occasions' => 'Lễ nghi, cung đình'
                    ]
                ]
            ]
        ];
    }

    /**
     * Get educational resources for different learning levels
     * @return array
     */
    public static function get_educational_resources(): array {
        return [
            'beginner' => [
                'title' => 'Tài liệu cơ bản',
                'topics' => [
                    'Địa lý Huế' => 'Vị trí, khí hậu, sông Hương',
                    'Lịch sử cơ bản' => 'Tên gọi, vai trò lịch sử',
                    'Văn hóa đơn giản' => 'Ẩm thực, trang phục cơ bản'
                ],
                'resources' => [
                    'Bản đồ Huế',
                    'Hình ảnh các di tích chính',
                    'Video giới thiệu cơ bản'
                ]
            ],
            'intermediate' => [
                'title' => 'Tài liệu trung cấp',
                'topics' => [
                    'Triều đại Nguyễn' => 'Các vị vua chính, chính sách',
                    'Kiến trúc' => 'Hoàng thành, lăng tẩm, chùa chiền',
                    'Văn hóa truyền thống' => 'Nghi lễ, âm nhạc, ẩm thực'
                ],
                'resources' => [
                    'Sơ đồ kiến trúc',
                    'Tài liệu lịch sử chi tiết',
                    'Video tham quan 360 độ'
                ]
            ],
            'advanced' => [
                'title' => 'Tài liệu nâng cao',
                'topics' => [
                    'Văn học cổ điển' => 'Truyện Kiều, thơ văn các vua',
                    'Nghiên cứu chuyên sâu' => 'Khảo cổ học, bảo tồn di sản',
                    'So sánh văn hóa' => 'Với các nền văn hóa khác'
                ],
                'resources' => [
                    'Tác phẩm văn học nguyên bản',
                    'Báo cáo nghiên cứu',
                    'Tài liệu UNESCO'
                ]
            ]
        ];
    }

    /**
     * Get interactive learning activities
     * @return array
     */
    public static function get_interactive_activities(): array {
        return [
            'virtual_tours' => [
                'title' => 'Tham quan ảo',
                'activities' => [
                    'Hoàng thành Huế' => 'Tham quan 360 độ các cung điện',
                    'Lăng tẩm' => 'Khám phá kiến trúc và phong thủy',
                    'Sông Hương' => 'Du thuyền ảo trên sông Hương'
                ]
            ],
            'historical_simulations' => [
                'title' => 'Mô phỏng lịch sử',
                'activities' => [
                    'Lễ Đăng Quang' => 'Mô phỏng nghi lễ lên ngôi',
                    'Xây dựng kinh thành' => 'Mô phỏng quá trình xây dựng',
                    'Cuộc sống cung đình' => 'Mô phỏng sinh hoạt hoàng gia'
                ]
            ],
            'cultural_workshops' => [
                'title' => 'Workshop văn hóa',
                'activities' => [
                    'Làm bánh truyền thống' => 'Học làm bánh Huế',
                    'Học nhạc cụ' => 'Học đàn tranh, đàn nguyệt',
                    'Thêu thùa' => 'Học thêu truyền thống'
                ]
            ]
        ];
    }
}
