import axios from "axios";
import Auth from "./Auth";

const Api = axios.create({
    baseURL: process.env.API_ENDPOINT,
    withCredentials: true
});

if (Auth.is_in()) {
    Api.defaults.headers.common = { Authorization: `Bearer ${Auth.token()}` };
}

Api.interceptors.response.use(
    response => response,
    error => {
        if (error.response.status === 401) {
            Auth.logout();
        }
        return Promise.reject(error);
    }
);
export default Api;
