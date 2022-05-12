<x-email-index>
    <tr>
        <td style="padding: 30px 30px 15px 30px;">
            <h2 style="font-size: 18px; color: #309255; font-weight: 600; margin: 0;">A new Course you may be interested in has been created</h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding: 30px 30px 0;">
            <img style="max-width:100%; height: auto;" src="{{$course->images}}" alt="image">
        </td>
    </tr>
    <tr>
        <td style="text-align:left;padding: 15px 30px 5px 30px;">
            <h2 style="font-size: 18px; color: #309255; font-weight: 600; margin-bottom: 8px;">{{$course->name}}</h2>
            <h6>{{$batch->title}}</h6>
            <p style="margin: 16px 0;">{{$course->excerpt}}</p>
            <a href="{{env('MAIN_APP_URL')}}/courses/{{$course->slug}}/{{$batch->short_code}}" style="background-color:#309255;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:38px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px">Check it Out</a>
        </td>
    </tr>
</x-email-index>
