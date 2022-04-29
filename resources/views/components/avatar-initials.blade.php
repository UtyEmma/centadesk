{{-- @push('styles') --}}
    <style>
        .circle {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-color: rgb(216, 216, 216);
            border-radius: 50%;
            text-align: center;
        }

        .initials {
            font-size: 100%;
            position: relative;
        }
    </style>
{{-- @endpush --}}


<div class="circle h-100 w-100">
    <span class="initials fw-bold">{{substr($firstname, -strlen($firstname), 1)}}{{substr($lastname, -strlen($lastname), 1)}}</span>
</div>
