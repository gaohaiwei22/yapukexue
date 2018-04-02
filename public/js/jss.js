 <script>
        var return_url = 'https://www.cnblogs.com/';
        var ajax_url = '/user' + '/signin';
        var enable_captcha = false;
        var is_in_progress = false;

        function setFocus() {
            document.getElementById('input1').focus();
        }

        function check_enter(event) {
            if (event.keyCode == 13) {
                var target = event.target || event.srcElement;
                if (target.id == "input1") {
                    if (document.getElementById('input1').value == '') {
                        $('#tip_input1').html("请输入登录用户名");
                        return;
                    }
                    else if (document.getElementById('input2').value == '') {
                        document.getElementById("input2").focus();
                        return;
                    }
                }
                if (target.id == "input2") {
                    if (document.getElementById('input2').value == '') {
                        $('#tip_input2').html("请输入密码");
                        return;
                    }
                }
                signin_go();
            }
        }

        function signin_go() {
            if(is_in_progress){
                return;
            }

            $('#tip_input1').html('');
            $('#tip_input2').html('');

            var input1 = $.trim($('#input1').val());
            if (!input1) {
                $('#tip_input1').html("请输入登录用户名");
                $('#input1').focus();
                return;
            }
            var input2 = $.trim($('#input2').val());
            if (!input2) {
                $('#tip_input2').html("请输入密码");
                $('#input2').focus();
                return;
            }

            if(enable_captcha)
            {
                var captchaCode = $.trim($('#captcha_code_input').val());
                if (!captchaCode)
                {
                    $('#tip_captcha_code_input').html("请输入验证码");
                    $('#captcha_code_input').focus();
                    return;
                }
            }

            $('#tip_btn').html('提交中...');

            var encrypt = new JSEncrypt();
            encrypt.setPublicKey('MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCp0wHYbg/NOPO3nzMD3dndwS0MccuMeXCHgVlGOoYyFwLdS24Im2e7YyhB0wrUsyYf0/nhzCzBK8ZC9eCWqd0aHbdgOQT6CuFQBMjbyGYvlVYU2ZP7kG9Ft6YV6oc9ambuO7nPZh+bvXH0zDKfi02prknrScAKC0XhadTHT3Al0QIDAQAB');
            var encrypted_input1 = encrypt.encrypt($('#input1').val());
            var encrypted_input2 = encrypt.encrypt($('#input2').val());
            var ajax_data = {
                input1: encrypted_input1,
                input2: encrypted_input2,
                remember: $('#remember_me').prop('checked')
            };

            if(enable_captcha){
                var captchaObj = $("#captcha_code_input").get(0).Captcha;
                ajax_data.captchaId = captchaObj.Id;
                ajax_data.captchaInstanceId = captchaObj.InstanceId;
                ajax_data.captchaUserInput = $("#captcha_code_input").val();
            }
            is_in_progress = true;
            $.ajax({
                url: ajax_url,
                type: 'post',
                data: JSON.stringify(ajax_data),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                headers: {
                    'VerificationToken': 'juNvgxjCRczHJVDZde5ETMD6QRBGStsixZ-sPxLLJKwRclOAgNglmfnQs0F4czd68L20vpB9FhDIUz5qnHty-F28G441:FaV_wr6NSMDWmkgd15kVGqe-iXMW1ZSiYAa-5YvIPTR0zexXrSIFUXKIhWMo1Ywf_aGW6Q2Ma8Mbd2kqrn440Q4xP2k1'
                },
                success: function (data) {                    
                    if (data.success) {
                        $('#tip_btn').html('登录成功，正在重定向...');
                        location.href = return_url;
                    } else {
                        $('#tip_btn').html(data.message + "<br/><br/>联系 contact@cnblogs.com");
                        is_in_progress = false;
                        if(enable_captcha)
                        {
                            captchaObj.ReloadImage();
                        }
                    }
                },
                error: function (xhr) {
                    is_in_progress = false;
                    $('#tip_btn').html('抱歉！出错！联系 contact@cnblogs.com');
                }
            });
        }

        $(function () {
            $('#signin').bind('click', function () {
                signin_go();
            }).val('登 录');

        });
    </script>