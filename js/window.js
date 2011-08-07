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
            var title_page = $(this).text();
            var url_page = $(this).attr("href");

            var $body_window = $(this)
            .parents("#container")
            .find("#window div.body");
            $body_window.empty();

            var $title_window = $(this)
            .parents("#container")
            .find("#window div.label > span:first-child");
            $title_window.empty();

            $title_window.append(title_page);

            $.ajax({
                type : "GET",
                url : url_page,
                cache : false,
                success : function(data){
                    var $new_content = $("#window div.body",data);
                    $body_window.append($new_content.children());
                },
                complete: function(){
                    $body_window.children(".jScrollbar").jScrollbar();
                }
            });

            $body_window.children(".jScrollbar").jScrollbar();
        });
    });
})(jQuery);
