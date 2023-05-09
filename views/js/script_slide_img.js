var bannerImg = document.querySelector('.banner .banner-image img');
var currentPosition = 0;

function slideImage() {
  currentPosition -= 5;
  //bannerImg.style.right = currentPosition + 'px';
  //if (currentPosition <= -(bannerImg.width)) {
  //  currentPosition = bannerImg.width;
  //}
}

setInterval(slideImage, 10);

window.onload = function() {
  var slide = document.getElementById("slide");
  slide.style.right = "100%";
  slide.style.opacity = "0";
  setTimeout(function() {
    slide.style.transition = "all 0.8s ease-out";
    slide.style.right = "0";
    slide.style.opacity = "1";
  }, 500);
};
