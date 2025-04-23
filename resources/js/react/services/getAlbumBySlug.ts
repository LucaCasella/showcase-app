import axiosInstance, {tokenSPAVerifyAbsolute} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import axios from "axios";

export async function getAlbumBySlug(slug: string) {
    const token: string = await tokenSPAVerifyAbsolute();

    return await axios.get(
        `/${apiUrl.publicUrl.apiPrefix}${apiUrl.publicUrl.albums}/${slug}`, {
            headers: {
                "Authorization": token,
            },
        }
    );
}
