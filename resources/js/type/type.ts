type SimpleMemo = {
    id: number,
    content: string,
    created_at: number,
    updated_at: number
}

type UserData = {
    id: number;
    name: string;
    email: string;
    email_verified_at: Date;
    created_at: Date;
    updated_at: Date;
};

export { SimpleMemo, UserData }