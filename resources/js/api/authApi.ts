import axios, { AxiosResponse } from 'axios';
import { UserData } from '../type/type';

const singUp = async (nameVal: string, emailVal: string, passwordVal: string) => {
    await axios
        .post<AxiosResponse | UserData>("/api/singUp", {
            name: nameVal,
            email: emailVal,
            password: passwordVal,
        })
};

const login = async (emailVal: string, passwordVal: string) => {
    await axios
        .post<AxiosResponse | UserData>("/api/login", {
            email: emailVal,
            password: passwordVal,
        })
};

const logout = async () => {
    await axios.post<AxiosResponse | UserData>("/api/logout")
};

const getAuth = async () => {
    const { data } = await axios.get<UserData>('/api/user')
    return data
}

const loginRecord = async (id: number) => {
    await axios.post(`/api/authenticated`, { user_id: id });
};

export { login, logout, singUp, getAuth, loginRecord }