import axios from 'axios';

const singUp = async (nameVal, emailVal, passwordVal) => {
    await axios
        .post("/api/singUp", {
            name: nameVal,
            email: emailVal,
            password: passwordVal,
        })
};

const login = async (emailVal, passwordVal) => {
    await axios
        .post("/api/login", {
            email: emailVal,
            password: passwordVal,
        })
};

const logout = async () => {
    await axios.post("/api/logout")
};

const getAuth = async () => {
   const {data}= await axios.get('/api/user')
    return data
}

export { login, logout, singUp, getAuth }