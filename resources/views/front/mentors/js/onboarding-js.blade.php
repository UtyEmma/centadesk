<script>
    var stepper

    document.addEventListener('DOMContentLoaded', function () {
        stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    function next(names){

        if(names){
            const validator = validate(names)

            if(!validator.status) {
                return displayErrors(validator.errors)
            };

            console.log(validator)
        }

        stepper.next()
    }

    function previous(){
        stepper.previous()
    }

    function connectMetaMask(){

    }

    function displayErrors(errors) {
        const names = Object.keys(errors)
        names.map(name => {
            document.getElementById('error-'+name).innerHTML = errors[name]
        })
    }

    function validate(names){
        let errors = {}
        let status = true

        names.map((name) => {
            const element = document.getElementsByName(name)
            if(element[0].value === '') {
                status = false
                return errors[name] = name+" is required"
            }
            if(element[0].name === 'username') if(element[0].value.length > 10) {
                return errors[name] = `${name} must be less than 10 characters`
            }

            if(element[0].type === 'file') {
                if(element[0].files.length < 0){
                    return errors[name] = `Please upload a valid file`
                }
            }

            document.getElementById('error-'+name).innerHTML = ""
        });

        return {status, errors}
    }

    function createMentor(e) {
        e.preventDefault()
        const formData = new FormData(e.target)
        formData.append('experience', JSON.stringify(experienceArray))
        formData.append('qualifications', JSON.stringify(qualificationArray))
        const data = Object.fromEntries(formData.entries())

        console.log(data)
    }

</script>
