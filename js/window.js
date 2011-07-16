;(
    function($){
    $(document).ready(function(){
        $("#move_up").click(function(e){
            $(this)
            .parents("#window")
            .toggle();
        });

        $("#choice .itemlevel2 a").click(function(){
            $("#body_window").empty();
            var txt = $(this).attr("title");
            console.log(txt);
            var page = txt+".php";
            console.log(page);

            $.ajax({
                type : "GET",
                url : page,
                success:function(data){
                    $("#body_window").text(data);
                }
            });
        });
    });
})(jQuery);
