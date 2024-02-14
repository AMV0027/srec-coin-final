window.addEventListener('DOMContentLoaded', () => {
    const scrollingText = document.querySelector('.scrolling-text');
    const scrollingTextContainer = document.querySelector('.scrolling-text-container');
    scrollingTextContainer.style.width = scrollingText.offsetWidth + 'px';
  });
  