@push('scripts')
    <script>

        function getInputs(name){
            return document.querySelector('#'+name)
        }

        function setPreview(e){
            const preview = document.querySelector("#avatar_preview");
            preview.src = URL.createObjectURL(e.target.files[0])
        }

        function removeImg(){
            $('input[name="avatar"]').val('')
            const image = document.querySelector("#avatar_preview")
            image.src = "{{asset('images/icon/user.png')}}"
        }

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
