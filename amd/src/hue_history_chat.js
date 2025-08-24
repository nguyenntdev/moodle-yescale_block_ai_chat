/**
 * @module block_ai_chat/hue_history_chat
 * @description Specialized JavaScript module for Hue History Education chatbot
 * @copyright 2025 Tobias Garske, ISB Bayern
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/ajax', 'core/notification', 'core/str'], function($, Ajax, Notification, Str) {
    
    /**
     * HueHistoryChat class
     */
    var HueHistoryChat = function() {
        this.currentPersona = null;
        this.chatHistory = [];
        this.learningPath = null;
        this.assessmentResults = [];
        this.init();
    };

    HueHistoryChat.prototype = {
        
        /**
         * Initialize the chat interface
         */
        init: function() {
            this.bindEvents();
            this.loadInitialData();
            this.setupPersonaSelection();
            this.setupAssessmentSystem();
        },

        /**
         * Bind event handlers
         */
        bindEvents: function() {
            var self = this;
            
            // Persona selection
            $(document).on('click', '[data-action="select-persona"]', function(e) {
                e.preventDefault();
                var personaId = $(this).data('persona-id');
                self.selectPersona(personaId);
            });

            // Chat input
            $('#chat-input').on('input', function() {
                self.validateInput();
            });

            $('#chat-input').on('keypress', function(e) {
                if (e.which === 13 && !e.shiftKey) {
                    e.preventDefault();
                    self.sendMessage();
                }
            });

            // Send message button
            $(document).on('click', '[data-action="send-message"]', function(e) {
                e.preventDefault();
                self.sendMessage();
            });

            // Suggestion chips
            $(document).on('click', '.suggestion-chip', function(e) {
                e.preventDefault();
                var suggestion = $(this).data('suggestion');
                $('#chat-input').val(suggestion);
                self.validateInput();
            });

            // Assessment buttons
            $(document).on('click', '[data-action="start-quiz"]', function(e) {
                e.preventDefault();
                var level = $(this).data('level');
                self.startQuiz(level);
            });

            // Quiz submission
            $(document).on('click', '#submit-quiz', function(e) {
                e.preventDefault();
                self.submitQuiz();
            });

            // Learning path button
            $(document).on('click', '[data-action="show-learning-path"]', function(e) {
                e.preventDefault();
                self.showLearningPath();
            });
        },

        /**
         * Load initial data
         */
        loadInitialData: function() {
            var self = this;
            
            // Load available personas
            Ajax.call([{
                methodname: 'block_ai_chat_get_hue_history_personas',
                args: {},
                done: function(response) {
                    self.availablePersonas = response.personas;
                    self.renderPersonaSelection();
                },
                fail: function(error) {
                    Notification.exception(error);
                }
            }]);

            // Load learning path
            Ajax.call([{
                methodname: 'block_ai_chat_get_hue_history_learning_path',
                args: {},
                done: function(response) {
                    self.learningPath = response.learning_path;
                    self.renderLearningPath();
                },
                fail: function(error) {
                    Notification.exception(error);
                }
            }]);
        },

        /**
         * Setup persona selection system
         */
        setupPersonaSelection: function() {
            var self = this;
            
            // Load default persona (Vietnamese Culture Expert)
            this.selectPersona('culture_expert');
        },

        /**
         * Select a historical persona
         */
        selectPersona: function(personaId) {
            var self = this;
            
            Ajax.call([{
                methodname: 'block_ai_chat_get_persona_details',
                args: {persona_id: personaId},
                done: function(response) {
                    self.currentPersona = response.persona;
                    self.renderSelectedPersona();
                    self.updateChatContext();
                    
                    // Show welcome message
                    self.addSystemMessage('Chào mừng bạn đến với ' + self.currentPersona.name + 
                                       '. Tôi có thể giúp bạn tìm hiểu về ' + 
                                       self.currentPersona.expertise + '. Bạn muốn hỏi gì?');
                },
                fail: function(error) {
                    Notification.exception(error);
                }
            }]);
        },

        /**
         * Render persona selection interface
         */
        renderPersonaSelection: function() {
            if (!this.availablePersonas) return;
            
            var personaGrid = $('.persona-grid');
            personaGrid.empty();
            
            this.availablePersonas.forEach(function(persona) {
                var personaCard = this.createPersonaCard(persona);
                personaGrid.append(personaCard);
            }.bind(this));
        },

        /**
         * Create a persona card element
         */
        createPersonaCard: function(persona) {
            var card = $('<div class="persona-card" data-persona-id="' + persona.id + '">');
            
            var avatar = $('<div class="persona-avatar">')
                .append($('<img src="' + persona.avatar_url + '" alt="' + persona.name + '" class="persona-image">'));
            
            var info = $('<div class="persona-info">')
                .append($('<h4 class="persona-name">').text(persona.name))
                .append($('<p class="persona-period">').text(persona.period))
                .append($('<p class="persona-expertise">').text(persona.expertise));
            
            var selectBtn = $('<div class="persona-select-btn">')
                .append($('<button class="btn btn-primary" data-action="select-persona" data-persona-id="' + persona.id + '">')
                    .text('Chọn'));
            
            return card.append(avatar, info, selectBtn);
        },

        /**
         * Render selected persona information
         */
        renderSelectedPersona: function() {
            if (!this.currentPersona) return;
            
            var personaInfo = $('.selected-persona-info');
            personaInfo.empty();
            
            var currentPersona = $('<div class="current-persona">');
            var avatar = $('<img src="' + this.currentPersona.avatar_url + '" alt="' + this.currentPersona.name + '" class="current-persona-avatar">');
            var details = $('<div class="current-persona-details">')
                .append($('<h4 class="current-persona-name">').text(this.currentPersona.name))
                .append($('<p class="current-persona-context">').text(this.currentPersona.context));
            
            currentPersona.append(avatar, details);
            personaInfo.append(currentPersona);
        },

        /**
         * Update chat context based on selected persona
         */
        updateChatContext: function() {
            if (!this.currentPersona) return;
            
            // Update system prompt for AI
            var systemPrompt = this.currentPersona.prompt;
            
            // Store in localStorage for persistence
            localStorage.setItem('hue_history_persona', JSON.stringify(this.currentPersona));
            localStorage.setItem('hue_history_system_prompt', systemPrompt);
        },

        /**
         * Validate chat input
         */
        validateInput: function() {
            var input = $('#chat-input').val().trim();
            var sendButton = $('.send-button');
            
            if (input.length > 0) {
                sendButton.prop('disabled', false);
            } else {
                sendButton.prop('disabled', true);
            }
        },

        /**
         * Send chat message
         */
        sendMessage: function() {
            var input = $('#chat-input');
            var message = input.val().trim();
            
            if (!message || !this.currentPersona) return;
            
            // Add user message to chat
            this.addUserMessage(message);
            
            // Clear input
            input.val('');
            this.validateInput();
            
            // Show loading
            this.showLoading();
            
            // Send to AI
            this.sendToAI(message);
        },

        /**
         * Send message to AI service
         */
        sendToAI: function(message) {
            var self = this;
            
            var requestData = {
                message: message,
                persona_id: this.currentPersona.id,
                system_prompt: this.currentPersona.prompt,
                chat_history: this.chatHistory.slice(-5) // Last 5 messages for context
            };
            
            Ajax.call([{
                methodname: 'block_ai_chat_send_message',
                args: requestData,
                done: function(response) {
                    self.hideLoading();
                    self.addAIMessage(response.ai_response);
                    self.updateChatHistory(message, response.ai_response);
                },
                fail: function(error) {
                    self.hideLoading();
                    Notification.exception(error);
                    self.addSystemMessage('Xin lỗi, đã xảy ra lỗi khi xử lý tin nhắn của bạn.');
                }
            }]);
        },

        /**
         * Add user message to chat
         */
        addUserMessage: function(message) {
            var messageElement = $('<div class="chat-message user-message">')
                .append($('<div class="message-content">').text(message))
                .append($('<div class="message-time">').text(this.getCurrentTime()));
            
            $('#chat-messages').append(messageElement);
            this.scrollToBottom();
        },

        /**
         * Add AI message to chat
         */
        addAIMessage: function(message) {
            var messageElement = $('<div class="chat-message ai-message">')
                .append($('<div class="message-avatar">')
                    .append($('<img src="' + this.currentPersona.avatar_url + '" alt="' + this.currentPersona.name + '">')))
                .append($('<div class="message-content">').html(message))
                .append($('<div class="message-time">').text(this.getCurrentTime()));
            
            $('#chat-messages').append(messageElement);
            this.scrollToBottom();
        },

        /**
         * Add system message to chat
         */
        addSystemMessage: function(message) {
            var messageElement = $('<div class="chat-message system-message">')
                .append($('<div class="message-content">').text(message))
                .append($('<div class="message-time">').text(this.getCurrentTime()));
            
            $('#chat-messages').append(messageElement);
            this.scrollToBottom();
        },

        /**
         * Update chat history
         */
        updateChatHistory: function(userMessage, aiResponse) {
            this.chatHistory.push({
                user: userMessage,
                ai: aiResponse,
                timestamp: new Date().toISOString()
            });
            
            // Keep only last 50 messages
            if (this.chatHistory.length > 50) {
                this.chatHistory = this.chatHistory.slice(-50);
            }
        },

        /**
         * Setup assessment system
         */
        setupAssessmentSystem: function() {
            // Load assessment data
            this.loadAssessmentData();
        },

        /**
         * Load assessment data
         */
        loadAssessmentData: function() {
            var self = this;
            
            Ajax.call([{
                methodname: 'block_ai_chat_get_hue_history_assessments',
                args: {},
                done: function(response) {
                    self.assessments = response.assessments;
                },
                fail: function(error) {
                    Notification.exception(error);
                }
            }]);
        },

        /**
         * Start quiz
         */
        startQuiz: function(level) {
            if (!this.assessments || !this.assessments[level]) {
                Notification.exception(new Error('Không thể tải bài kiểm tra'));
                return;
            }
            
            var quiz = this.assessments[level];
            this.currentQuiz = quiz;
            this.currentQuizLevel = level;
            this.currentQuizAnswers = {};
            
            this.renderQuiz(quiz);
            $('#quiz-modal').modal('show');
        },

        /**
         * Render quiz interface
         */
        renderQuiz: function(quiz) {
            $('#quiz-modal-title').text(quiz.title);
            
            var quizBody = $('#quiz-modal-body');
            quizBody.empty();
            
            // Add description
            quizBody.append($('<p class="quiz-description">').text(quiz.description));
            
            // Add questions
            quiz.questions.forEach(function(question, index) {
                var questionElement = this.createQuestionElement(question, index);
                quizBody.append(questionElement);
            }.bind(this));
        },

        /**
         * Create question element
         */
        createQuestionElement: function(question, index) {
            var questionDiv = $('<div class="quiz-question">');
            questionDiv.append($('<h5>').text('Câu ' + (index + 1) + ': ' + question.question));
            
            var optionsDiv = $('<div class="quiz-options">');
            question.options.forEach(function(option, optionIndex) {
                var optionElement = $('<div class="quiz-option">')
                    .append($('<input type="radio" name="q' + index + '" value="' + optionIndex + '" id="q' + index + '_' + optionIndex + '">'))
                    .append($('<label for="q' + index + '_' + optionIndex + '">').text(option));
                optionsDiv.append(optionElement);
            });
            
            questionDiv.append(optionsDiv);
            return questionDiv;
        },

        /**
         * Submit quiz
         */
        submitQuiz: function() {
            if (!this.currentQuiz) return;
            
            var answers = {};
            var allAnswered = true;
            
            this.currentQuiz.questions.forEach(function(question, index) {
                var selectedOption = $('input[name="q' + index + '"]:checked').val();
                if (selectedOption === undefined) {
                    allAnswered = false;
                    return;
                }
                answers[index] = parseInt(selectedOption);
            });
            
            if (!allAnswered) {
                Notification.alert(Str.get_string('error'), 'Vui lòng trả lời tất cả các câu hỏi.');
                return;
            }
            
            this.processQuizResults(answers);
        },

        /**
         * Process quiz results
         */
        processQuizResults: function(answers) {
            var self = this;
            
            var requestData = {
                quiz_level: this.currentQuizLevel,
                answers: answers,
                quiz_data: this.currentQuiz
            };
            
            Ajax.call([{
                methodname: 'block_ai_chat_submit_hue_history_quiz',
                args: requestData,
                done: function(response) {
                    self.showQuizResults(response.results);
                    self.updateProgress(response.progress);
                },
                fail: function(error) {
                    Notification.exception(error);
                }
            }]);
        },

        /**
         * Show quiz results
         */
        showQuizResults: function(results) {
            var quizBody = $('#quiz-modal-body');
            quizBody.empty();
            
            // Add score
            quizBody.append($('<div class="quiz-results">')
                .append($('<h4>').text('Kết quả bài kiểm tra'))
                .append($('<p class="quiz-score">').text('Điểm số: ' + results.score + '/' + results.total))
                .append($('<p class="quiz-percentage">').text('Phần trăm: ' + results.percentage + '%')));
            
            // Add feedback
            if (results.feedback) {
                quizBody.append($('<div class="quiz-feedback">')
                    .append($('<h5>').text('Nhận xét:'))
                    .append($('<p>').text(results.feedback)));
            }
            
            // Add recommendations
            if (results.recommendations) {
                quizBody.append($('<div class="quiz-recommendations">')
                    .append($('<h5>').text('Khuyến nghị:'))
                    .append($('<ul>').append(results.recommendations.map(function(rec) {
                        return $('<li>').text(rec);
                    }))));
            }
            
            // Update submit button
            $('#submit-quiz').text('Đóng').off('click').on('click', function() {
                $('#quiz-modal').modal('hide');
            });
        },

        /**
         * Update learning progress
         */
        updateProgress: function(progress) {
            // Update progress bars
            Object.keys(progress).forEach(function(area) {
                var percentage = progress[area];
                var progressBar = $('.progress-area[data-area="' + area + '"] .progress-fill');
                progressBar.css('width', percentage + '%');
                
                var percentageText = $('.progress-area[data-area="' + area + '"] .progress-percentage');
                percentageText.text(percentage + '%');
            });
        },

        /**
         * Show learning path
         */
        showLearningPath: function() {
            if (!this.learningPath) return;
            
            // Create modal or expand section to show detailed learning path
            this.renderDetailedLearningPath();
        },

        /**
         * Render detailed learning path
         */
        renderDetailedLearningPath: function() {
            // Implementation for detailed learning path display
            console.log('Rendering detailed learning path:', this.learningPath);
        },

        /**
         * Show loading overlay
         */
        showLoading: function() {
            $('#loading-overlay').show();
        },

        /**
         * Hide loading overlay
         */
        hideLoading: function() {
            $('#loading-overlay').hide();
        },

        /**
         * Scroll chat to bottom
         */
        scrollToBottom: function() {
            var chatMessages = $('#chat-messages');
            chatMessages.scrollTop(chatMessages[0].scrollHeight);
        },

        /**
         * Get current time string
         */
        getCurrentTime: function() {
            var now = new Date();
            return now.toLocaleTimeString('vi-VN', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    };

    return {
        init: function() {
            return new HueHistoryChat();
        }
    };
});
