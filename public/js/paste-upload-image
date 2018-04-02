(function ($) {
    var $this;
    var $host;
    var $ajaxUrl = location.protocol + '//upload.cnblogs.com/imageuploader/CorsUpload';    

    $.fn.pasteUploadImage = function (host) {
        $this = $(this);
        $host = host;
        $this.on('paste', function (event) {
            var filename, image, pasteEvent, text;
            pasteEvent = event.originalEvent;
            if (pasteEvent.clipboardData && pasteEvent.clipboardData.items) {
                image = isImage(pasteEvent);
                if (image) {                   
                    filename = getFilename(pasteEvent) || generateFilename();
                    text = "{{" + filename + "(uploading...)}}";
                    pasteText(text);
                    var file = image.getAsFile();
                    event.preventDefault();
                    return uploadFile(file, filename, 'Paste');
                }
            }
        });
        $this.on('drop', function (event) {
            var filename, image, pasteEvent, text;
            pasteEvent = event.originalEvent;
            if (pasteEvent.dataTransfer && pasteEvent.dataTransfer.files) {
                image = isImageForDrop(pasteEvent);
                if (image) {
                    event.preventDefault();
                    filename = pasteEvent.dataTransfer.files[0].name || generateFilename();
                    text = "{{" + filename + "(uploading...)}}";
                    pasteText(text);
                    return uploadFile(image, filename, 'Drop');
                }
            }
        });
    };

    pasteText = function (text) {
        var afterSelection, beforeSelection, caretEnd, caretStart, textEnd;
        caretStart = $this[0].selectionStart;
        caretEnd = $this[0].selectionEnd;
        textEnd = $this.val().length;
        beforeSelection = $this.val().substring(0, caretStart);
        afterSelection = $this.val().substring(caretEnd, textEnd);
        $this.val(beforeSelection + text + afterSelection);
        $this.get(0).setSelectionRange(caretStart + text.length, caretEnd + text.length);
        return $this.trigger("input");
    };
    isImage = function (data) {
        var i, item;
        i = 0;
        while (i < data.clipboardData.items.length) {
            item = data.clipboardData.items[i];
            if (item.type.indexOf("image") !== -1) {
                return item;
            }
            i++;
        }
        return false;
    };
    isImageForDrop = function (data) {
        var i, item;
        i = 0;
        while (i < data.dataTransfer.files.length) {
            item = data.dataTransfer.files[i];
            if (item.type.indexOf("image") !== -1) {
                return item;
            }
            i++;
        }
        return false;
    };
    getFilename = function (e) {
        var value;
        if (window.clipboardData && window.clipboardData.getData) {
            value = window.clipboardData.getData("Text");
        } else if (e.clipboardData && e.clipboardData.getData) {
            value = e.clipboardData.getData("text/plain");
        }
        value = value.split("\r");
        return value[0];
    };    
    uploadFile = function (file, filename, uploadType) {
        var formData = new FormData();
        formData.append('imageFile', file);
        formData.append("host", $host);
        formData.append("uploadType", uploadType);

        $.ajax({
            url: $ajaxUrl,
            data: formData,
            type: 'post',
            timeout: 300000,
            processData: false,
            contentType: false,
            dataType: 'json',
            xhrFields: {
                withCredentials: true
            },
            success: function (data) {
                if (data.success) {
                    return insertToTextArea(filename, data.message);
                }
                replaceLoadingTest(filename);
                alert("上传失败! " + data.message)
            },
            error: function (xOptions, textStatus) {
                replaceLoadingTest(filename);
                alert("上传失败! " + xOptions.responseText);
            }
        });
    };
    insertToTextArea = function (filename, url) {
        return $this.val(function (index, val) {
            return val.replace("{{" + filename + "(uploading...)}}", "![](" + url + ")" + "\n");
        });
    };
    replaceLoadingTest = function (filename) {
        return $this.val(function (index, val) {
            return val.replace("{{" + filename + "(uploading...)}}", filename + "\n");
        });
    };
    generateFilename = function () {
        return 'uploading-image-' + Math.floor(Math.random() * 1000000) + '.png';
    };
})(jQuery);