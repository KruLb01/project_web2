<?php session_start() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HKP Store - View info customer</title>
        <LINK REL="SHORTCUT ICON" HREF="../static/img/logo/favicon.ico">
        <script src="../static/js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../static/css/style.css">
        <link rel="stylesheet" href="../static/css/all.css">
    </head>
    <body>
        <?php
            include('header.php');
        ?>
        <div class="view-info-cus">
        <span id='view-info-cus-title'>Edit Password</span>
            <form id="check-pass">
               <span>Mật khẩu cũ : <input type="password" name="old-pass" placeholder="****"></span>
               <span class="error"></span>
               <span>Mật khẩu mới : <input type="password" name="new-pass" placeholder="***"></span>
               <span class="error"></span>
               <span>Nhập lại mật khẩu mới : <input type="password" name="new-pass-again" placeholder="***"></span> 
               <span class="error"></span>
               <button id='submit-btn'>Submit</button>
            </form>
        </div>
    </body>
    </html>

    <script>
        $('#submit-btn').click(function(e){
            e.preventDefault();
            var mk_cu = document.getElementsByName('old-pass')[0].value;
            var mk_moi = document.getElementsByName('new-pass')[0].value;
            var mk_moi_again = document.getElementsByName('new-pass-again')[0].value;

            var check = true;

            if(mk_cu == '' || mk_moi == '' || mk_moi_again == '') {
                check = false;
                document.getElementsByClassName('error')[0].innerHTML = 'Lỗi cmnr';
                document.getElementsByClassName('error')[0].style = 'display:block';
            }

            if(check == true && mk_moi.length < 10 ){
                check = false;
                document.getElementsByClassName('error')[1].innerHTML = 'Mật khẩu mới hợp lệ';
                document.getElementsByClassName('error')[1].style = 'display:block';
            }else{
                check == true;
                document.getElementsByClassName('error')[1].style = 'display:none';
            }

            if(check == true && mk_moi != mk_moi_again ){
                check = false;
                document.getElementsByClassName('error')[2].innerHTML = 'Nhập lại ngu';
                document.getElementsByClassName('error')[2].style = 'display:block';
            }else{
                check == true;
                document.getElementsByClassName('error')[2].style = 'display:none';
            }
            
            if(check == true ){
               $.post('xuly_luu.php',$('#check-pass').serialize(),function(kq){
                   if(kq.trim()=='true'){
                       alert('Sửa thành công!!!')
                   }else{
                       alert('Thất bại rồi , fix lại thôi!!!')
                   }
                
                    })
                }


        })
    </script>