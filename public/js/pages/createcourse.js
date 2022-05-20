const __courseSchema = {
    rules: {
        name: 'required|string',
        excerpt: 'required|string|max:120',
        desc: 'required|string',
        objectives: 'required',
        category: 'required|string',
        tags: 'required',
        video: 'required|url'
    },

    attributes: {
        name: 'Course Name',
        excerpt: 'Short Description',
        desc: 'Description',
        objectives: 'Course Objectives',
        category: 'Course Category',
        tags: 'Tags',
        video: 'Video Link'
    }
}

const parseFormValues = (names) => {
    object = {}
    names.map((name) => {
        object[name] = $(`[name='${name}']`).val()
    })

    return object
}

const clearErrors = (values) => {
    values.map(key => {
        $(`#${key}-error`).text("")
    })
}

const parseErrors = (errors) => {
    const keys = Object.keys(errors)
    keys.map(key => {
        $(`.${key}-error`).text('')
        $(`#${key}-error`).text(errors[key][0])
    })
}

function validateCourseInput(e){
    const values = Object.fromEntries(new FormData(e.target).entries())
    console.log(values)
    const validator = new Validator(values, __courseSchema.rules)
    validator.setAttributeNames(__courseSchema.attributes)

    clearErrors(Object.keys(values))

    if(validator.fails()){
        parseErrors(validator.errors.errors)
        return false
    }

    return true;
}

function validateInput(e, schema){
    const {name, value} = e.target

    const validator = new Validator({[name]: value}, {[name]: schema.rules[name]})
    validator.setAttributeNames({[name]: schema.attributes[name]})

    if(validator.fails()){
        const errors = validator.errors.errors
        return $(`#${name}-error`).text(errors[name][0])
    }
    return $(`#${name}-error`).text('')
}
