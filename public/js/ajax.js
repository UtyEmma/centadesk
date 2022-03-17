const Request = {
    post: async (url, data, token = "", options = {}) => {
        const response = await fetch(url, {
            method: 'POST',
            mode: options?.mode,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': token,
                ...options?.headers
            },
            body: JSON.stringify(data)
        })

        return {
            status: response.ok || response.status === 200,
            data: await response.json(),
            code: response.status
        }
    },

    get: async (url, token = "", options = {}) => {
        const response = await fetch(url, {
            method: 'GET',
            mode: options?.mode,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': token,
                ...options?.headers
            }
        })

        return {
            status: response.ok || response.status === 200,
            data: await response.json(),
            code: response.status
        }
    }
}
