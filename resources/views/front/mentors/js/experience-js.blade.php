<script>

const experienceArray = []

const __experienceSchema = {
    rules: {
        company: "required|string",
        role: "required|string",
        startdate: "required|date",
        enddate: "date",
        current: "nullable|boolean",
    },

    attributes: {
        company: "Qualification",
        role: "Institution",
        startdate: "Start Date",
        enddate: "End Date",
        current: "Current Position"
    }
}

function parseErrors(errors){
    const keys = Object.keys(errors)
    keys.map(key => {
        $(`#${key}-error`).text(errors[key][0])
    })
}

function addExperience(){
    let company = $('#company').val()
    let  role = $('#role').val()
    let startdate = $('#startdate').val()
    let enddate = $('#enddate').val()
    let current = $('#current').checked

    const validation = new Validator({
        company: company,
        role: role,
        startdate: startdate,
        enddate: enddate,
        current: current
    }, __experienceSchema.rules)

    validation.setAttributeNames(__experienceSchema.attributes)

    if(validation.fails()){
        const errors = validation.errors.errors
        return parseErrors(errors)
    }

    experienceArray.push({
        company: company,
        role: role,
        startdate: startdate,
        enddate: enddate,
        current: current
    })

    $('#experience-input').val(JSON.stringify(experienceArray))

    const experience = `<div class="d-flex justify-content-between my-2" id="experience-${experienceArray.length - 1}">
            <div>
                <h6 class="mb-0 mt-0">${company}</h6>
                <p class="mt-0">${role} - <span class="mb-0">${startdate} ${enddate && '- '+enddate}</span></p>
            </div>

            <div>
                <button class="" onclick="deleteItem(${experienceArray.length - 1})" type="button">X</button>
            </div>
        </div>`

    clear()

    $('#experience-error').text('');

    document.getElementById('experience-container').insertAdjacentHTML('beforeend', experience)
}

function experienceNext(){
    if(experienceArray.length < 1) return $('#experience-error').text('Please add atleast one Experience Information');
    return next()
}

function clear(){
    $('#company').val("")
    $('#role').val("")
    $('#startdate').val("")
    $('#enddate').val("")
    $('#current').checked = false

    $("#company-error").html("")
    $("#role-error").html("")
    $("#startdate-error").html("")
    $("#enddate-error").html("")
    $("#current-error").html("")
}

function deleteItem(id){
    experienceArray.splice(id, 1)
    const element = document.getElementById(`experience-${id}`)
    $('#experience-input').val(JSON.stringify(experienceArray))
    element.remove()
}

</script>
