var UINestable = function () {
	"use strict";
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = $('#nestable-output');
        if (window.JSON) {
            output.text(window.JSON.stringify(list.nestable('serialize')));
      
        } else {
            output.text('JSON browser support required for this demo.');
        }
    };
    var runNestable = function () {
        $('#nestable').nestable({
            group: 1
        }).on('change', updateOutput);
        $('#nestable2').nestable({
            group: 1
        }).on('change', updateOutput);
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        updateOutput($('#nestable2').data('output', $('#nestable2-output')));
        $('#nestable-menu').on('click', function (e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });
        $('#nestable3').nestable();
    };
    return {
        init: function () {
            runNestable();
        }
    };
}();