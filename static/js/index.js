function activateBullet(nr) {
    var bullets = document.querySelectorAll('.banner-bullet');
    for (var i = 0; i < bullets.length; i++) {
        bullets[i].classList.remove('active');
    }

    bullets[nr].classList.add('active');
}

if (bannerCount > 1) {
    var counter = 0;
    var bannerInner = document.querySelector('.banner-inner');
    setTimeout(function() {
        window.iv = setInterval(function() {
            if (counter++ >= bannerCount - 1) {

                counter = 0;
                bannerInner.classList.add('notransition');
                setTimeout(function() {
                    bannerInner.style.transform = "translateX(0%)";
                    bannerInner.style.webkitTransform = "translateX(0%)";
                    bannerInner.style.opacity = "0";
                    activateBullet(0);

                    setTimeout(function() {
                        bannerInner.classList.remove('notransition');
                        setTimeout(function() {
                            bannerInner.style.opacity = "1";
                        }, 50);
                    }, 50);
                }, 50);



            } else {
                bannerInner.style.webkitTransform = "translateX(-" + (counter * bannerSize) + "%)";
                activateBullet(counter);
            }
        }, 6000);

        var bullets = document.querySelectorAll('.banner-bullet');
        for (var i = 0; i < bullets.length; i++) {
            bullets[i].setAttribute('data-count', i);
            bullets[i].addEventListener('click', function() {

            });
        }

    }, 5000);

}
activateBullet(0);


function setBannerSize() {
    var windowHeight = window.innerHeight;
    var bannerElem = document.querySelector('.full-size-banner');
    bannerElem.style.height = windowHeight + "px";
}

/*window.onresize = function() {
  setBannerSize();
}*/
setBannerSize();

var header = document.querySelector('.header');
header.classList.add('transparent');
header.classList.add('transparent-static');

var headerSpacing = document.querySelector('.header-spacing');
headerSpacing.style.display = "none";

window.onscroll = function() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
    if (scrollTop > 20) {
        header.classList.remove('transparent');
    } else {
        header.classList.add('transparent');
    }
}
