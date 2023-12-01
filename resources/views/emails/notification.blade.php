<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>إشعار رسالة جديدة</title>
    <style>
        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        *{
            text-align: right;
        }
        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 0 15px !important;
            }
        }
    </style>
</head>
<body style="background-color: #f4f4f4;">
    <div style="background-image: url('{{asset('imgs/image/head-pages.jpg')}}');  background-size: cover; background-position: center; max-width: 600px; margin: 0 auto; text-align: center;">
        <!-- Title in the middle of the header -->
        <div style="padding: 12px 0; background-color: rgba(0, 0, 0, 0.3); text-align: center; ">
            <h1 style="font-size: 24px; font-weight: bold; color:#FFF; text-align: center;">إشعار جديد</h1>
        </div>
    </div>

    <div style="max-width: 600px; margin: 0 auto;">
        <!-- Email content -->
        <table cellpadding="0" cellspacing="0" width="100%" style="background-color: #ffffff; border-collapse: collapse;">
            <tr>
                <td style="padding: 20px;">

                    <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 20px;">{{ $title ?? "" }}</h2>
                    <p style="margin-bottom: 20px;">{{ $sub_title ?? "" }}</p>
                    <p style="margin-bottom: 20px; background-color: rgb(221, 221, 221); border-radius: 8px; padding: 10px;">{{ $content ?? "" }}</p>                    

                    @if(isset($url))
                    <div>
                        <span>الرابط: </span>
                        <a href="#" style="color: #3498db;  text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">الاتجاه الى الرابط التالي</a>                
                    </div> 
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
