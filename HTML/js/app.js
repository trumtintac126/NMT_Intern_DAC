//--------slide--------//
function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("service");
    if (n > x.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = x.length }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
    }
    x[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " w3-opacity-off";
}
//-------back-to-top-----//
var btn = $('#button_to_top');

$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});
//-------Message--------//
$('#sendMessage').hide();
//---------Scroll to div------------//
function scroll(item) {
    var cls = '';
    switch (item) {
        case 0:
            cls = '#about';
            break;
        case 1:
            cls = '#serivice';
            break;
        case 2:
            cls = '#work';
            break;
        case 3:
            cls = '#team';
            break;
        case 4:
            cls = '#contactus';
            break;
        default :
            break;
    }
    cls && $('html,body').animate({
        "scrollTop": $(cls).offset().top
    },1000);
}
//-----------Menu_reponsive------------//
$("body").click(function(event) {
    if (event.target.id != "navbar" && event.target.id != 'toggle-button') {
        $("#navbar").css("display","none");
    }
});
$("#toggle-button").click(function() {
     $("#navbar").attr("style","display: block !important");
});
