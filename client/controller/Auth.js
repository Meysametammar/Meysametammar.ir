const APPNAME = process.env.APPNAME;

const login = token => {
    localStorage.setItem(`${APPNAME}_token`, token);
    console.log(is_in());
    console.log(localStorage.getItem(`${APPNAME}_token`));
};

const logout = () => {
    localStorage.clear();
};

const token = () => {
    return localStorage.getItem(`${APPNAME}_token`);
};

const is_in = () => {
    let check = false;
    if (typeof window !== "undefined") {
        check = localStorage.getItem(`${APPNAME}_token`) !== null;
    }
    return check;
};

export default {
    login,
    logout,
    token,
    is_in
};
