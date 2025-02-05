document.addEventListener('DOMContentLoaded', function() {
    let isFeedbackMode = false;
    let feedbackBox = null;
    let highlightedElement = null;

    
    document.addEventListener('keydown', function(e) {
        if (e.key.toLowerCase() === 'z' && !isFeedbackMode) {
            isFeedbackMode = true;
            document.body.classList.add('feedback-mode');
        }
    });

    document.addEventListener('click', function(e) {
        
        

        if (isFeedbackMode) {
            if (feedbackBox && feedbackBox.contains(e.target)) {
                return;
            }
            e.preventDefault();
            e.stopPropagation();

            if (feedbackBox) {
                
                exitFeedbackMode();
            } else {
                
                if (highlightedElement) {
                    highlightedElement.style.outline = '';
                }
                const target = e.target;
                highlightedElement = target;
                target.style.outline = '2px solid red';
                const rect = target.getBoundingClientRect();
                createFeedbackBox(rect, target);
            }
        }
    }, true);

    function createFeedbackBox(rect, target) {
        removeFeedbackBox();
        feedbackBox = document.createElement('div');
        feedbackBox.classList.add('feedback-box');
        feedbackBox.style.position = 'absolute';
        feedbackBox.style.top = (rect.top + window.scrollY + rect.height + 5) + 'px';
        feedbackBox.style.left = (rect.left + window.scrollX) + 'px';
        feedbackBox.innerHTML = `
            <div id="screenshot-container">Screenshot loading...</div>
            <textarea id="feedback-text" class="textarea textarea-bordered w-full mb-2" placeholder="Write your feedback..."></textarea>
            <button id="feedback-submit" class="btn btn-primary btn-sm">Done</button>
        `;
        document.body.appendChild(feedbackBox);

        let screenshotData = null;
    html2canvas(target).then(canvas => {
        screenshotData = canvas.toDataURL('image/png');
        document.getElementById('screenshot-container').innerHTML = `
            <img src="${screenshotData}" alt="Selected Element" style="max-width:200px; border:1px solid #ccc;" />
        `;
    });

        document.getElementById('feedback-submit').addEventListener('click', function(e) {
            e.preventDefault();
            const feedbackText = document.getElementById('feedback-text').value;
            if (feedbackText.trim() !== '') {
                sendFeedback(screenshotData, feedbackText);
            }
            exitFeedbackMode();
        });
    }

    function removeFeedbackBox() {
        if (feedbackBox) {
            feedbackBox.remove();
            feedbackBox = null;
        }
    }

    function exitFeedbackMode() {
        isFeedbackMode = false;
        document.body.classList.remove('feedback-mode');
        removeFeedbackBox();
        if (highlightedElement) {
            highlightedElement.style.outline = '';
            highlightedElement = null;
        }
    }

    function sendFeedback(screenshotData, feedbackText) {
        const pageUrl = window.location.href;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/feedback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                screenshot: screenshotData,
                page_url: pageUrl,
                feedback: feedbackText
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Feedback saved:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
