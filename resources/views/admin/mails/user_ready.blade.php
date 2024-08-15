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
                <h2 style="line-height: 24px;"><strong>Welcome to FANSTOSELLERS</strong></h2>
                <!-- <h3 style="line-height: 24px;">This is <strong></strong></h3> -->
                {{-- {{$mail_data['first_name']   ['verify_code']}} --}}
                <h3 style="color: #B962A8; margin-top: 50px;">
                    {{$mail_data['first_name']}}
                </h3>
                <p style="line-height: 24px; margin-top: 30px; font-size: 13px; max-width: 450px;">
                    We are happy that you sign up for FANSTOSELLERS.
                    To complete your sign up use the following <strong>verification code</strong>
                </p>
                <div style="line-height: 24px; margin-top: 40px; background-color: #027686; color: white; padding: 20px 15px;">
                    <span style="color:white; font-size:18px; text-decoration:none">
                        {{$mail_data['verify_code']}}
                    </span>
                </div>
                <div style="border: 1px solid gray; margin-top: 40px; margin-bottom: 30px;"></div>
                <p style="color: #3f3f3f; font-size: 15px; margin: auto;">
                    If you have any problems, contact us at
                    <a href="#" style="color: #B962A8;"> support@fanstosellers.com</a>
                </p>
                <div style="margin-top: 20px; text-align: center; margin-bottom: 15px; color: #9b9b9b; font-size: 13px;">
                    ©FANSTOSELLERS {{ date('Y') }}
                </div>
            </div>

        </div>
    </div>
</body>

