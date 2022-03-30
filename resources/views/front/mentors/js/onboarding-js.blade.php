@push('scripts')
    <script>
        var stepper

        $(document).ready(function () {
            stepper = new Stepper(document.querySelector('.bs-stepper'))
            setStepProgress()
        })

        function setStepProgress(){
            const {_steps, _currentIndex} = stepper
            const progress = 100 / _steps.length * (_currentIndex + 1)
            $('#onboarding-progress')[0].style.width = `${progress}%`
        }

        function handleNext(callback){
            const validate = callback ? callback() : true
            if(!validate) return;
            stepper.next()
            setStepProgress()
        }

        function previous(){
            stepper.previous()
            setStepProgress()
        }

        function displayErrors(errors) {
            const names = Object.keys(errors)
            names.map(name => document.getElementById('error-'+name).innerHTML = errors[name])
        }

        function parseFormValues(names){
            const object = {}
            names.map((name) => object[name] = $(`[name='${name}']`).val())
            return object
        }

        function clearErrors(values){
            values.map(value => $(`#${value}-error`).text(""))
        }

        function parseErrors(errors){
            const keys = Object.keys(errors)
            keys.map(key => $(`#${key}-error`).text(errors[key][0]))
        }

        function __uniqueSchema(name, rules, attribute){
            return {
                rules: {
                    [name]: rules
                },

                attributes: {
                    [name]: attribute
                }
            }
        }

        function validateField (name, value, _schema) {
            const schema = __uniqueSchema(name,  _schema.rules[name], _schema.attributes[name])
            const validator = new Validator({[name]: value}, schema.rules)
            validator.setAttributeNames(schema.attributes)
            return validator;
        }

        function validateInput(e, schema){
            const {name, value} = e.target
            const validator = validateField(name, value, schema)
            if(validator.fails()){
                const errors = validator.errors.errors
                return $(`#${name}-error`).text(errors[name][0])
            }
            return $(`#${name}-error`).text('')
        }

        function toSlug (str, seperator) {
            if(!str) return false
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase(); //to lowercase

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";

            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, seperator) // collapse whitespace and replace by -
                .replace(/-+/g, seperator); // collapse dashes

            return str;
        }

    </script>
@endpush
