const __batchSchema = (values) => {
    return {
        rules: {
            title: 'required|string',
            excerpt: 'required|string',
            desc: 'required|string',
            objectives: 'required',
            startdate: `required|date|after:now`,
            enddate: `required|date|after:startdate`,
            price: `required|numeric|min:0`,
            attendees: `numeric`,
            class_link: `required|string|url`,
            access_link: `required|string|url`,
            video: 'string|url',
            discount: 'required|string',
            percent: 'numeric|digits_between:0,100',
            fixed: `numeric|max:${values.price}|min:0`,
            signup_limit: 'numeric',
            time_limit: 'date|before:startdate',
            certificates: 'required|boolean',
        },

        attributes: {
            title: 'Title',
            name: "Series Name",
            category: 'Category',
            excerpt: 'Short Description',
            desc: 'Description',
            objectives: 'Objectives',
            startdate: `Start date`,
            enddate: `End Date`,
            price: `Price`,
            attendees: `Expected Attendees`,
            class_link: `Batch Waiting Link`,
            access_link: `Batch Access Link`,
            video: 'Video URL',
            discount: 'Batch Discount',
            percent: 'Discount Percentage',
            fixed: 'Discount Amount',
            time_limit: 'Discount Time Limit',
            signup_limit: 'Discount Signup Limit',
            certificate: 'Certificate'
        }
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

function validateBatchDetails(e){
    const values = Object.fromEntries(new FormData(e.target).entries())
    values.certificates = $('#certificates').is(":checked")
    const schema = __batchSchema(values)
    const validator = new Validator(values, schema.rules)
    validator.setAttributeNames(schema.attributes)
    let errors = {}

    if(validator.fails()){
        errors = {...validator.errors.errors}
    }

    if(moment().isBefore(values.startdate)){
        errors.startdate = ['Start Date Cannot be before today']
    }

    if(moment(values.enddate).isBefore(values.startdate)){
        errors.enddate = ['End Date Cannot be before the Start date']
    }

    if(values.time_limit && moment(values.time_limit).isAfter(values.startdate)){
        errors.enddate = ['End Date Cannot be before the Start date']
    }


    if(Object.keys(errors).length > 0){
        parseErrors(errors)
        return false
    }

    clearErrors(Object.keys(values))
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

function parseDateTimeToJsFormat(date){
    const value = moment(date, 'HH:mm, DD MMM, YYYY').format('yyyy-mm-dd HH:MM:SS')
    return new Date(value)
}
