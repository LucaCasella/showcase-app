import axios from "axios";
import { apiUrl } from "../constant/api-url";

const axiosInstance = axios.create({
    baseURL: apiUrl.publicUrl.baseUrl + apiUrl.publicUrl.apiPrefix,
    withCredentials: true,
    withXSRFToken: true,
    headers: {
        Accept: "application/json",
    },
});

export default axiosInstance;
