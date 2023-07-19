import axios from 'axios';

type simpleMemo = {
    id: number;
    content: string;
    created_at: Date;
    updated_at: Date;
};

//DB:simpleMemoのデータ取得
const get = async () => {
    const { data } = await axios.get<simpleMemo>(`/api/simple-memo`);
    return data;
};

//DB:simpleMemoのデータ作成
const create = async ( contentVal:string ) => {
    const { data } = await axios.post<simpleMemo>(`/api/simple-memo`, {
        content: contentVal,
        user_id: 1,
    });
    return data;
};

export { get, create }