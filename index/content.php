<?php
    if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        switch($act)
        {
            case "dki":
                include 'dangki.php';
                break;
            case "xemdiem":
                include 'xemdiem.php';
                break;
            case "dnhap":
                include 'dangnhap.php';
                break;
        }
    }
    else
    {
        echo'<h1 style="font-size:19px;">THÔNG BÁO</h1>
             <p>Đề nghị các sinh viên thực hiện đầy đủ nội quy trước khi đi học</p>';
    }
    
