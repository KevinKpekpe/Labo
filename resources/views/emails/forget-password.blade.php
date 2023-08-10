<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f1f1f1;font-family:Arial, sans-serif;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" width="600" style="background-color:#fff;">
                    <tr>
                        <td align="center" style="padding:40px 0;">
                            <h1 style="color:#333;font-size:24px;margin-bottom:20px;">Réinitialisation du mot de passe</h1>
                            <p style="color:#666;font-size:16px;margin-bottom:30px;">Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe :</p>
                            <p align="center">
                                <a href="{{route('reset.password',$token)}}" style="background-color:#4CAF50;border:none;color:#fff;padding:10px 20px;text-decoration:none;">Réinitialiser le mot de passe</a>
                            </p>
                            <p style="color:#666;font-size:16px;margin-top:30px;">Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet e-mail.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
