<x-email.index>
    <tr>
        <td style="padding: 30px 30px 15px 30px;">
            <h2 style="font-size: 18px; color: #309255; font-weight: 600; margin: 0;">Your Enrollment has been completed!</h2>
        </td>
    </tr>
    <tr>
        <td style="padding: 0 30px 20px">
            <p style="margin-bottom: 10px;">Hi {{$student->firstname}},</p>
            <p style="margin-bottom: 10px;">You have successfully enrolled for {{$batch->title}} of the {{$course->name}}.</p>
            <p style="margin-bottom: 10px;">Click the link below to view this course on your dashboard.</p>
            <a href="#" style="background-color:#309255;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px">Verify Email</a>
        </td>
    </tr>
</x-email.index>
