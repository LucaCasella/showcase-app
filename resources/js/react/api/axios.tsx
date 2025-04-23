import axios from "axios";
import { apiUrl } from "../constant/api-url";

const axiosInstance = axios.create({
    baseURL: apiUrl.publicUrl.apiPrefix,
    headers: {
        Accept: "application/json",
    },
});


const tokenSPAVerify = async ( ) =>{
    const tokenResponse = await axiosInstance.get(apiUrl.publicUrl.tokenSPA);
    return  tokenResponse.data.token;
}
const tokenSPAVerifyAbsolute = async ( ) =>{

    const tokenResponse = await axios.get(

        `/${apiUrl.publicUrl.apiPrefix}${apiUrl.publicUrl.tokenSPA}`, {
            headers: {
                Accept: "application/json",
            },
        }
    );

    return  tokenResponse.data.token;
}
export default axiosInstance;
export { tokenSPAVerify, tokenSPAVerifyAbsolute};
