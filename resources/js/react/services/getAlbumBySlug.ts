import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";

export async function getAlbumBySlug(slug: string) {
    const token: string = await tokenSPAVerify();

    return await axiosInstance.get(
        `${apiUrl.publicUrl.albums}/${slug}`, {
            headers: {
                "Authorization": token,
            },
        }
    );
}
