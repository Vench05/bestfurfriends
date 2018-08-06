var index = 0;
function slideShow() {
    var slideImg = document.getElementsByClassName('mySlides');
    for (let i = 0; i < slideImg.length; i++) {
        slideImg[i].style.display = 'none';
    }
    index++;
    if (index > slideImg.length) {
        index = 1;
    }
    slideImg[index - 1].style.display = 'block';
    setTimeout(function () {
        slideShow();
    }, 2000);
}

slideShow();