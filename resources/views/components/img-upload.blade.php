@push('scripts')
    <script>
        function setPreview(e){
            const preview = document.querySelector("#avatar_preview");
            preview.src = URL.createObjectURL(e.target.files[0])
            $('#del-btn').show()
        }

        function removeImg(){
            $('input[name="avatar"]').val('')
            $('#del-btn').hide()
            const image = document.querySelector("#avatar_preview")
            image.src = "{{asset('images/add_img.jpg')}}"
        }

        $(document).ready(() => {
            $('#del-btn').hide()
        })
    </script>
@endpush
<div class="row gx-3">
    <div class="col-md-6">
        <label class="mb-1" style="font-weight: 500;">{{$slot}}</label>

        <label for="courseimg" class="btn btn-primary d-block text-white btn-hover-dark btn-custom">
            Upload Image
        </label>
        <input type="file" onchange="setPreview(event)" name="{{$name}}" hidden id="courseimg">
    </div>
    <div class="col-md-6">
        <div class="position-relative overflow-hidden radius " style="height: 180px;">
            <img src="{{$image ?? asset('images/add_img.jpg')}}" id="avatar_preview" style="width: 100%;" class="img-cover radius" alt="">

            <button type="button" onclick="removeImg()" id="del-btn" class="position-absolute btn btn-danger btn-hover-dark  py-2 px-1 radius hover-primary" style="top: 10px; right: 10px; line-height: 0;"><i class="icofont-trash mx-1"></i></button>
        </div>
    </div>
</div>
