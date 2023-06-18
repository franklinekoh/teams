import axios from 'axios'

export const API = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
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
