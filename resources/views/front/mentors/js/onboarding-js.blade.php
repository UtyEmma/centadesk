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

        if(validate){
            stepper.next()
            setStepProgress()
        }
    }

    function previous(){
        stepper.previous()
        setStepProgress()
    }

    function displayErrors(errors) {
        const names = Object.keys(errors)
        names.map(name => {
            document.getElementById('error-'+name).innerHTML = errors[name]
        })
    }

    function createMentor(e) {
        e.preventDefault()
        const formData = new FormData(e.target)
        formData.append('experience', JSON.stringify(experienceArray))
        formData.append('qualifications', JSON.stringify(qualificationArray))
        const data = Object.fromEntries(formData.entries())
    }

</script>
