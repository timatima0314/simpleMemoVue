import axios,{AxiosResponse} from 'axios';
import { SimpleMemo } from '../type/type';
//DB:simpleMemoのデータ取得
const get = async () => {
    const { data } = await axios.get(`/api/simple-memo`);
    return data;
};

//DB:simpleMemoのデータ作成
const create = async (contentVal: string, currentUserId: number | undefined) => {
    const { data } = await axios.post(`/api/simple-memo`, {
        content: contentVal,
        user_id: currentUserId,
    });
    return data;
};

//DB:smpleMemoのデータ更新
const update = async (id: number, contentVal: string,) => {
    const { data } = await axios.patch(`/api/simple-memo/${id}`, {
        content: contentVal,
    });
    return data;
};

const destroy = async (id: number) => {
    const { data } = await axios.delete<SimpleMemo>(`/api/simple-memo/${id}`);
    return data;
}
export { get, create, update, destroy }