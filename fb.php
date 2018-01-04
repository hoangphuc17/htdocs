
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <script>

        // [1] Load lên các thành phần cần thiết
        window.fbAsyncInit = function () {
            FB.init({
                appId: '1911548452494906',
                cookie: true,
                xfbml: true,
                version: 'v2.8'
            });
            // Kiểm tra trạng thái hiện tại
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });

        };

        // [2] Xử lý trạng thái đăng nhập
        function statusChangeCallback(response) {
            // Người dùng đã đăng nhập FB và đã đăng nhập vào ứng dụng
            if (response.status === 'connected') {
                ShowWelcome();
            }
            // Người dùng đã đăng nhập FB nhưng chưa đăng nhập ứng dụng
            else if (response.status === 'not_authorized') {
                ShowLoginButton();
            }
            // Người dùng chưa đăng nhập FB
            else {
                ShowLoginButton();
            }
        }

        // [3] Yêu cầu đăng nhập FB
        function RequestLoginFB() {
            window.location = 'http://graph.facebook.com/oauth/authorize?client_id=1911548452494906&scope=public_profile,email,user_likes&redirect_uri=http://webcuatoi.com';
        }

        // [4] Hiển thị nút đăng nhập
        function ShowLoginButton() {
            document.getElementById('btb').setAttribute('style', 'display:block');
            document.getElementById('lbl').setAttribute('style', 'display:none');
        }

        // [5] Chào mừng người dùng đã đăng nhập
        function ShowWelcome() {
            document.getElementById('btb').setAttribute('style', 'display:none');            
            FB.api('/me', function (response) {
                var name = response.name;
                var username = response.username;
                var id = response.id;
                document.getElementById('lbl').innerHTML = 'Tên=' + name + ' | username=' + username + ' | id=' + id;
                document.getElementById('lbl').setAttribute('style', 'display:block');
            });
        }

    </script>
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1911548452494906";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>



    <!-- NÚT ĐĂNG NHẬP -->
    <input id="btb" type="button" value="ĐĂNG NHẬP" onclick="RequestLoginFB()" style="display:none" />
    <p id="lbl" style="display:none">BẠN ĐÃ ĐĂNG NHẬP THÀNH CÔNG!</p>
    <br />

    <!-- HIỂN THỊ NÚT LUIKE -->
    <div class="fb-like" data-href="http://webcuatoi.com" data-layout="box_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
    <br />
    <!-- HIỂN THỊ PAGE -->
    <div class="fb-page" data-href="https://www.facebook.com/thuvienlaptrinh" data-tabs="timeline" data-width="300" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thuvienlaptrinh" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thuvienlaptrinh">Thư Viện Lập Trình</a></blockquote></div>
    <br />
    <!-- COMMENT -->
    <div class="fb-comments" data-href="http://webcuatoi.com" data-numposts="10"></div>

</body>
</html>