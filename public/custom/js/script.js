var Home = function () {

 };

Home.prototype.layoutPage = function () {
    $(document).ready(function () {
        $('.nav-btns:first').trigger('click');
    });

    $('.nav-btns').on('click',function() {
        $('.nav-btns').not(this).removeClass('active');
        $(this).addClass('active');

        $(this).data('href');
        $('#content-section').html('');
        $.ajax({
            type: "GET",
            url: $(this).data('href'),
            dataType: "JSON",
            success: function (response) {
                $('#content-section').html(response.html);
            },
            error: function (response) {

            }
        });
    });
};

var $_homePage = new Home();
