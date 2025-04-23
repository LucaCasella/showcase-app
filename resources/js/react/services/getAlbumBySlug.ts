import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import axios from "axios";

export async function getAlbumBySlug(slug: string) {
    const token: string = await tokenSPAVerify();

    return await axios.get(
        `/${apiUrl.publicUrl.apiPrefix}${apiUrl.publicUrl.albums}/${slug}`, {
            headers: {
                "Authorization": token,
            },
        }
    );
}
