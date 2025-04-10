import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";

export async function getAlbumsByType(type?: string | string[]) {
    const token: string = await tokenSPAVerify();

    return await axiosInstance.get(
        apiUrl.publicUrl.albums, {
            headers: {
                "Authorization": token,
            },
            params: {type: type},
        }
    );
}
