import axios from "axios";
import { apiUrl } from "../constant/api-url";

const axiosInstance = axios.create({
    baseURL: apiUrl.publicUrl.baseUrl + apiUrl.publicUrl.apiPrefix,
    headers: {
        Accept: "application/json",
    },
});
const axiosInstanceToken = axios.create({
    baseURL:  apiUrl.publicUrl.apiPrefix,
    headers: {
        Accept: "application/json",
    },
});

const tokenSPAVerify = async ( ) =>{
    const tokenResponse = await axiosInstanceToken.get(apiUrl.publicUrl.tokenSPA);
    return  tokenResponse.data.token;
}
export default axiosInstance ;


export { tokenSPAVerify , axiosInstanceToken };
