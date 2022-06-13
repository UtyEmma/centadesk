@push('scripts')
    <script>
        function setPreview(e){
            const preview = document.querySelector("#{{$id ?? 'avatar_preview'}}");
            const file = e.target.files[0]
            const validation = this.validateImage(file)
            if(validation.status){
                document.getElementById('image-error').innerText = ''
                preview.src = URL.createObjectURL(file)
                $('#del-btn').show()
            }else{
                return document.getElementById('image-error').innerText = validation.message
            }
        }

        function removeImg(){
            $('input[name="{{$id ?? "avatar"}}"]').val('')
            $('#del-btn').hide()
            const image = document.querySelector("#{{$id ?? 'avatar_preview'}}")
            image.src = "{{asset('images/add_img.jpg')}}"
        }

        $(document).ready(() => {
            $('#del-btn').hide()
        })

        function validateImage(file){
            if(!file){
                return {
                    status: false,
                    message: "No file was selected"
                }
            }else if(!file.type.startsWith('image/')){
                return {
                    status: false,
                    message: "File type must be an image"
                }
            }else if(file.size > 2000000){
                return {
                    status: false,
                    message: "Image size must be less than 2mb"
                }
            }else{
                return {
                    status: true
                }
            }
        }
    </script>
@endpush
<div class="row gx-3">
    <div class="col-md-12" >
        <small class="text-danger" id="image-error"></small>
    </div>
    <div class="col-md-6">
        <label for="courseimg" class="btn btn-primary d-block text-white btn-hover-dark btn-custom">
            Upload Image
        </label>
        <small>* Image must be less than 2mb</small> <br>
        <small>* Recommended Image aspect ratio is 4:3</small>
        <input type="file" onchange="setPreview(event)" name="{{$name}}" hidden id="courseimg">
    </div>
    <div class="col-md-6 mt-2 mt-md-0">
        <div class="position-relative overflow-hidden radius " style="height: 180px;">
            <img src="{{$image ?? asset('images/add_img.jpg')}}" id="{{$id ?? 'avatar_preview'}}" style="width: 100%;" class="img-cover radius" alt="">

            <button type="button" onclick="removeImg()" id="del-btn" class="position-absolute btn btn-danger btn-hover-dark  py-2 px-1 radius hover-primary" style="top: 10px; right: 10px; line-height: 0;"><i class="icofont-trash mx-1"></i></button>
        </div>
    </div>
</div>
