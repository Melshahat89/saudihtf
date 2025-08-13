<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" dir="ltr" />
      <meta name="format-detection" content="telephone=no">
      <meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
      <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
      <title>IGTS</title>
      <!-- CSS Reset : BEGIN -->
      <style>

         html,
         body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #fff;
         }
         
         /* What it does: Stops email clients resizing small text. */
         * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
         }
         
         /* What it does: Centers email on Android 4.4 */
         div[style*="margin: 16px 0"] {
            margin: 0 !important;
         }
         
         /* What it does: Stops Outlook from adding extra spacing to tables. */
         table,
         td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
         }
         
         /* What it does: Fixes webkit padding issue. */
         table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
         }
         
         /* What it does: Uses a better rendering method when resizing images in IE. */
         img {
            -ms-interpolation-mode:bicubic;
            display: block;
         }
         
         /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
         a {
            text-decoration: none;
         }
         
         /* What it does: A work-around for email clients meddling in triggered links. */
         *[x-apple-data-detectors],  /* iOS */
         .unstyle-auto-detected-links *,
         .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
         }
         
         /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
         .a6S {
            display: none !important;
            opacity: 0.01 !important;
         }
         
         /* What it does: Prevents Gmail from changing the text color in conversation threads. */
         .im {
            color: inherit !important;
         }
         
         /* If the above doesn't work, add a .g-img class to any image in question. */
         img.g-img + div {
            display: none !important;
         }
         
         /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
         /* Create one of these media queries for each additional viewport size you'd like to fix */
         
         /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
         @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
               min-width: 320px !important;
            }
         }
         /* iPhone 6, 6S, 7, 8, and X */
         @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
               min-width: 375px !important;
            }
         }
         /* iPhone 6+, 7+, and 8+ */
         @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
               min-width: 414px !important;
            }
         }
         
      </style>
      <!-- CSS Reset : END -->
   </head>


   <body style="padding:0; margin:0">
      <table border="0" cellspacing="0" cellpadding="0" height="100%" width="100%" align="center" style="color:#707070; background:#ffffff; padding: 0;  margin: 0 auto;">
         <tr>
            <td>
               <table width="680" cellspacing="0" cellpadding="0" bgcolor="#F7F7F7" align="center" valign="center" style="font-family: Arial, Calibri, sans-serif; text-align: left; font-size:14px; padding:0; line-height: 21px;">
               
                  <tr>
                     <td>
                        <table width="650" cellspacing="0" cellpadding="0">
                           <tr style="height: 15px;">
                              <td></td>
                           </tr>
                           <tr style="background: #ffffff; border: 1px solid #ddd; height: 250px;">
                              <td>
                                 <p style="font-size: 25px; font-weight: lighter; padding-left: 40px; padding-right: 40px; margin: 0; padding-top: 20px; padding-bottom: 10px;"><strong>Hello and welcome to IGTS, </strong></p>
                                 <p style="padding-left: 40px; padding-right: 40px; margin: 0; padding-top: 10px; padding-bottom: 20px;">You have received a business account invitation from "{{ $business['name_en'] }}"  </p>
                              </td>
                           </tr>
                           <tr style="height: 15px;">
                              <td></td>
                           </tr>

                           <tr align="center" valign="center" style="border: 1px solid #ddd; border-top: 0; background: #fff;">
                              <td style="background-color: #01516d">
                                 <a href="https://igtsservice.com/" target="_blank" style="display: block; width: 100%; padding-bottom: 40px; padding-top: 40px;">
                                    <img src="https://igtsservice.com/website/images/logonew.png" alt="IGTS" style="width: 170px;">
                                 </a>
                              </td>
                           </tr>

                           <tr style="height: 15px;">
                              <td></td>
                           </tr>
                           <tr style="background: #ffffff; border: 1px solid #ddd; border-bottom: 0;">
                              <td>
                                 <p style="font-size: 25px; font-weight: bold; padding-left: 40px; padding-right: 40px; margin: 0; padding-top: 20px; padding-bottom: 20px; border-bottom: 1px solid #ddd;">Accept Your Invitation</p>
                                 <table cellspacing="0" cellpadding="0">
                                 
                                    <p style="padding-left: 40px; padding-right: 40px; margin: 0; padding-top: 20px; padding-bottom: 20px;">To accept this invitation, all you need to do is open our website https://igtsservice.com and press signup to create an account with email address that you received this email on.</p>

                                 </table>
                              </td>
                           </tr>
                           <tr align="center" valign="center" style="border: 1px solid #ddd; border-top: 0; background: #fff;">
                           <td style="padding-right: 40px; font-weight: bold;">
                           <br>
                           <br>
                           
                           </td>
                           
                           </tr>
                           <tr align="center" valign="center" style="border: 1px solid #ddd; border-top: 0; background: #fff;">
                              <td>
                                 <a href="https://igtsservice.com/courses/category" target="_blank" style="display: block; width: 100%; padding-bottom: 30px; padding-top: 15px;">
                                    <img src="https://meduo.net/meduo/images/discover-courses.png" alt="Meduo" >
                                 </a>
                              </td>
                           </tr>

                           <tr style="height: 15px;">
                              <td></td>
                           </tr>

                           <tr>
                              <td style="text-align: center;">
                                 <p style=" margin: 0; padding-top: 10px; padding-bottom: 20px; color: #BEBEBE;">
                                 If you believe this has been sent to you in error, please safely <a href="#" style="text-decoration: underline; ">unsubscribe</a>.
                              <br>
                              For more information, please see our <a href="https://igtsservice.com/page/privacyPolicy" style="text-decoration: underline;">privacy policy.</a>
                              <br>
                              © 2024 <a href="https://igtsservice.com" style="text-decoration: underline;">IGTS</a>. All rights reserved.                                  </p>
                              </td>
                           </tr>
                           <tr style="height: 15px;">
                              <td></td>
                           </tr>
                           
                        </table>
                     </td>
                  </tr>
               
               </table> 
            </td>
         </tr>
      </table>
      
     
                                             

   </body>



</html>