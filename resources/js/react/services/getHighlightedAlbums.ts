import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";

export async function getHighlightedAlbums(highlight: boolean, type?: string | string[]) {
    const token: string = await tokenSPAVerify();

    return await axiosInstance.get(
        apiUrl.publicUrl.highlightedAlbums, {
            headers: {
                "Authorization": token,
            },
            params: {highlight: highlight, type: type},
        }
    );
}
