$(document).ready(function () {

    $('.container .grid-col li a').click(function (e) {

        let href = e.target.parentElement.getAttribute('href');

        $('.tabcontent').each(function (index, element) {
            if (`#${element.id}` != href) {
                $(element).removeClass('active');
            }
        })

        $('.container .blog-content span').click(function () {
            $(href).removeClass('active');
        })

        $(href).toggleClass('active');
        $('.tabcontent').css({
            height: "30rem"
        });

    })


})
function printPage() {
    window.print();
 }