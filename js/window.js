;(
    function($){
    $(document).ready(function(){
        $("#move_up").click(function(e){
            $(this)
            .parents("#window")
            .toggle();
        });

        $("#taskbar .level1.menugroup .itemlevel1.item1 :regex(class,^itemlevel2 item\\d+$)").children("a").click(function(e){
            e.preventDefault();
            $button_menu = $(this);
            $button_menu
                .parents("#container")
                .find("#window div.body")
                .empty();
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
