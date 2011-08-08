;(
    function($){
    $(document).ready(function(){
		$('.jScrollbar').jScrollbar();

        $("#move_up").click(function(e){
            $(this)
            .parents("#window")
            .toggle();
        });

        $("#window div.label").dblclick(function(){
            $(this).parent().find("div.body").slideToggle("800");
        });

        $("#taskbar .level1.menugroup .itemlevel1.item1 :regex(class,^itemlevel2 item\\d+$)").children("a").click(function(e){
            e.preventDefault();
            $("#window").show();
            var $button_menu = $(this);
            var $body_window = $button_menu
            .parents("#container")
             .find("#window div.body div.jScrollbar .jScrollbar_mask");

            $body_window.empty();
            var page_url = $button_menu.attr("href");

            var $title_window = $button_menu
            .parents("#container")
            .find("#window div.label > span:first-child");
            title_page = $(this).text();
            $title_window.empty();
            $title_window.append(title_page);
            /*c'est ici que je veux aire la modif
            * je pense que tu as compris
            * que je veux redimensionner ma fenetre je dois relancer une taille de scrollbar*/
            $("#window div.body").resize(function(){
                $body_window.children(".jScrollbar").jScrollbar();
            });

            $.ajax({
                type : "GET",
                url : page_url,
                cache : false,
                success : function(data){
                    var new_content = $("#window div.body div.jScrollbar .jScrollbar_mask", data);

                    $("#mask").append(new_content);
                }
            });
        });
    });
})(jQuery);
