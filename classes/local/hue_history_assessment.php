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
 * Class hue_history_assessment
 *
 * Assessment system for Hue History Education
 *
 * @package    block_ai_chat
 * @copyright  2025 Tobias Garske, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hue_history_assessment {

    /**
     * Get assessment quizzes by difficulty level
     * @param string $level
     * @return array
     */
    public static function get_assessment_quizzes(string $level = 'beginner'): array {
        $quizzes = [
            'beginner' => [
                'title' => 'Kiểm tra cơ bản về Lịch sử Huế',
                'description' => 'Kiểm tra kiến thức cơ bản về địa lý, tên gọi và vai trò lịch sử của Huế',
                'questions' => [
                    [
                        'question' => 'Huế nằm ở đâu của Việt Nam?',
                        'options' => [
                            'Miền Bắc',
                            'Miền Trung',
                            'Miền Nam',
                            'Tây Nguyên'
                        ],
                        'correct' => 1,
                        'explanation' => 'Huế nằm ở miền Trung Việt Nam, thuộc tỉnh Thừa Thiên Huế.'
                    ],
                    [
                        'question' => 'Sông nào chảy qua Huế?',
                        'options' => [
                            'Sông Hồng',
                            'Sông Hương',
                            'Sông Mekong',
                            'Sông Đồng Nai'
                        ],
                        'correct' => 1,
                        'explanation' => 'Sông Hương chảy qua Huế, tạo nên vẻ đẹp thơ mộng cho thành phố.'
                    ],
                    [
                        'question' => 'Huế từng là kinh đô của triều đại nào?',
                        'options' => [
                            'Nhà Lý',
                            'Nhà Trần',
                            'Nhà Lê',
                            'Nhà Nguyễn'
                        ],
                        'correct' => 3,
                        'explanation' => 'Huế là kinh đô của triều đại Nguyễn từ năm 1802 đến 1945.'
                    ]
                ]
            ],
            'intermediate' => [
                'title' => 'Kiểm tra trung cấp về Triều đại Nguyễn',
                'description' => 'Kiểm tra kiến thức về các vị vua, chính sách và kiến trúc của triều Nguyễn',
                'questions' => [
                    [
                        'question' => 'Vị vua nào đã thống nhất Việt Nam và lập triều Nguyễn?',
                        'options' => [
                            'Vua Minh Mạng',
                            'Vua Gia Long',
                            'Vua Tự Đức',
                            'Vua Khải Định'
                        ],
                        'correct' => 1,
                        'explanation' => 'Vua Gia Long (Nguyễn Ánh) đã thống nhất Việt Nam và lập triều Nguyễn năm 1802.'
                    ],
                    [
                        'question' => 'Kinh thành Huế được xây dựng trong khoảng thời gian nào?',
                        'options' => [
                            '1803-1812',
                            '1815-1820',
                            '1820-1830',
                            '1830-1840'
                        ],
                        'correct' => 0,
                        'explanation' => 'Kinh thành Huế được xây dựng từ năm 1803 đến 1812 dưới thời Vua Gia Long.'
                    ],
                    [
                        'question' => 'Vị vua nào nổi tiếng với việc cải cách giáo dục và văn hóa?',
                        'options' => [
                            'Vua Gia Long',
                            'Vua Minh Mạng',
                            'Vua Tự Đức',
                            'Vua Đồng Khánh'
                        ],
                        'correct' => 1,
                        'explanation' => 'Vua Minh Mạng (1820-1841) nổi tiếng với việc cải cách giáo dục, văn hóa và hành chính.'
                    ]
                ]
            ],
            'advanced' => [
                'title' => 'Kiểm tra nâng cao về Văn hóa và Văn học',
                'description' => 'Kiểm tra kiến thức về văn học cổ điển, phong tục truyền thống và di sản văn hóa',
                'questions' => [
                    [
                        'question' => 'Tác phẩm "Truyện Kiều" được viết bởi ai?',
                        'options' => [
                            'Nguyễn Trãi',
                            'Nguyễn Du',
                            'Nguyễn Bỉnh Khiêm',
                            'Nguyễn Đình Chiểu'
                        ],
                        'correct' => 1,
                        'explanation' => '"Truyện Kiều" được viết bởi Nguyễn Du (1765-1820), nhà thơ vĩ đại của Việt Nam.'
                    ],
                    [
                        'question' => 'Nhã nhạc cung đình Huế được UNESCO công nhận vào năm nào?',
                        'options' => [
                            '1993',
                            '2003',
                            '2008',
                            '2013'
                        ],
                        'correct' => 1,
                        'explanation' => 'Nhã nhạc cung đình Huế được UNESCO công nhận là Di sản văn hóa phi vật thể năm 2003.'
                    ],
                    [
                        'question' => 'Lăng tẩm nào được coi là đẹp nhất với cảnh quan tự nhiên?',
                        'options' => [
                            'Lăng Gia Long',
                            'Lăng Minh Mạng',
                            'Lăng Tự Đức',
                            'Lăng Khải Định'
                        ],
                        'correct' => 2,
                        'explanation' => 'Lăng Tự Đức được coi là đẹp nhất với kiến trúc hài hòa với thiên nhiên xung quanh.'
                    ]
                ]
            ]
        ];

        return $quizzes[$level] ?? $quizzes['beginner'];
    }

    /**
     * Get learning objectives by level
     * @param string $level
     * @return array
     */
    public static function get_learning_objectives(string $level): array {
        $objectives = [
            'beginner' => [
                'title' => 'Mục tiêu học tập cơ bản',
                'objectives' => [
                    'Hiểu được vị trí địa lý và tầm quan trọng của Huế',
                    'Biết được Huế từng là kinh đô của triều đại nào',
                    'Nhận biết được các di tích chính của Huế',
                    'Hiểu được ý nghĩa của sông Hương đối với Huế'
                ],
                'assessment_criteria' => [
                    'Trả lời đúng ít nhất 2/3 câu hỏi cơ bản',
                    'Có thể mô tả được vị trí địa lý của Huế',
                    'Biết được tên các di tích chính'
                ]
            ],
            'intermediate' => [
                'title' => 'Mục tiêu học tập trung cấp',
                'objectives' => [
                    'Hiểu được quá trình thành lập và phát triển của triều Nguyễn',
                    'Biết được các vị vua chính và chính sách của họ',
                    'Hiểu được quá trình xây dựng kinh thành Huế',
                    'Nhận biết được các kiến trúc chính trong Hoàng thành'
                ],
                'assessment_criteria' => [
                    'Trả lời đúng ít nhất 2/3 câu hỏi trung cấp',
                    'Có thể giải thích được vai trò của các vị vua',
                    'Hiểu được ý nghĩa của các công trình kiến trúc'
                ]
            ],
            'advanced' => [
                'title' => 'Mục tiêu học tập nâng cao',
                'objectives' => [
                    'Hiểu sâu về văn học cổ điển Việt Nam',
                    'Biết được các phong tục truyền thống và nghi lễ hoàng gia',
                    'Hiểu được giá trị di sản văn hóa của Huế',
                    'Có thể so sánh văn hóa Huế với các vùng khác'
                ],
                'assessment_criteria' => [
                    'Trả lời đúng ít nhất 2/3 câu hỏi nâng cao',
                    'Có thể phân tích được giá trị văn hóa',
                    'Hiểu được ý nghĩa lịch sử sâu sắc'
                ]
            ]
        ];

        return $objectives[$level] ?? $objectives['beginner'];
    }

    /**
     * Get progress tracking system
     * @return array
     */
    public static function get_progress_tracking(): array {
        return [
            'knowledge_areas' => [
                'geography' => [
                    'title' => 'Địa lý Huế',
                    'subtopics' => [
                        'location' => 'Vị trí địa lý',
                        'climate' => 'Khí hậu',
                        'rivers' => 'Sông ngòi',
                        'landmarks' => 'Địa danh'
                    ]
                ],
                'history' => [
                    'title' => 'Lịch sử Huế',
                    'subtopics' => [
                        'ancient_period' => 'Thời kỳ cổ đại',
                        'nguyen_dynasty' => 'Triều đại Nguyễn',
                        'colonial_period' => 'Thời kỳ thuộc địa',
                        'modern_period' => 'Thời kỳ hiện đại'
                    ]
                ],
                'architecture' => [
                    'title' => 'Kiến trúc Huế',
                    'subtopics' => [
                        'imperial_city' => 'Hoàng thành',
                        'royal_tombs' => 'Lăng tẩm',
                        'religious_sites' => 'Di tích tôn giáo',
                        'traditional_houses' => 'Nhà truyền thống'
                    ]
                ],
                'culture' => [
                    'title' => 'Văn hóa Huế',
                    'subtopics' => [
                        'royal_ceremonies' => 'Nghi lễ hoàng gia',
                        'traditional_music' => 'Âm nhạc truyền thống',
                        'traditional_cuisine' => 'Ẩm thực truyền thống',
                        'traditional_costumes' => 'Trang phục truyền thống'
                    ]
                ]
            ],
            'skill_levels' => [
                'basic_knowledge' => 'Kiến thức cơ bản',
                'understanding' => 'Hiểu biết',
                'application' => 'Vận dụng',
                'analysis' => 'Phân tích',
                'evaluation' => 'Đánh giá',
                'creation' => 'Sáng tạo'
            ]
        ];
    }

    /**
     * Get personalized learning recommendations
     * @param array $user_progress
     * @return array
     */
    public static function get_learning_recommendations(array $user_progress): array {
        $recommendations = [];

        // Analyze user progress and provide recommendations
        foreach ($user_progress as $area => $progress) {
            if ($progress < 30) {
                $recommendations[$area] = [
                    'level' => 'beginner',
                    'suggestions' => [
                        'Bắt đầu với kiến thức cơ bản về ' . $area,
                        'Xem video giới thiệu',
                        'Đọc tài liệu cơ bản',
                        'Tham gia khóa học nhập môn'
                    ]
                ];
            } elseif ($progress < 60) {
                $recommendations[$area] = [
                    'level' => 'intermediate',
                    'suggestions' => [
                        'Tăng cường kiến thức trung cấp',
                        'Tham gia thảo luận nhóm',
                        'Làm bài tập thực hành',
                        'Tham quan thực tế nếu có thể'
                    ]
                ];
            } else {
                $recommendations[$area] = [
                    'level' => 'advanced',
                    'suggestions' => [
                        'Nghiên cứu chuyên sâu',
                        'Viết báo cáo hoặc bài luận',
                        'Tham gia dự án nghiên cứu',
                        'Hướng dẫn người khác'
                    ]
                ];
            }
        }

        return $recommendations;
    }

    /**
     * Get assessment results analysis
     * @param array $quiz_results
     * @return array
     */
    public static function analyze_assessment_results(array $quiz_results): array {
        $analysis = [
            'overall_score' => 0,
            'strengths' => [],
            'weaknesses' => [],
            'recommendations' => [],
            'next_steps' => []
        ];

        // Calculate overall score
        $total_questions = count($quiz_results);
        $correct_answers = 0;

        foreach ($quiz_results as $question) {
            if ($question['user_answer'] === $question['correct_answer']) {
                $correct_answers++;
            }
        }

        $analysis['overall_score'] = ($correct_answers / $total_questions) * 100;

        // Identify strengths and weaknesses
        foreach ($quiz_results as $question) {
            if ($question['user_answer'] === $question['correct_answer']) {
                $analysis['strengths'][] = $question['topic'];
            } else {
                $analysis['weaknesses'][] = $question['topic'];
            }
        }

        // Generate recommendations based on performance
        if ($analysis['overall_score'] >= 80) {
            $analysis['recommendations'][] = 'Bạn đã nắm vững kiến thức cơ bản. Hãy tiếp tục học tập ở cấp độ cao hơn.';
            $analysis['next_steps'][] = 'Chuyển sang cấp độ trung cấp';
        } elseif ($analysis['overall_score'] >= 60) {
            $analysis['recommendations'][] = 'Bạn có kiến thức tốt nhưng cần củng cố một số phần.';
            $analysis['next_steps'][] = 'Ôn tập các chủ đề yếu';
        } else {
            $analysis['recommendations'][] = 'Bạn cần ôn tập lại kiến thức cơ bản.';
            $analysis['next_steps'][] = 'Học lại từ đầu với tài liệu cơ bản';
        }

        return $analysis;
    }
}
