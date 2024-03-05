document.addEventListener('DOMContentLoaded', function() {
    var thumbs = document.querySelectorAll('.scrollbar-thumb');
    var containers = document.querySelectorAll('.homecontent-list-container');
    var states = Array.from(thumbs).map(() => ({ isDragging: false, startX: 0, scrollLeft: 0 }));

    thumbs.forEach((thumb, index) => {
        thumb.addEventListener('mousedown', function(e) {
            states[index].isDragging = true;
            states[index].startX = e.pageX;
            states[index].scrollLeft = containers[index].scrollLeft;
        });

        document.addEventListener('mousemove', function(e) {
            if (!states[index].isDragging) return;
            e.preventDefault();
            var x = e.pageX - states[index].startX;
            var scroll = x * (containers[index].scrollWidth - containers[index].clientWidth) / (thumb.parentNode.clientWidth - thumb.offsetWidth);
            containers[index].scrollLeft = states[index].scrollLeft + scroll;
        });

        document.addEventListener('mouseup', function() {
            states[index].isDragging = false;
        });

        containers[index].addEventListener('scroll', function() {
            thumb.style.left = containers[index].scrollLeft / (containers[index].scrollWidth - containers[index].clientWidth) * (thumb.parentNode.clientWidth - thumb.offsetWidth) + 'px';
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var images = ['/assets/images/img1.png', '/assets/images/img2.png', '/assets/images/img3.png'];
    var currentImageIndex = 0;
    var imageElement = document.querySelector('.carousel-section');
    var prevButton = document.querySelector('.carousel-button-prev');
    var nextButton = document.querySelector('.carousel-button-next');

    prevButton.addEventListener('click', function() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        changeImage();
    });

    nextButton.addEventListener('click', function() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        changeImage();
    });

    function changeImage() {
        imageElement.style.opacity = 0;
        prevButton.style.opacity = 0;
        nextButton.style.opacity = 0;
        setTimeout(function() {
            imageElement.src = images[currentImageIndex];
            imageElement.style.opacity = 1;
            prevButton.style.opacity = 1;
            nextButton.style.opacity = 1;
        }, 1000);
    }
});