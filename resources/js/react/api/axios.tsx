import axios from "axios";
import { apiUrl } from "../constant/api-url";


// @ts-ignore
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



const axiosInstance = axios.create({
    baseURL: apiUrl.publicUrl.baseUrl + apiUrl.publicUrl.apiPrefix,
    withCredentials: true,
    headers: {
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken
    }
});
// axiosInstance.interceptors.request.use((config) => {
//     const token = localStorage.getItem('token');
//     console.log(token)
//     if (token) {
//         config.headers.Authorization = `Bearer ${token}`;
//     }
//     return config;
// }, (error) => {
//     return Promise.reject(error);
// });

export default axiosInstance;

