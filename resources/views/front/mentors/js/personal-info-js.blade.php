@push('scripts')
    <script>

        function getInputs(name){
            return document.querySelector('#'+name)
        }

        function setImagePreview(e, id){
            const preview = document.querySelector("#"+id);
            console.log(preview)
            preview.src = URL.createObjectURL(e.target.files[0])
        }

        // function removeImg(){
        //     $('input[name="avatar"]').val('')
        //     const image = document.querySelector("#mentor-avatar")
        //     image.src = "{{asset('images/icon/user.png')}}"
        // }

        const __personalInfoSchema = {
            rules: {
                username: "required|string|between:4,10",
                specialty: "required|string",
                desc: "required|string",
                city: "required|string",
                state: "required|string",
                country: "required|string",
                instagram: "string",
                facebook: "string",
                twitter: "string",
                website: "string|url",
                resume: "string|url"
            },

            attributes: {
                username: "Username",
                specialty: "Specialty",
                desc: "Description",
                city: "City",
                state: "State",
                country: "Country",
                instagram: "Instagram",
                facebook: "Facebook",
                twitter: "Twitter",
                avatar: "Profile Image",
                website: "Website Link",
                resume: "Resume Link"
            }
        }

        const inputValues = ['username', 'specialty', 'desc', 'city', 'state', 'country', 'instagram', 'facebook', 'twitter', 'avatar']

        function validatePersonalInfo(){
            const values = parseFormValues(inputValues)

            const validator = new Validator(values, __personalInfoSchema.rules)
            validator.setAttributeNames(__personalInfoSchema.attributes)
            if(validator.fails()){
                const errors = validator.errors.errors
                parseErrors(errors)
                return false
            }
            return true;
        }

    </script>
@endpush
