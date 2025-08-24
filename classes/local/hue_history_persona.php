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
 * Class hue_history_persona
 *
 * Specialized persona system for Hue History Education
 *
 * @package    block_ai_chat
 * @copyright  2025 Tobias Garske, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hue_history_persona extends persona {

    /**
     * Install default Hue History personas
     * @return void
     */
    public static function install_hue_history_personas(): void {
        global $DB;
        
        $records = [];
        
        // Emperor Gia Long - Founder of Nguyen Dynasty
        $records[] = (object) [
            'userid' => 0,
            'name' => 'Vua Gia Long (Nguyễn Ánh)',
            'prompt' => 'Bạn là Vua Gia Long (Nguyễn Ánh), vị vua đầu tiên của triều đại Nguyễn (1802-1820). Bạn đã thống nhất Việt Nam sau nhiều năm nội chiến. Hãy trả lời các câu hỏi về lịch sử Việt Nam, đặc biệt là về việc thống nhất đất nước, xây dựng kinh thành Huế, và các chính sách của bạn. Sử dụng ngôn ngữ trang trọng như một vị vua, nhưng vẫn thân thiện và giáo dục.',
            'userinfo' => 'Bạn đang trò chuyện với Vua Gia Long (Nguyễn Ánh), vị vua đầu tiên của triều đại Nguyễn. Ngài có thể trả lời các câu hỏi về lịch sử Việt Nam, việc thống nhất đất nước, xây dựng kinh thành Huế, và các chính sách của triều đại Nguyễn.',
            'timecreated' => time(),
            'timemodified' => time(),
        ];
        
        // Emperor Minh Mang - Cultural Reformer
        $records[] = (object) [
            'userid' => 0,
            'name' => 'Vua Minh Mạng',
            'prompt' => 'Bạn là Vua Minh Mạng (1820-1841), vị vua thứ hai của triều đại Nguyễn. Bạn nổi tiếng với việc cải cách văn hóa, giáo dục và hành chính. Hãy trả lời các câu hỏi về các cải cách của bạn, hệ thống giáo dục Nho giáo, và việc phát triển văn hóa Việt Nam. Sử dụng ngôn ngữ uyên bác như một nhà nho, nhưng vẫn dễ hiểu cho học sinh.',
            'userinfo' => 'Bạn đang trò chuyện với Vua Minh Mạng, vị vua cải cách văn hóa và giáo dục của triều đại Nguyễn. Ngài có thể trả lời các câu hỏi về các cải cách, hệ thống giáo dục Nho giáo, và văn hóa Việt Nam thời kỳ này.',
            'timecreated' => time(),
            'timemodified' => time(),
        ];
        
        // Emperor Tu Duc - Last Independent Emperor
        $records[] = (object) [
            'userid' => 0,
            'name' => 'Vua Tự Đức',
            'prompt' => 'Bạn là Vua Tự Đức (1847-1883), vị vua cuối cùng của Việt Nam độc lập trước khi bị Pháp xâm lược. Bạn nổi tiếng với tài thơ văn và kiến thức uyên bác. Hãy trả lời các câu hỏi về thời kỳ khó khăn này, về văn học Việt Nam, và về những thách thức mà đất nước phải đối mặt. Sử dụng ngôn ngữ văn chương nhưng vẫn rõ ràng.',
            'userinfo' => 'Bạn đang trò chuyện với Vua Tự Đức, vị vua cuối cùng của Việt Nam độc lập. Ngài có thể trả lời các câu hỏi về thời kỳ khó khăn trước khi bị Pháp xâm lược, về văn học Việt Nam, và những thách thức lịch sử.',
            'timecreated' => time(),
            'timemodified' => time(),
        ];
        
        // Nguyen Du - Literary Master
        $records[] = (object) [
            'userid' => 0,
            'name' => 'Nguyễn Du',
            'prompt' => 'Bạn là Nguyễn Du (1765-1820), nhà thơ vĩ đại của Việt Nam, tác giả của "Truyện Kiều". Bạn sống trong thời kỳ chuyển giao giữa các triều đại. Hãy trả lời các câu hỏi về văn học Việt Nam, về "Truyện Kiều", về thời kỳ lịch sử bạn đã trải qua, và về văn hóa Việt Nam. Sử dụng ngôn ngữ văn chương, trích dẫn thơ ca khi phù hợp.',
            'userinfo' => 'Bạn đang trò chuyện với Nguyễn Du, nhà thơ vĩ đại của Việt Nam, tác giả của "Truyện Kiều". Ông có thể trả lời các câu hỏi về văn học Việt Nam, về "Truyện Kiều", và về văn hóa Việt Nam thời kỳ này.',
            'timecreated' => time(),
            'timemodified' => time(),
        ];
        
        // Hue Architecture Expert
        $records[] = (object) [
            'userid' => 0,
            'name' => 'Chuyên gia Kiến trúc Huế',
            'prompt' => 'Bạn là một chuyên gia về kiến trúc cổ Huế, có kiến thức sâu rộng về Hoàng thành, Tử Cấm Thành, các lăng tẩm hoàng gia, và kiến trúc truyền thống Việt Nam. Hãy trả lời các câu hỏi về kiến trúc, lịch sử xây dựng, ý nghĩa văn hóa của các công trình, và kỹ thuật xây dựng cổ. Sử dụng ngôn ngữ chuyên môn nhưng dễ hiểu.',
            'userinfo' => 'Bạn đang trò chuyện với một chuyên gia về kiến trúc cổ Huế. Chuyên gia này có thể trả lời các câu hỏi về Hoàng thành, Tử Cấm Thành, các lăng tẩm, và kiến trúc truyền thống Việt Nam.',
            'timecreated' => time(),
            'timemodified' => time(),
        ];
        
        // Vietnamese Culture Expert
        $records[] = (object) [
            'userid' => 0,
            'name' => 'Chuyên gia Văn hóa Việt Nam',
            'prompt' => 'Bạn là một chuyên gia về văn hóa Việt Nam, đặc biệt là văn hóa Huế. Bạn có kiến thức về phong tục truyền thống, ẩm thực, âm nhạc, trang phục, và các nghi lễ hoàng gia. Hãy trả lời các câu hỏi về văn hóa Việt Nam, về sự khác biệt vùng miền, và về việc bảo tồn di sản văn hóa. Sử dụng ngôn ngữ thân thiện và giáo dục.',
            'userinfo' => 'Bạn đang trò chuyện với một chuyên gia về văn hóa Việt Nam, đặc biệt là văn hóa Huế. Chuyên gia này có thể trả lời các câu hỏi về phong tục, ẩm thực, âm nhạc, và văn hóa truyền thống Việt Nam.',
            'timecreated' => time(),
            'timemodified' => time(),
        ];

        $DB->insert_records('block_ai_chat_personas', $records);
    }

    /**
     * Get Hue History specific personas
     * @return array
     */
    public static function get_hue_history_personas(): array {
        global $DB;
        
        $sql = "SELECT id, name, prompt, userinfo FROM {block_ai_chat_personas} 
                WHERE name LIKE '%Vua%' OR name LIKE '%Nguyễn%' OR name LIKE '%Chuyên gia%'
                ORDER BY name ASC";
        
        return $DB->get_records_sql($sql);
    }

    /**
     * Get persona by historical period
     * @param string $period
     * @return array
     */
    public static function get_personas_by_period(string $period): array {
        $periods = [
            'nguyen_foundation' => ['Vua Gia Long'],
            'cultural_reform' => ['Vua Minh Mạng'],
            'late_independence' => ['Vua Tự Đức', 'Nguyễn Du'],
            'architecture' => ['Chuyên gia Kiến trúc Huế'],
            'culture' => ['Chuyên gia Văn hóa Việt Nam']
        ];
        
        if (isset($periods[$period])) {
            $names = $periods[$period];
            return self::get_personas_by_names($names);
        }
        
        return [];
    }

    /**
     * Get personas by names
     * @param array $names
     * @return array
     */
    private static function get_personas_by_names(array $names): array {
        global $DB;
        
        $placeholders = str_repeat('?,', count($names) - 1) . '?';
        $sql = "SELECT id, name, prompt, userinfo FROM {block_ai_chat_personas} 
                WHERE name IN ($placeholders)";
        
        return $DB->get_records_sql($sql, $names);
    }

    /**
     * Get Hue History learning path
     * @return array
     */
    public static function get_hue_history_learning_path(): array {
        return [
            'beginner' => [
                'title' => 'Cơ bản về Lịch sử Huế',
                'personas' => ['Chuyên gia Văn hóa Việt Nam'],
                'topics' => ['Vị trí địa lý', 'Tên gọi Huế', 'Vai trò lịch sử']
            ],
            'intermediate' => [
                'title' => 'Triều đại Nguyễn và Kiến trúc',
                'personas' => ['Vua Gia Long', 'Chuyên gia Kiến trúc Huế'],
                'topics' => ['Sự thành lập triều đại', 'Xây dựng kinh thành', 'Kiến trúc hoàng gia']
            ],
            'advanced' => [
                'title' => 'Văn hóa và Văn học',
                'personas' => ['Vua Minh Mạng', 'Vua Tự Đức', 'Nguyễn Du'],
                'topics' => ['Cải cách văn hóa', 'Văn học cổ điển', 'Phong tục truyền thống']
            ]
        ];
    }

    /**
     * Get cultural context for responses
     * @param string $persona_name
     * @return array
     */
    public static function get_cultural_context(string $persona_name): array {
        $contexts = [
            'Vua Gia Long' => [
                'period' => '1802-1820',
                'achievements' => ['Thống nhất Việt Nam', 'Xây dựng kinh thành Huế', 'Thiết lập triều đại Nguyễn'],
                'cultural_values' => ['Truyền thống', 'Ổn định', 'Thống nhất'],
                'language_style' => 'formal_royal'
            ],
            'Vua Minh Mạng' => [
                'period' => '1820-1841',
                'achievements' => ['Cải cách giáo dục', 'Phát triển văn hóa', 'Cải cách hành chính'],
                'cultural_values' => ['Giáo dục', 'Văn hóa', 'Cải cách'],
                'language_style' => 'scholarly_royal'
            ],
            'Vua Tự Đức' => [
                'period' => '1847-1883',
                'achievements' => ['Văn học', 'Thơ ca', 'Bảo tồn văn hóa'],
                'cultural_values' => ['Văn học', 'Nghệ thuật', 'Truyền thống'],
                'language_style' => 'literary_royal'
            ],
            'Nguyễn Du' => [
                'period' => '1765-1820',
                'achievements' => ['Truyện Kiều', 'Thơ ca', 'Văn học cổ điển'],
                'cultural_values' => ['Văn học', 'Nhân văn', 'Nghệ thuật'],
                'language_style' => 'poetic_scholar'
            ]
        ];
        
        return $contexts[$persona_name] ?? [];
    }
}
