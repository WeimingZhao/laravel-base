/**
 * Created by yangyang on 16/3/2.
 */
;(function ($, window, document, undefined) {
    var pluginName = 'fileuploadApp',
        defaults = {
            'type': 'file',//上传类型 file|image
            'val': '.fileValue',
            'view': false,
            'viewAppend': false,
            'viewSize': '200'
        };

    function fileuploadApp(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    };

    fileuploadApp.prototype = {
        init: function () {
            var type = this.settings.type,
                valEle = this.settings.val,
                viewEle = this.settings.view,
                viewAppend = this.settings.viewAppend,
                viewSize = this.settings.viewSize;

            if (type == 'image') {
                var url = '/upload/uploader?action=image';
            } else {
                var url = '/upload/uploader?action=file';
            }
            $(this.element).fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {
                    if (data.result.state == 'SUCCESS') {
                        $(valEle).val(data.result.url);
                        if (type == 'image' && viewEle != false) {
                            var text = '<img class="imageView" src="/image/' + data.result.title + '?s=' + viewSize + '">';
                            if (viewAppend == true) {
                                $(viewEle).append(text);
                            } else {
                                $(viewEle).html(text);
                            }
                        }
                    } else {
                        alert(data.result.state);
                    }
                }
                ,
                progressall: function () {
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        },
    };
    $.fn[pluginName] = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new fileuploadApp(this, options));
            }
        });

        // chain jQuery functions
        return this;
    };
})(jQuery, window, document);
