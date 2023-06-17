import axios from 'axios'
import { useToast, POSITION } from 'vue-toastification';

const toaster = useToast();

export const API = axios.create({
    baseURL: process.env.API_URL,
    withCredentials: false,
});

// Network interceptors
API.interceptors.response.use(
(response) => {
    return response?.data;
},
(err) => {
    if (err?.response?.status === 404) {
        throw new Error(
          err.response?.data?.message || `${err.config.url} not found`
        );
    }
});
