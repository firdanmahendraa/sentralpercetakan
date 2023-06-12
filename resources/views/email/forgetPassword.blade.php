<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .text-center{
        text-align: center;
    }
    a{
        text-decoration: none;
    }
    .btn{
        background-color: #007bff;
        border-radius: 8px;
        border-width: 0;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        list-style: none;
        margin: 0;
        padding: 10px 12px;
        text-align: center;
        transition: all 200ms;
        vertical-align: baseline;
        white-space: nowrap;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }
</style>
</head>
<body>
<h3>Hai!</h3>
Kami menerima permintaan untuk mengatur ulang kata sandi Anda. <br>
Masukkan kode reset kata sandi berikut:Atau, Anda bisa mengubah kata sandi secara langsung. <br>
<div class="text-center" style="margin-top: 20px">
    <a href="{{ route('password_recover', $token) }}" class="btn">Reset Password</a>
</div>

</body>
</html>
