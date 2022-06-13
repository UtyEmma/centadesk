<x-email.index>
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
        <tbody>
            <tr>
                <td style="padding: 30px 30px 20px;" >

                    <p style="margin-bottom: 10px;">
                        @if (isset($data['greeting']))
                            {!! $data['greeting'] !!}
                        @else
                            Hi, {{$user->firstname ?? $user->name ?? ''}}
                        @endif
                    </p>

                    @foreach ($data as $item)
                        @if(isset($item['type']) && $item['type'] === 'text')
                            <p style="margin-bottom: 10px;">{!! $item['value'] !!}</p>
                        @elseif (isset($item['type']) && $item['type'] === 'image')
                            <img style="width:90px; margin-bottom:24px;" src="{{$item['value']}}" alt="img">
                        @elseif (isset($item['type']) && $item['type'] === 'action')
                            <a href="{{$item['value']['link']}}" style="background-color: #309255;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px; margin-bottom: 25px; text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">{{$item['value']['action']}}</a>
                        @endif
                    @endforeach

                    @if(isset($data['goodbye']))
                        <p style="margin-top: 25px; margin-bottom: 15px;">{{$data['goodbye']}}</p>
                    @else
                        <p style="margin-top: 25px; margin-bottom: 15px;">---- <br> Regards<br>Libraclass Team</p>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</x-email.index>
