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

import {typeset} from 'filter_mathjaxloader/loader';

/**
 * Copy ai reply to clipboard.
 * @param {*} element
 */
export const copyToClipboard = (element) => {

    // Find the adjacent text container.
    const textElement = element.nextElementSibling;

    // Get the text content.
    const textToCopy = textElement.innerText || textElement.textContent;

    // Copy to clipboard using the Clipboard API.
    navigator.clipboard.writeText(textToCopy);

    // Briefly show toast.
    const toast = element.previousElementSibling;
    toast.style.visibility = 'visible';
    setTimeout(() => {
       toast.style.visibility = 'hidden';
    }, 750);

};

/**
 * Attach copy listener to all elements.
 */
export const attachCopyListenerLast = () => {
    const elements = document.querySelectorAll(".block_ai_chat_modal .copy");
    const lastquestion = elements[elements.length - 2];
    if (lastquestion) {
        lastquestion.addEventListener('click', function() {
            copyToClipboard(lastquestion);
        });
    }
    const lastanswer = elements[elements.length - 1];
    if (lastanswer) {
        lastanswer.addEventListener('click', function() {
            copyToClipboard(lastanswer);
        });
    }
};


/**
 * Focus textarea.
 */
export const focustextarea = () => {
    const textarea = document.getElementById('block_ai_chat-input-id');
    textarea.focus();
};


/**
 * Scroll to bottom of modal body.
 */
export const scrollToBottom = () => {
    const modalContent = document.querySelector('.block_ai_chat_modal .modal-body .block_ai_chat-output-wrapper');
    modalContent.scrollTop = modalContent.scrollHeight;
};


/**
 * Escape html.
 * @param {*} str
 */
export const escapeHTML = (str) => {
    if (str === null || str === undefined) {
        return '';
    }
    const escapeMap = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;',
        '`': '&#x60;',
        '/': '&#x2F;',
    };

    return String(str).replace(/[&<>"'`/]/g, function(match) {
        return escapeMap[match];
    });
};

/**
 * Hash function to get a hash of a string.
 *
 * @param {string} stringToHash the string to hash
 * @returns {Promise<string>} the promise containing a hex representation of the string encoded by SHA-256
 */
export const hash = async(stringToHash) => {
    const encoder = new TextEncoder();
    const data = encoder.encode(stringToHash);
    const hashAsArrayBuffer = await window.crypto.subtle.digest("SHA-256", data);
    const uint8ViewOfHash = new Uint8Array(hashAsArrayBuffer);
    return Array.from(uint8ViewOfHash)
        .map((b) => b.toString(16).padStart(2, "0"))
        .join("");
};

/**
 * Render mathjax formulas.
 *  @returns {void}
 */
export const renderMathjax = () => {
    // Render formulas with mathjax 2.7.9.
    if (typeof window.MathJax !== "undefined" && window.MathJax.Hub && typeof window.MathJax.Hub.Config === "function") {
        // Change delimiters so they work with chatgpt.
        window.MathJax.Hub.Config({
            tex2jax: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']],
            },
        });
        const content = document.querySelector('.block_ai_chat-output');
        if (content) {
            // Maybe somebody knows why it works if you use mathjax .Queue and typeset().
            // I just know that it does.
            // Claude says: This works because you're essentially giving MathJax two chances to render - the first call
            // queues it up, and the second call (Moodle's built-in function) ensures it completes. While it might seem
            // redundant, if it's working reliably, there's nothing wrong with this approach.
            if (window.MathJax.Hub.Queue && typeof window.MathJax.Hub.Queue === "function") {
                window.MathJax.Hub.Queue(["Typeset", window.MathJax.Hub, content]);
            }
            typeset(content);
        }
    }
};
