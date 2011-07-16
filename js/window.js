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
            var $button_menu = $(this);
            var $body_window = $button_menu
                .parents("#container")
                .find("#window div.body");
            $body_window.empty();
            var page_url = $button_menu.attr("href");

            $.ajax({
                type : "GET",
                url : page_url,
                cache : false,
                success : function(data){
                    var new_content = $("#window div.body",data);
                    console.log(new_content);
                    $body_window.append(new_content);
                }
            });
        });
    });
})(jQuery);
