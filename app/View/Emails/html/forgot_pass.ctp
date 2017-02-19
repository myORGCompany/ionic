<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse !important;}
    </style>
    <![endif]-->
    <style>
    @media screen and (max-width: 400px) {
        .two-column .column,
        .three-column .column {
            max-width: 100% !important;
        }
        .two-column img {
            max-width: 100% !important;
        }
        .three-column img {
            max-width: 50% !important;
        }
    }
    
    @media screen and (min-width: 401px) and (max-width: 620px) {
        .three-column .column {
            max-width: 33% !important;
        }
        .two-column .column {
            max-width: 50% !important;
        }
    }
    </style>
</head>

<body style="background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;margin-top:0 !important;margin-bottom:0 !important;margin-right:0 !important;margin-left:0 !important;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:Arial, sans-serif;font-size:16px;line-height:21px;color:#607D8B;">

    <center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">
        <div class="webkit" style="max-width:602px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;">
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" style="border-spacing:0;font-family:Arial, sans-serif;color:#607D8B;" >
            <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
            <![endif]-->
            <table class="outer" align="center" style="border-spacing:0;color:#607D8B;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;width:100%;max-width:602px;background-color:#fff;border-left-width:1px;border-left-style:solid;border-left-color:#dddddd;border-right-width:1px;border-right-style:solid;border-right-color:#dddddd;border-top-width:1px;border-top-style:solid;border-top-color:#dddddd;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#dddddd;font-family:Arial, sans-serif;">
                <tr>
                    <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
                        <tr>
                            <td background="" bgcolor="#5e001b" height="120" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
                                <!--[if gte mso 9]>
                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:120px;" >
                            <v:fill type="tile" src="img/mailer-hh.gif" color="#144186" />
                            <v:textbox inset="0,0,0,0">
                            <![endif]-->
                                <div style="padding-top:20px;text-align:center;width:100%;">
                                    <table style="width:100%;border-spacing:0;font-family:Arial, sans-serif;color:#607D8B;">
                                        <tr>
                                            <td style="text-align:center;width:100%;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
                                                <img src="<?php echo ABSOLUTE_URL;?>/img/nextstep.png" alt="NextStep" style="border-width:0;" />
                                                <br />
                                                <span align="center" style="border-top-width:1px;border-top-style:solid;border-top-color:#9EB5D7;width:130px;margin-top:13px;display:inline-block;margin-left:-5px; height:13px;    ">&nbsp;</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:#ffffff;font-weight:500;font-size:17px;padding-bottom:0;padding-right:0;padding-left:0;padding-top:0; text-align:center;">
                                                Password Changed
                                            </td>
                                        </tr>
                                    </table>
                                    <br />
                                </div>
                                <!--[if gte mso 9]>
                            </v:textbox>
                            </v:rect>
                            <![endif]-->
                            </td>
                        </tr>
                        <!-- Adding a Single Column Layout -->
                        <tr>
                            <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
                                <table width="100%" style="border-spacing:0;font-family:Arial, sans-serif;color:#607D8B;">
                                    <tr>
                                        <td class="inner contents" style="padding-top:10px;padding-bottom:20px;padding-right:10px;padding-left:10px;width:100%;text-align:left;">
                                            <p class="h1" style="margin-top:0;margin-right:0;margin-left:0;line-height:21px;font-weight:bold;font-size:16px;margin-bottom:10px;">Dear <?php echo $message['first_name'].' '.$message['last_name'];?>,</p>
                                            <p style="margin-top:0;margin-right:0;margin-left:0;line-height:21px;font-size:16px;margin-bottom:10px;">
                                                Please find your password below:
                                            </p>
                                            <br/>
                                            <p style="margin-top:0;margin-right:0;margin-left:0;line-height:21px;font-size:16px;margin-bottom:10px; text-align:center;">
                                                 <strong><?php echo $message['new_password'];?></strong>
                                            </p>
                                            <br>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="one-column" style="border-top-width:2px;border-top-style:solid;border-top-color:#dddddd;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                                <table width="100%" style="border-spacing:0;font-family:Arial, sans-serif;color:#607D8B;" >
                                    <tr>
                                        <td class="inner contents" style="padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;text-align:left;" >
                                            <p style="font-size:16px;color:#9EA8AB;margin-top:0;margin-right:0;margin-left:0;line-height:20px;margin-bottom:10px;" >
                                               The NextStep Team<br />
                                               Phone: +91 8470075550<br /> 
                                               Email: <a href="mailto:helpdesk@nextsteptech.in" style="word-break:break-all;color:#2779E2;text-decoration:underline;">helpdesk@nextsteptech.in</a></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
            

</html>


