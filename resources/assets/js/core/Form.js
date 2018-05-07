import Errors from './Errors';

class Form {

    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }


    /**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }


    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit (requestType, url, onSuccess = null) {
        axios[requestType](url, this.data())
            .then((response) => {
                if (onSuccess !== null) return onSuccess;
                return this.onSuccess(response.data.redirect);
            })
            .catch((error) => this.onFailure(error.response.data.errors));
    }


    /*   submit(requestType, url, onSuccess) {
           return new Promise((resolve, reject) => {
               axios[requestType](url, this.data())
                   .then(response => {
                       onSuccess;
                       resolve(response.data);
                   })
                   .catch(error => {
                       this.onFail(error.response.data.errors);

                       reject(error.response.data.errors);
                   });
           });
       }*/

    onSuccess(response) {
        window.location = response;
    }

    onFailure(error) {
        this.errors.record(error);
        flash("Je crois qu'il s'est passé un truc...", "Ca commence mal...", "error")
    }

    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url) {
        return this.submit('post', url);
    }


    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        return this.submit('put', url);
    }


    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        return this.submit('patch', url);
    }


    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url) {
        return this.submit('delete', url);
    }

}

export default Form;