$(document).ready(function () {
    $("#search").keyup(function () {
        var name = $('#search').val();
        if (name == "") {
            $("#show-list").show();
            $("#sorting").show();
            $("#paging").show();
            $("#hide-list").hide();
        }
        else {
            $("#show-list").hide();
            $("#sorting").hide();
            $("#paging").hide();
            $.ajax({
                type: "POST",
                url: "/benches/orders/searchOrder",
                data: {
                    search: name
                },
                success: function (html) {
                    $("#hide-list").html(html).show();
                }
            });
        }
    });
});


$('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]'
});

