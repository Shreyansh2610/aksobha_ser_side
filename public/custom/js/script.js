var Home = function () {};

Home.prototype.layoutPage = function () {
    $(document).ready(function () {
        $(".nav-btns:first").trigger("click");
    });

    $(".nav-btns").on("click", function () {
        $(".nav-btns").not(this).removeClass("active");
        $(this).addClass("active");

        $(this).data("href");
        $("#content-section").html("");
        $.ajax({
            type: "GET",
            url: $(this).data("href"),
            dataType: "JSON",
            success: function (response) {
                $("#content-section").html(response.html);
            },
            error: function (response) {
                console.log(response);
            },
        });
    });
};

Home.prototype.currentPage = function () {
    $(".get-data").on("click", function () {
        console.log("here");

        $(this).data("href");
        $("body").html("");
        $.ajax({
            type: "GET",
            url: $(this).data("href"),
            dataType: "JSON",
            success: function (response) {
                $("body").html(response.html);
            },
            error: function (response) {
                console.log(response);
            },
        });
    });
};
var $_homePage = new Home();

var Workshop = function () {};
Workshop.prototype.layoutPage = function () {
    $(document).ready(function () {
        $(".nav-btns:nth-child(3)").trigger("click");
    });

    $(".nav-btns").on("click", function () {
        $(".nav-btns").not(this).removeClass("active");
        $(this).addClass("active");

        $(this).data("href");
        $("#content-section").html("");
        $.ajax({
            type: "GET",
            url: $(this).data("href"),
            dataType: "JSON",
            success: function (response) {
                $("#content-section").html(response.html);
            },
            error: function (response) {
                if(response.responseJSON.message=="Unauthenticated.") {
                    window.location.reload();
                }
            },
        });
    });


}
var $_workshop = new Workshop();

function faqClick() {
    $('#faqBtn').trigger('click');
}
function resourceClick() {
    $('#faqResourceBtn').trigger('click');
}
function todayClick() {
    $('#faqTodayBtn').trigger('click');
}
function notesClick() {
    $('#faqResourceBtn').trigger('click');
}
