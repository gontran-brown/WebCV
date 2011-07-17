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
            $("#window").show();
            var $button_menu = $(this);
            var $body_window = $button_menu
            .parents("#container")
            .find("#window div.body");

            $body_window.empty();
            var page_url = $button_menu.attr("href");

            var $title_window = $button_menu
            .parents("#container")
            .find("#window div.label > span:first-child");
            title_page = $(this).text();
            $title_window.empty();
            $title_window.append(title_page);

            $.ajax({
                type : "GET",
                url : page_url,
                cache : false,
                success : function(data){
                    var new_content = $("#window div.body",data);
                    $body_window.replaceWith(new_content);
                }
            });
        });
    });
})(jQuery);
