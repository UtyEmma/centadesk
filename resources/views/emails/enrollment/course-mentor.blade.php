<x-email.index>
    <tr>
        <td style="padding: 30px 30px 15px 30px;">
            <h2 style="font-size: 18px; color: #309255; font-weight: 600; margin: 0;">Congratulations! You have made a new sale on your course!</h2>
        </td>
    </tr>
    <tr>
        <td style="padding: 0 30px 20px">
            <p style="margin-bottom: 10px;">Hi {{$mentor->firstname}},</p>
            <p style="margin-bottom: 10px;">You have made a new sale on your course.</p>

            <p style="font-weight: 600;">Course Name</p>
            <a href="{{env('MAIN_APP_URL')}}/me/courses/{{$course->slug}}" style="margin-bottom: 10px;">{{$course->name}}</a>

            <p style="font-weight: 600;">Batch Title</p>
            <a href="{{env('MAIN_APP_URL')}}/me/courses/{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a>

            <p style="margin-bottom: 10px;">Click the link below to view your students.</p>
            <a href="{{env('MAIN_APP_URL')}}/me/courses/{{$course->slug}}/{{$batch->short_code}}/students" style="background-color:#309255;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px">My Students</a>
        </td>
    </tr>
</x-email.index>
