<table style="width:100%;max-width:620px;margin:0 auto;">
    <tbody>
        <tr>
            <td style="text-align: center; padding:25px 20px 0;">
                <p style="font-size: 13px;">Copyright © {{Date::now()->format('Y')}} <a style="color: #309255; text-decoration:none;" href="{{env('MAIN_APP_URL')}}">{{env('APP_NAME')}}</a>. All rights reserved.</p>
                <ul style="margin: 10px -4px 0;padding: 0;">
                    <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="{{env('LIBRACLASS_TWITTER')}}"><img style="width: 30px" src="{{asset('images/email/brand-b.png')}}" alt="brand"></a></li>
                    <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="{{env('LIBRACLASS_INSTAGRAM')}}"><img style="width: 30px" src="{{asset('images/email/brand-e.png')}}" alt="brand"></a></li>
                    <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="{{env('LIBRACLASS_FACEBOOK')}}"><img style="width: 30px" src="{{asset('images/email/brand-d.png')}}" alt="brand"></a></li>
                    {{-- <li style="display: inline-block; list-style: none; padding: 4px;"><a style="display: inline-block; height: 30px; width:30px;border-radius: 50%; background-color: #ffffff" href="#"><img style="width: 30px" src="{{asset('images/email/brand-c.png')}}" alt="brand"></a></li> --}}
                </ul>
                <p style="padding-top: 15px; font-size: 12px;">This email was sent to you as a registered user of <a style="color: #309255; text-decoration:none;" href="{{env('MAIN_APP_URL')}}">{{env('MAIN_APP_URL')}}</a>.</p>
            </td>
        </tr>
    </tbody>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>
