<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" style="height: 100%;">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title>Verify Code</title>
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Roboto&display=swap" rel="stylesheet" type="text/css"/>

<style type="text/css">

</style>
</head>

<body style="box-sizing: border-box; height: 100%; margin: 10px; padding: 0;">
    <div style="width: 100%; height: 100%; position: relative; display:flex; background-color: #FAFAFA;">
        <div style="max-width: 800px; margin: auto;">
            <div style="background-color: white; border: solid 1px #ccc; border-radius: 5px; padding: 20px; font-family: Arial, Helvetica, sans-serif; text-align: center;">
                <h2 style="line-height: 24px;"><strong>FANSTOSELLERS</strong></h2>
                <!-- <h3 style="line-height: 24px;">This is <strong>{{$mail_data}}</strong></h3> -->
                <h4 style="line-height: 24px; margin-top: 50px;">
                    If you requested a password reset, click the button below.
                </h4>
                <h4 style="line-height: 24px; margin-bottom: 35px;">
                    If you didn't make this request, ignore this email.
                </h4>
                <p style="line-height: 24px; width: 115px; margin: auto; background-color: #027686; color: white; padding: 10px 15px; border-radius: 5px;">
                    <a href="http://localhost:8001/reset_password/{{$mail_data}}" style="color:white;   font-size:15px; text-decoration:none">
                        Reset password
                    </a>
                </p>
                <div style="border: 4px solid #B962A8; margin-top: 35px; margin-bottom: 20px;"></div>
                <p style="max-width: 400px; color: #3f3f3f; font-size: 15px; margin: auto;">
                    If you are having any other issues with your account, please don't hesitate to contact us by replying to this mail . Thanks!
                </p>
                <div style="margin-top: 20px; text-align: center; margin-bottom: 15px; color: #9b9b9b; font-size: 13px;">
                    ©FANSTOSELLERS {{ date('Y') }}
                </div>
            </div>

        </div>
    </div>
</body>

</html>