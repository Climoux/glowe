/* Reveal function animation */

const ratio = .1
const options = {
    root: null,
    rootMargin: '0px',
    threshold: .1
}

const handleIntersect = function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal-visible')
            entry.target.classList.remove('reveal')
            observer.unobserve(entry.target)
        }
    });
}

const observer = new IntersectionObserver(handleIntersect, options)
document.querySelectorAll('.reveal').forEach(function (r) {
    observer.observe(r)
})

window.onscroll = function () {

    if (document.documentElement.scrollTop > 80) {
        document.getElementById("section-nav-panel").style.background = "black";
        document.getElementById("section-nav-panel").style.height = "60px";
    }
    else {
        document.getElementById("section-nav-panel").style.background = "transparent";
        document.getElementById("section-nav-panel").style.height = "50px";
    }

}

$(window).scroll(function () {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function () {      // When arrow is clicked
    $('body,html').animate({
        scrollTop: 0                       // Scroll to top of body
    }, 500);
});