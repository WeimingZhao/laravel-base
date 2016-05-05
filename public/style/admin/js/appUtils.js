var appUtils = {
    cache: {
        'dialog': {},
        'filter': {}
    },
    reloadPage: function (href) {
        layer.load(1, {shade: [0.3, '#000']});
        if (href) {
            window.location.href = path + href;
        } else {
            window.location.reload();
        }
    },
    doSubmit: function (config) {
        var shade = (typeof config.shade == 'boolean') ? config.shade : true;
        if (shade) {
            layerId = layer.load(1, {shade: [0.3, '#000']})
        }
        $('#submitForm').html('<input type="hidden" name="json"/>').attr('action', path + config.url)
            .attr('method', config.method || 'get').attr('target', config.target || '_self');
        $('#submitForm [name="json"]').val($.toJSON(config.postParam || {}));
        $('#submitForm').submit();
    }
    ,
    doAjax: function (config) {
        var rnd = +new Date(),
            layerId = '',
            currUrl = config.url.indexOf('?') !== -1 ? (config.url + '&rnd=' + rnd) : (config.url + '?rnd=' + rnd),
            args = Array.prototype.slice.call(arguments).slice(1),
            callback = config.callback || function () {
                    layer.msg('未找到回调函数！');
                },
            shade = (typeof config.shade == 'boolean') ? config.shade : true;
        if (shade) {
            layerId = layer.load(1, {shade: [0.3, '#000']});
        }
        ;
        $.ajax({
            url: path + currUrl,
            type: config.type || 'get',
            async: (typeof config.async == 'boolean') ? config.async : true,//异步-同步
            data: {'json': $.toJSON(config.postParam || {})},
            dataType: 'json',
            timeout: (config.timeout || 120) * 1000,
            success: function (data) {
                args.unshift(data);
                callback.apply(this, args);
            },
            error: function (xhr, message, e) {
                var status = xhr.status;
                if (status == '503') {
                    window.location.reload();
                } else if (status == '500') {
                    layer.msg('该模块服务异常！', {icon: 5});
                } else {
                    layer.msg('系统异常！', {icon: 7});
                }
            },
            complete: function (XHR, TS) {
                if (shade) {
                    layer.close(layerId);
                }
            }
        })
    },
    getFormVal: function (opStr, isopt, multiSplFlag) {
        var pMap = {};
        $(opStr + ' input,' + opStr + ' select,' + opStr + ' textarea').each(function () {
            var val = $(this).val(), type = $(this)[0].type, ischecked = $(this)[0].checked, tagName = $(this)[0].tagName;
            val = val + '';
            if ((val || isopt) && (type == 'text' || type == 'hidden' || ((type == 'radio' || type == 'checkbox') && ischecked)) || tagName == 'SELECT' || tagName == 'TEXTAREA') {
                var key = $(this).attr('name') ? $(this).attr('name') : $(this).attr('field');
                if (key && (val || isopt)) {
                    if (val instanceof Array) {
                        val = val.join(",");
                    }
                    if (pMap[key]) {
                        pMap[key] = pMap[key] + (multiSplFlag || ',') + val;
                    } else {
                        pMap[key] = val;
                    }
                }
            }
        })
        return pMap;
    },
    setFormVal: function (opStr, valMap) {
        if (!valMap) {
            valMap = $('[name="json"]').val() || '';
        }
        if (valMap instanceof jQuery) {
            valMap = valMap.val() || '';
        }
        if (typeof valMap === 'string') {
            if (valMap.trim().length <= 0) {
                return;
            }
            valMap = $.parseJSON(valMap);
        }
        $(opStr + ' input,' + opStr + ' select,' + opStr + ' textarea').each(function () {
            var type = $(this).attr('type'),
                val = $(this).val(),
                tagName = $(this)[0].tagName,
                name = $(this).attr('name');
            if (type == 'radio') {
                if (val == valMap[name]) {
                    $(this).attr("checked", "checked");
                }
            } else if (type == 'checkbox') {
                if (val == valMap[name]) {
                    $(this).attr("checked", "checked");
                } else {
                    if (valMap[name] * 1) {
                        $(this).prop("checked", true).attr('show', '1');
                    } else {
                        $(this).prop("checked", false).attr('show', '0');
                    }
                }
            } else {
                if (valMap[name]) {
                    $(this).val(valMap[name]);
                }
            }
            if (tagName == 'SELECT') {
                $(this).attr('value', valMap[name])
            }
        })
    },
    showTerm: function (opStr, showId) {
        var process = function () {
            var name = $(this).attr('name'),
                title = $(this).attr('title'),
                nameSplit = name.split('~'),
                value = $(this).val();
            if ($(this)[0].tagName == 'SELECT') {
                if (!$(this).find(':checked').val()) {
                    $('[st="' + nameSplit[0] + '"]').html('');
                    return;
                }
                ;
                value = $(this).find(':checked').text();
            }
            if (!value) {
                $('[st="' + nameSplit[0] + '"]').html('');
                return;
            }
            var con = title + '：<span class="showTermText">' + value + '</span>';
            if (nameSplit.length == 2) {
                switch (nameSplit[1] * 1) {
                    case 2:
                        con = title + '：<span class="showTermText">' + value + ' 至  ' + ($('[name="' + nameSplit[0] + '~3"]').val() || '*') + '</span>';
                        break;
                    case 3:
                        con = title + '：<span class="showTermText">' + ($('[name="' + nameSplit[0] + '~2"]').val() || '*') + ' 至 ' + value + '</span>';
                        break;
                    case 8:
                        value = $('[name="' + nameSplit[0] + '~88"]').val();
                        if (!value)return;
                        con = $(this).find(':checked').text() + '：<span class="showTermText">' + value + '</span>';
                        break;
                    case 88:
                        con = $('[name="' + nameSplit[0] + '~8"]').find(':checked').text() + '：<span class="showTermText">' + value + '</span>';
                        break;
                }
            }
            $('[st="' + nameSplit[0] + '"]').html(con + '&nbsp;&nbsp;');
        };
        var $obj = $(opStr + ' input,' + opStr + ' select,' + opStr + ' textarea');
        var html = {}, htmlStr = '';
        $obj.each(function () {
            var nameSplit = ($(this).attr('name') || '').split('~');
            html[nameSplit[0]] = '<span st="' + nameSplit[0] + '"></span>';
        });
        for (var key in html) {
            htmlStr += html[key];
        }
        $(showId).html('<strong>查询条件：</strong>' + htmlStr);
        $(opStr + ' input,' + opStr + ' textarea').keyup('change', process);
        $(opStr + ' select').bind('change', process);
        $(opStr + ' .datetime,' + opStr + ' .date,' + opStr + ' .time').bind('blur', process);
        $obj.each(function () {
            process.apply(this);
        });
    },
    openDialog: function (config) {
        var args = Array.prototype.slice.call(arguments).slice(1),
            callback = config.callback || function () {
                    layer.msg('未找到回调函数！');
                },
            cancelCallback = config.cancelCallback || function () {
                },
            dom = config.dom,
            html = config.html;
        if (dom && !appUtils.cache.dialog[dom]) {
            if (html) {
                appUtils.cache.dialog[dom] = html;
            } else {
                appUtils.cache.dialog[dom] = $(dom).html();
                $(dom).html('');
            }
        }
        layer.open({
            type: 1,
            title: config.title || '',
            area: [config.width || '350px', config.height || '350px'],
            border: [1], // 去掉默认边框
            shade: [0.5, '#000'], // 去掉遮罩
            offset: [config.offsetX || '150px', ''],
            content: appUtils.cache['dialog'][dom],
            success: function (layero, index) {
                args.unshift(index);
                callback.apply(this, args);
            },
            cancel: function (index) {
                args.unshift(index);
                cancelCallback.apply(this, args);
            }
        });
    },
    closeDialog: function (index) {
        if (index) {
            layer.close(index);
        } else {
            layer.closeAll('page');
        }
    },
    filterSelect: function (text, domId) {
        if (!appUtils.cache.filter[domId]) {
            appUtils.cache.filter[domId] = $(domId + ' option');
        }
        $(domId).html('');
        appUtils.cache.filter[domId].each(function () {
            if (text) {
                if ($(this).text().indexOf(text) != -1) {
                    $(domId).append($(this));
                }
            } else {
                $(domId).append($(this));
            }
        });
    },
    setCookie: function (key, value, expiredays) {
        var exdate = new Date(), key = key || '', value = value || '', expiredays = expiredays || 1;
        exdate.setDate(exdate.getDate() + expiredays);
        document.cookie = key.trim() + '=' + value.trim() + ';path=/' + ';expires='
            + exdate.toGMTString();
    },
    getCookie: function (key) {
        document.cookie = 'path=/;';
        var cookieArr = document.cookie.split(';');
        for (var i = 0, len = cookieArr.length, cI; i < len, cI = cookieArr[i]; i++) {
            var cArr = cI.split('='), cKey = cArr[0] || '', cValue = cArr[1];
            if (cKey.trim() === key.trim()) {
                return cValue;
            }
        }
        return null;
    },
    makeHandlerEx: function (fnString) {
        if (!fnString)
            return '';
        if (typeof hString === 'function') {
            return hString;
        }
        var hArr = fnString.split('.'), handlerStr = hArr.pop(), nsString = hArr
            .join('.'), nameSpace = appUtils.nameSpace(nsString);
        return nameSpace[handlerStr];

    },
    nameSpace: function (ns) {
        var nsContext = window, nsArr = ns ? ns.split(',') : [], len = nsArr.length, i = 0, nI;
        for (; i < len; i++) {
            nI = nsArr[i];
            if (!nsContext[nI]) {
                nsContext[nI] = {};
            }
            nsContext = nsContext[nI];
        }
        return nsContext;
    },
    copyData: function (obj, text) {
        $(obj).zclip({
            path: path + "/lib/ZeroClipboard.swf",
            copy: function () {
                return text;
            },
            afterCopy: function () {/* 复制成功后的操作 */
                layer.msg('复制成功！');
            }
        });
    },
};


var nameReg = /^[a-zA-Z0-9_\[\]#='"]{1,30}$/;
var appInit = {
    init: function (id) {
        id = id ? id + ' ' : id;
        appInit.initDatePicker(id);
        appInit.initSwitchShowOrHide(id);
        appInit.initCloseClick(id);
        appInit.initDialog(id);
        appInit.initCheckOn(id);
        appInit.initMouseShowOrHide(id);
        appInit.initSingleShow(id);
        appInit.initCopyData(id);
    },
    initCopyData: function () {
        if ($('[flag="copyData"]') && $('[flag="copyData"]').length > 0) {
            $('[flag="copyData"]').zclip({
                path: path + "/lib/ZeroClipboard.swf",
                copy: function () {
                    return $(this).attr('text');
                },
                afterCopy: function () {/* 复制成功后的操作 */
                    layer.msg('复制成功！');
                }
            });
        }
    },
    initDatePicker: function (id) {// 初始化时间控件 只需要将class="date或datetime"
        id = id || '';
        $(id + '.datetime').unbind('click').bind('click', function () {
            WdatePicker({
                'dateFmt': 'yyyy-MM-dd HH:mm'
            });
        });
        $('.date').unbind('click').bind('click', function () {
            WdatePicker({
                'dateFmt': 'yyyy-MM-dd'
            });
        })
        $('.time').unbind('click').bind('click', function () {
            WdatePicker({
                'dateFmt': 'HH:mm'
            });
        })
    },
    initSwitchShowOrHide: function (id) {// 隐藏展开 params 展开，隐藏，详细，对象
        id = id || '';
        $(id + '[flag="switchShowOrHide"]').unbind('click').bind('click', function () {
            var params = $(this).attr('params'),
                show = $(this).attr('show'),
                type = $(this).attr('type'),
                paramArray = params.split(','),
                status = 0;
            if (show) {
                if (type == "checkbox" || type == "radio") {
                    $(this).attr('checked', false);
                } else {
                    $(this).text(paramArray[0] + paramArray[2]);
                }
                for (var i = 3; i < paramArray.length; i++) {
                    var val = paramArray[i];
                    if (nameReg.test(val)) {
                        $(id + val).hide();
                    }
                }
                $(this).removeAttr('show', '0');
                $(this).val('0');
                if ($(this).attr('id')) {
                    appUtils.setCookie($(this).attr('id'), '0');
                }
            } else {
                if (type == "checkbox" || type == "radio") {
                    $(this).attr('checked', true);
                } else {
                    $(this).text(paramArray[1] + paramArray[2]);
                }
                for (var i = 3; i < paramArray.length; i++) {
                    var val = paramArray[i];
                    if (nameReg.test(val)) {
                        $(id + val).show();
                    }
                }
                appInit.initCopyData();//绑定复制
                $(this).attr('show', '1');
                $(this).val('1');
                if ($(this).attr('id')) {
                    appUtils.setCookie($(this).attr('id'), '1');
                }
                status = 1;
            }
            if ($(this).attr('callback')) {
                appUtils.makeHandlerEx($(this).attr('callback'))(this, type, status);// 执行字符串的函数 并将当前checkbox对象作为参数 传过去
            }
        }).each(
            function () {
                var params = $(this).attr('params') || '', show = $(this).attr(
                        'show') * 1, type = $(this).attr('type'), paramArray = params
                    .split(',');
                if ($(this).attr('id')) {
                    var _show = appUtils.getCookie($(this).attr('id'));
                    if (_show) {
                        show = parseInt(_show);
                    }
                }
                if (!show) {
                    if (type == "checkbox" || type == "radio") {
                        $(this).attr('checked', false);
                    } else {
                        $(this).text(paramArray[0] + paramArray[2]);
                    }
                    for (var i = 3; i < paramArray.length; i++) {
                        var val = paramArray[i];
                        if (nameReg.test(val)) {
                            $(id + val).hide();
                        }
                    }
                    $(this).removeAttr('show', '0');
                } else {
                    if (type == "checkbox" || type == "radio") {
                        $(this).attr('checked', true);
                    } else {
                        $(this).text(paramArray[1] + paramArray[2]);
                    }
                    for (var i = 3; i < paramArray.length; i++) {
                        var val = paramArray[i];
                        if (nameReg.test(val)) {
                            $(id + val).show();
                        }
                    }
                    $(this).attr('show', '1');
                }
            });
    },
    initCloseClick: function (id) {// 关闭事件 params 不限个数 要隐藏的对象
        id = id || '';
        $(id + ' [flag="close"]').unbind('click').bind(
            'click',
            function () {
                var params = $(this).attr('params') || '', paramArray = params
                    .split(',');
                if (params) {
                    for (var key in paramArray) {
                        var val = paramArray[key];
                        if (nameReg.test(val)) {
                            $(id + val).hide();
                        }
                    }
                } else {
                    $(this).parent().hide();
                }
                if ($(this).attr('callback')) {
                    appUtils.makeHandlerEx($(this).attr('callback'))($(this), 1, 0);// 执行字符串的函数
                                                                                    // 并将当前checkbox对象作为参数
                                                                                    // 传过去
                }
            });
    },
    initCheckOn: function (id) {// 初始化选中 params 参数 checkbox：1.类型 2.对象 3.要高亮的对象
        id = id || '';
        $(id + '[flag="checkOn"]').unbind('click').bind('click', function () {
            var params = $(this).attr('params') || '',
                paramArray = params.split(','),
                opt = paramArray[0] * 1,
                $obj = $(id + paramArray[1]),
                $glObj = $(id + paramArray[2]),
                status = 0;
            switch (opt) {
                case 0:// checkbox全选/全不选
                    if ($(this).prop("checked")) {
                        $obj.prop('checked', true).prop('checkOn', '1');
                        $glObj.addClass('on');
                        status = 1;
                    } else {
                        $obj.prop('checked', false).prop('checkOn', '0');
                        $glObj.removeClass('on');
                    }
                    break;
                case 1:// checkbox全选
                    $obj.each(function () {
                        if (!$(this).attr('disabled')) {
                            $(this).prop('checkOn', '1').prop('checked', true);
                        }
                    });
                    $glObj.addClass('on');
                    status = 1;
                    break;
                case 2:// checkbox反选
                    $obj.each(function () {
                        if (!$(this).attr('disabled')) {
                            if ($(this).prop("checked")) {
                                $(this).prop("checked", false).prop('checkOn', '0');
                                $(id + '[gl="' + $(this).attr('glid') + '"]').removeClass('on');
                            } else {
                                $(this).prop("checked", true).prop('checkOn', '1');
                                $(id + '[gl="' + $(this).attr('glid') + '"]').addClass('on');
                                status = 1;
                            }
                        }
                    });
                    break;
                case 3:// checkbox全不选
                    $obj.prop('checked', false).prop('checkOn', '0');
                    $glObj.removeClass('on');
                    break;
                case 4:// checkbox单选
                    if ($(this).prop("checked")) {
                        $(this).prop("checked", true).prop('checkOn', '1');
                        $glObj.addClass('on');
                        status = 1;
                    } else {
                        $(this).prop("checked", false).prop('checkOn', '0');
                        $glObj.removeClass('on');
                    }
                    break;
                case 5:// 元素全选/全不选
                    if (Boolean($(this).prop('checkOn') * 1)) {
                        $obj.removeClass('on').prop('checkOn', '0');
                        $(this).removeClass('on').prop('checkOn', '0');
                        $glObj.removeClass('on1');
                    } else {
                        $obj.addClass('on').prop('checkOn', '1');
                        $(this).addClass('on').prop('checkOn', '1');
                        $glObj.addClass('on1');
                        status = 1;
                    }
                    ;
                    break;
                case 6:// 元素全选
                    $obj.addClass('on').prop('checkOn', '1');
                    $glObj.addClass('on1');
                    status = 1;
                    break;
                case 7:// 元素反选
                    $obj.each(function () {
                        if (Boolean($(this).prop('checkOn') * 1)) {
                            $(this).removeClass('on').prop('checkOn', '0');
                            $(id + '[gl="' + $(this).attr('glid') + '"]').removeClass(
                                'on1');
                        } else {
                            $(this).addClass('on').prop('checkOn', '1');
                            $(id + '[gl="' + $(this).attr('glid') + '"]').addClass(
                                'on1');
                            status = 1;
                        }
                    });
                    break;
                case 8:// 元素全不选
                    $obj.removeClass('on').prop('checkOn', '0');
                    $glObj.removeClass('on1');
                    break;
                case 9:// 元素单选
                    if (Boolean($(this).prop('checkOn') * 1 || $(this).hasClass('on'))) {
                        $(this).removeClass('on').prop('checkOn', '0');
                        $glObj.removeClass('on1');
                    } else {
                        $(this).addClass('on').prop('checkOn', '1');
                        $glObj.addClass('on1');
                        status = 1;
                    }
                    break;
            }
            if ($(this).attr('callback')) {
                appUtils.makeHandlerEx($(this).attr('callback'))($(this), opt, status);// 执行字符串的函数 并将当前checkbox对象作为参数 传过去
            }
        });
    },
    initMouseShowOrHide: function (id) {
        id = id || '';
        $(id + '[flag="mouseShowOrHide"]').unbind('click').bind('click', function () {
            var params = $(this).attr('params') || '',
                paramArray = params.split(','), $obj = $(id + paramArray[0]);
            if ($(this).prop('checked')) {
                $obj.unbind('mouseover').bind('mouseover', function () {
                    for (var i = 1; i < paramArray.length; i++) {
                        $(id + paramArray[i]).show();
                    }
                });
                $obj.unbind('mouseout').bind('mouseout', function () {
                    for (var i = 1; i < paramArray.length; i++) {
                        $(id + paramArray[i]).hide();
                    }
                })
                $obj.addClass('on2');
            } else {
                $obj.unbind('mouseover');
                $obj.unbind('mouseout');
                for (var i = 1; i < paramArray.length; i++) {
                    $(id + paramArray[i]).hide();
                }
                $obj.removeClass('on2');
            }
            if ($(this).attr('callback')) {
                appUtils.makeHandlerEx($(this).attr('callback'))($(this));
            }
        })
    },
    initSingleShow: function (id) {// 只显示一个 params 要显示的对象 可多个
        id = id || '';
        $(id + '[flag="singleShow"]').unbind('click').bind('click', function () {
            var name = $(this).attr('name'),
                params = $(this).attr('params') || '', paramArray = params.split(',');
            $(id + '[name="' + name + '"]').each(function () {
                var params1 = $(this).attr('params') || '',
                    paramArray1 = params1.split(',');
                for (var key in paramArray1) {
                    $(id + paramArray1[key]).hide();
                }
            }).removeClass('on');
            for (var key in paramArray) {
                $(id + paramArray[key]).show();
            }
            $(this).addClass('on');
            if ($(this).attr('callback')) {
                appUtils.makeHandlerEx($(this).attr('callback'))($(this), 1, $(this).val());
            }
        }).each(function () {
            var type = $(this).attr('type');
            if (type == 'radio' && $(this).prop('checked')) {
                var name = $(this).attr('name'),
                    params = $(this).attr('params') || '',
                    paramArray = params.split(',');
                $(id + '[name="' + name + '"]').each(
                    function () {
                        var params1 = $(this).attr('params') || '',
                            paramArray1 = params1.split(',');
                        for (var key in paramArray1) {
                            $(id + paramArray1[key]).hide();
                        }
                    }).removeClass('on');
                for (var key in paramArray) {
                    $(id + paramArray[key]).show();
                }
                $(this).addClass('on');
            }
        });
    },
    initDialog: function (id) {// 初始化dialog
        id = id || '';
        $(id + '[flag="dialog"]').unbind('click').bind(
            'click',
            function () {
                var params = $(this).attr('params') || '', paramArray = params
                    .split(','), callback = $(this).attr('callback'), $obj = $(this);
                if (!appUtils.cache['dialog'][paramArray[1]]) {
                    appUtils.cache['dialog'][paramArray[1]] = $(paramArray[1]).html();
                    $(paramArray[1]).html('');
                }
                if (params) {
                    layer.open({
                        type: 1,
                        title: paramArray[0],
                        area: [paramArray[2] + 'px' || '650px',
                            paramArray[3] + 'px' || '450px'],
                        border: [1], // 去掉默认边框
                        shade: [0.5, '#000'], // 去掉遮罩
                        offset: ['150px', ''],
                        content: appUtils.cache['dialog'][paramArray[1]],
                        success: function (layero, index) {
                            if (callback) {
                                appUtils.makeHandlerEx(callback)($obj, layero, index);// 执行字符串的函数
                            }
                        }
                    });
                }
            });
    },

};
