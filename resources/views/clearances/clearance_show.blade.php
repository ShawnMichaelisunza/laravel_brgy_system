<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <table style="width: 100% margin: auto;">
        <tr>
            <th style="padding: 5px;">
                <div style="margin: auto; background: rgb(170, 3, 3); border: none; border-radius: 100px; width: 150px;">
                    <img src="{{ public_path('assets/image/brgy-logo.png') }}" alt="" style="width: 150px;">
                </div>
            </th>
            <th style="text-align: center; color: rgb(6, 6, 141); font-size: 13px;">
                <h2>Republic of the Philippines <br> Quezon City</h2>
            </th>
            <th>
                <img src="{{ public_path('assets/image/qc-logo.png') }}" alt="" style="width: 150px;">
            </th>
        </tr>
        <tr>
            <td rowspan="5"
                style="border-right: 3px solid red; border-top: 3px solid red; padding: 5px; width: 230px;">
                <div>
                    <h1 style="font-size: 15px; text-align: center; color: rgb(6, 6, 141);">SANGGUNIANG BARANGAY</h1>
                </div>
                <div style="margin: 25px 0">
                    @foreach ($chairman as $chr)
                        <h1
                            style="margin: 0; font-size: 14px; text-align: center; color: rgb(141, 6, 6);  text-transform: uppercase;">
                            {{ $chr->name }}</h1>
                    @endforeach
                    <p
                        style="font-size: 12px; font-weight: bold; text-align: center; text-transform: uppercase; color: rgb(141, 6, 6); margin: 0;">
                        Barangay Chairman</p>
                </div>
                <div>
                    <h1 style="font-size: 17px; text-align: center; color: rgb(141, 6, 6);">KAGAWAD</h1>
                    @foreach ($kagawads as $kagawad)
                        <p style="font-size: 14px; text-align: center; text-transform: uppercase; margin-top: 20px;">
                            {{ $kagawad->name }}</p>
                    @endforeach
                </div>
                <div style="margin-top: 40px">
                    @foreach ($sks as $sk)
                        <h1
                            style="margin: 0; font-size: 15px; text-align: center; color: rgb(141, 6, 6);  text-transform: uppercase;">
                            {{ $sk->name }}</h1>
                    @endforeach
                    <p
                        style="font-size: 12px; font-weight: bold; text-align: center; text-transform: uppercase; color: rgb(141, 6, 6); margin: 0;">
                        SK Chairman</p>
                </div>
                <div style="margin-top: 40px">
                    <p
                        style="margin: 0; font-size: 15px; font-weight: bold; text-align: center; color: rgb(141, 6, 6);  text-transform: uppercase;">
                        Not Valid Without Seal
                    </p>
                </div>
            </td>
            <td colspan="2"
                style="border-left: 3px solid blue; border-top: 3px solid blue; vertical-align: middle; padding: 0 10px; height: 150px;">
                <h4 style=" color: rgb(126, 8, 8); text-align: right; margin-bottom: 50px;">No.
                    @if ($clearance->serial_no)
                        {{ $clearance->serial_no }}
                    @else
                        Not Valid
                    @endif
                </h4>
                <h1 style="font-size: 30px; text-align: center; color: rgb(126, 8, 8);  text-decoration: underline;">
                    CERTIFICATION</h1>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border-left: 3px solid blue; vertical-align: top; padding: 0 10px; width: 150px;">
                <div>
                    <h3 style="font-size: 17px; color:  rgb(126, 8, 8);">TO WHOM IT MAY CONCERN:</h3>
                    <p style="font-size: 17px; text-align: center;">This is to certify that <span
                            style="text-transform: uppercase; font-weight: 500; font-size: 15px; color: rgb(126, 8, 8);">{{ $user->name }}</span>
                        of Legal age, married/single, Filipino, is a bonafide resident of
                        <span
                            style="text-transform: uppercase; font-weight: 500; font-size: 15px; color: rgb(126, 8, 8);">{{ $user->address }}</span>
                        Barangay Kupal Quezon City, and that he/she has no derogatory / criminal records filed in this
                        Barangay.
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border-left: 3px solid blue; vertical-align: top; padding: 0 10px; width: 150px;">
                <div>
                    <p style="font-size: 17px; text-align: center;">
                        This Certification is issued upon he/her request for <br><span
                            style="text-transform: uppercase; font-weight: 500; font-size: 15px; color: rgb(126, 8, 8);">
                            {{ $clearance->purpose }}</span>
                    </p>
                </div>
                <div>
                    <p style="font-size: 17px; text-align: center; margin-top: 33px;">
                        Issued this <span
                            style="color: rgb(126, 8, 8);">{{ $clearance->created_at->format('d') }}</span> day of <span
                            style="color: rgb(126, 8, 8);">{{ $clearance->created_at->format('F, Y') }}</span>
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td style="border-left: 3px solid blue; vertical-align: bottom; width: 250px;">
                <div>
                    <hr style="margin: 0; width: 170px; margin: auto; border: 1px solid black;">
                    <p style="margin: 2px auto; font-size: 12px; font-weight: bold; text-align: center;">Signature</p>
                </div>
            </td>
            <td style="vertical-align: bottom; width: 210px;">
                <div>
                    @foreach ($chairman as $chr)
                        <h1
                            style="margin: 0; font-size: 12px; text-align: center; color: rgb(141, 6, 6); text-transform: uppercase; text-decoration: overline;">
                            {{ $chr->name }}</h1>
                    @endforeach
                    <p
                        style="font-size: 10px; font-weight: bold; text-align: center; color: rgb(141, 6, 6); margin: 0;">
                        Barangay Chairman</p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-left: 3px solid blue; vertical-align: bottom; padding: 5px 10px;">
                <p style="margin: 0; font-size: 12px; font-weight: 500;">Rest. Cert. No.__________</p>
                <p style="margin: 0; font-size: 12px; font-weight: 500;">Issued at _______________</p>
                <p style="margin: 0; font-size: 12px; font-weight: 500;">Issued on _______________</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="border-top: 4px solid red; height: 150px; vertical-align: middle;">
                <p style="text-align: center; font-size: 15px; font-weight: 500;">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Necessitatibus, esse? Dolore,<br><span style="color: rgb(126, 8, 8);"> corporis
                        fugiat? Quia vel ipsam rem non facilis saepe dolor quam magnam enim assumenda</span> <br>
                    exercitationem magni Illo, repellendus accusantium!</p>
            </td>
        </tr>
    </table>
</body>

</html>
