const $modal = $("#modal");
const $bigImage = $("#big-image");

$(".small-image").click(function (e) {
    e.preventDefault();
    $bigImage.attr('src', `img/big/big${e.target.getAttribute('data-number')}.jpg`);
    $modal.fadeIn("slow", function () {
    });
});

$modal.click(function () {
    $modal.fadeOut("slow", function () {
    });
});