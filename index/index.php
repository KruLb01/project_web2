<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Cổng Thông Tin Đào Tạo Trường Đại Học Sài Gòn</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            a{
                text-decoration: none;
                color:black;
            }
            a:hover{
                text-decoration: orange;
                color:orange;
            }
            marquee{
                border:1px solid black;
                padding:10px;
                color:red;
                margin-top:5px;
            }
            .header{
                width:100%;
                height: 140px;
            }
            .container{
                padding:0 5% 0 5%;
            }
            .header .text-onbanner{
                width:100%;
                height:100%;
            }
            .text-onbanner img{
                height:100%;
            }
            .mid-left{
                width:20%;
                margin-right:10px;
            }
            .mid-content{
                width: 80%;
            }
            .mid{
                margin:5px 0 10px 0;
                display:flex;
            }
            ul{
                padding-left:0;
                text-align: center;
            }
            ul li{
                padding-top:5px;
                list-style: none;
                border:1px dashed black;
            }
            .footer{
                text-align: center;
                background:lightgray;
                width:100%;
                height: 150px;
            }
            .text-onbanner{
                position: relative;
                text-align: center;
            }
            .header img{
                width:100%;
            }
            .bottom-right {
                position: absolute;
                bottom: 8px;
                right: 16px;
            }
            #ID_error_message{
                color:red;
                font-size:16px;
                font-weight: bold;
            }
            @media screen and (max-width: 768px)
            {
                .container{
                    padding:0;
                }
                .mid{
                    flex-direction: column;
                }
                .mid-left{
                    width:100%;
                }
                .mid-content{
                    width:100%;
                }
                ul li{
                    display:inline-block;
                    font-size:11px;
                }
            }
            @media screen and (max-width: 240px)
            {
                .footer{
                    height:auto;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="main">
                <div class="header">
                    <div class="text-onbanner">
                        <img src="Images/Banner_Header.png"/>
                        <div class="bottom-right">
                            <?php
                                session_start();
                                if(isset($_SESSION["user"]))
                                {
                                    echo '<span style="color:red;font-weight:bold;font-size:18px" href="index.php?act=dki">Chào bạn '.$_SESSION["user"].'</span>';
                                }
                                else{
                                    include 'noLogin.php';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <marquee>Hiện tại hệ thống đang trong quá trình hoàn thiện. Nếu có sự cố vui lòng liên hệ qua số 0123.456.7890 để được giải đáp</marquee>
                <div class="mid">
                    <div class="mid-left">
<!--                        <ul>
                            <li><a href="index.php">Trang chính</a></li>
                            <li><a href="index.php?act=xemdiem">Xem điểm</a></li>
                            <li><a href="#">Đánh giá giảng dạy</a></li>
                            <li><a href="#">Xem thời khóa biểu</a></li>
                        </ul>-->
                        <?php
                            $connection = mysqli_connect("localhost","root","");
                            mysqli_select_db($connection, "qlydanhmuc");
                            $result = mysqli_query($connection, "select idtheloai,tentheloai from Theloai");
                            while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
                                echo '<div><a href="index.php?id='.$row[0].'&tentheloai='.$row[1].'">'.$row[1].'</a></div>';
                            }
                        ?>
                    </div>
                    <div class="mid-content">
                        <?php include'content.php'?>
                    </div>
                </div>
                <div class="footer">&copy; Sản phẩm thuộc đơn vị nhóm thực hiện đồ án và không thuộc về một cơ quan tổ chức nào</div>
            </div>
        </div>
    </body>
</html>

