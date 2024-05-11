import axios from 'axios';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

class Api {

    getUrl(uri) {
        let baseUrl = window.location;
        return baseUrl.protocol + '//' + baseUrl.host + uri;
    }

    async get(uri, data = null) {
        return this.request(async (_uri, _data) => axios.get(this.getUrl(_uri), {
            params: _data
        }), uri, data)
    }

    async post(uri, data = null) {
        return this.request(async (_uri, _data) => axios.post(
            this.getUrl(_uri),
            _data
        ), uri, data);
    }

    async delete(uri, data = null) {
        return this.request(async (_uri, _data) => axios.delete(
            this.getUrl(_uri + '?id=' + _data),
        ), uri, data);
    }

    async postFile(uri, data = null) {
        return this.request(async (_uri, _data) => axios.post(
            this.getUrl(_uri),
            _data,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ), uri, data);
    }

    async request(func, uri, data = null) {
        try {
            let response = await func(uri, data);
            return response.data || {};
        } catch (e) {
            console.error(e);
            return e.response.data || false;
        }
    }
}

export default Api;
