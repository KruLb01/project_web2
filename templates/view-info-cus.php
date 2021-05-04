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
            <span id='view-info-cus-title'>View information</span>
            <form id="check-form">
                <span>Họ tên: <input type="text" name='username'
                value="<?php echo $_SESSION['customer']['ho_ten'] ?>"></span>
                <span class="error"></span>
                <span>Email: <input type="text" name='email' value="<?php echo $_SESSION['customer']['email']?>"></span>
                <span class="error"></span>
                <span>Phone: <input type="text" name='phone' value="<?php echo $_SESSION['customer']['sdt'] ?>" ></span>
                <span class="error"></span>
                <span>Address: <input type="text" name='address' value="<?php echo $_SESSION['customer']['dia_chi'] ?>" ></span>
                <span class="error"></span>
                <span>Other information: <input type="text" name='other' value="<?php echo $_SESSION['customer']['thongtin_khac'] ?>" ></span>
                <button id='submit-btn'>Submit</button>
            </form>
        </div>
    </body>
    </html>

    <script>    
        $('#submit-btn').click(function(e){
            e.preventDefault();

            var hoten_moi = document.getElementsByName('username')[0].value;
            var email_moi = document.getElementsByName('email')[0].value;
            var phone_moi = document.getElementsByName('phone')[0].value;
            var address_moi = document.getElementsByName('address')[0].value;
            var other_moi = document.getElementsByName('other')[0].value;

            var check = true;

            if(hoten_moi == '' || email_moi == '' || phone_moi == '' || address_moi == '' || other_moi == '' ) {
                check = false;
                document.getElementsByClassName('error')[0].innerHTML = 'Lỗi ';
                document.getElementsByClassName('error')[0].style = 'display:block';
            }

            if(check == true && /\d/g.test(hoten_moi)){
                check = false;
                document.getElementsByClassName('error')[0].innerHTML = 'Tên không hợp lệ';
                document.getElementsByClassName('error')[0].style = 'display:block';
            }else{
                check == true;
                document.getElementsByClassName('error')[0].style = 'display:none';
            }

            if(check == true && /^\w+@[a-zA-Z]+(.[a-zA-Z]+)+/g.test(email_moi) == false){
                check = false;
                document.getElementsByClassName('error')[1].innerHTML = 'Email không hợp lệ';
                document.getElementsByClassName('error')[1].style = 'display:block';
            }else{
                check == true;
                document.getElementsByClassName('error')[1].style = 'display:none';
            }
            
            if(check == true && /^\d{10}$/g.test(phone_moi) == false){
                check = false;
                document.getElementsByClassName('error')[2].innerHTML = 'Số điện thoại không hợp lệ';
                document.getElementsByClassName('error')[2].style = 'display:block';
            }else{
                check == true;
                document.getElementsByClassName('error')[2].style = 'display:none';
            }

            if(check == true && address_moi.length < 10 ){
                check = false;
                document.getElementsByClassName('error')[3].innerHTML = 'Địa chỉ không hợp lệ';
                document.getElementsByClassName('error')[3].style = 'display:block';
            }
            else{
                check == true;
                document.getElementsByClassName('error')[3].style = 'display:none'; 
            }

            if(check == true ){
               $.get('xuly_luu.php',$('#check-form').serialize(),function(kq){
                   if(kq.trim()=='true'){
                       alert('Sửa thành công!!!')
                   }else{
                       alert('Thất bại rồi , fix lại thôi!!!')
                   }
                
                    })
                }
            })

    </script>
