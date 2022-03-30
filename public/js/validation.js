const validator = {
    init : (data, schema) => {
        const validator = new Validator(data, schema.rules)
        validator.setAttributeNames(schema.attributes)
        return validator
    },

    mapErrors : (errors) => {
        let object = {}
        if (errors) {
            for (const [key, value] of Object.entries(errors)) {
                object = {
                    ...object,
                    [key]: value[0]
                }
            }
        }
        return object;
    },

    parseFormValues : (names) => {
        object = {}
        names.map((name) => {
            object[name] = $(`[name='${name}']`).val()
        })

        return object
    },

    clearErrors : (values) => {
        values.map(key => {
            $(`#${key}-error`).text("")
        })
    },

    parseErrors : (errors) => {
        const keys = Object.keys(errors)
        keys.map(key => {
            $(`#${key}-error`).text(errors[key][0])
        })
    },

    __uniqueSchema: (name, rules, attribute) => {
        return {
            rules: {
                [name]: rules
            },

            attributes: {
                [name]: attribute
            }
        }
    },

    validateField: (name, value, _schema) => {
        const schema = __uniqueSchema(name,  _schema.rules[name], _schema.attributes[name])
        const validator = validate({[name]: value}, schema)
        return validator;
    }
}
