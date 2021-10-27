$(window).scroll(function() {
    if ($(document).scrollTop() >= 108) {
        $(".shopping-item").hide()
        $(".shopping-item-2").show()
    } else {
        $(".shopping-item").show()
        $(".shopping-item-2").hide()
    }
});

window.redure = sessionStorage.getItem('redure')