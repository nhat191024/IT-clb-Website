import axios from "axios";
import { useRouter } from 'vue-router';

const router = useRouter();

const token = localStorage.getItem("Token");

export const Api = axios.create({
    baseURL: 'http://localhost:8000/api/v1',
    timeout: 5000,
    headers: {
        "Content-Type": 'application/json',
        'Accept': 'application/json',
        'Authorization': `Bearer ${token}`
    }
});

export async function logout() {
    try {
        const response = await Api.post('/logout');

        if (response.data.Message == 'Logout') {
            localStorage.removeItem('Token');
            document.cookie = `Role=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;
            document.cookie = `Id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;

            return 'success';
        }

    } catch (err) { }

}

export async function handledLogin(username, password) {
    try {
        let date = new Date();
        const expires = new Date(date.getTime() + 2 * 60 * 60 * 1000);
        const response = await Api.post('/login', {
            username: username,
            password: password
        });
        if (response.data.Message == 'Login successful') {
            localStorage.setItem('Token', response.data.Token);
            document.cookie = `Role=${response.data.Role}; expires=${expires.toUTCString}; path=/`;
            document.cookie = `Id=${response.data.Id}; expires=${expires.toUTCString}; path=/`;
            return 'success';
        }
    } catch (err) {
        if (err.response.status === 401) {
            return 'fail';
        }
    }
}

export function getCookie(cookieName) {
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');

    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}

export async function isLogged() {
    const token = localStorage.getItem('Token');
    if (!token) {
        router.push('/login');
    }
}


export async function getMemberDataById(id) {
    try {
        const response = await Api.get(`/members/${id}`);

        if (response.data.Message === 'success') {
            return response.data.user
        }
    } catch (err) {
        if (err.response.status === 500) {
            return 'fail';
        }
    }
}

export async function getAllMember() {
    try {
        const response = await Api.get(`/members`);

        if (response.data.Message === 'success') {
            // return response.data.user
            return response
        }
    } catch (err) {
        if (err.response.status === 500) {
            return 'fail';
        }
    }
}

export async function checkNumMemInPrj(id) {
    try {
        const response = await Api.get(`/projectMembers/${id}`);

        if (response.data.Message === 'success') {
            return response.data
        }

    } catch (err) {
        if (err.response.status === 500) {
            return 'fail';
        }
    }
}

export async function CountTask(id) {
    try {
        const response = await Api.get(`/quantity?Project[eq]=${id}`);

        return response;

    } catch (err) {
        if (err.response.status === 500) {
            return 'fail';
        }
    }
}

export async function DeleteProject(id) {
    try {
        const response = await Api.get(`/projectsDelete/${id}`);

        return response;
    } catch (err) { }
}

export async function DeleteMember(id) {
    try {
        const response = await Api.get(`/membersDelete/${id}`);

        return response;
    } catch (err) { }
}

export async function UpdateProject(id, name, leader, startDate, endDate, projectSrc, status) {
    try {
        const response = await Api.patch(`/projects/${id}`, {
            Name: name,
            Leader: leader,
            StartDate: startDate,
            EndDate: endDate,
            ProjectSrc: projectSrc,
            Status: status
        });

        return response;

    } catch (err) {
        return err;
    }
}

export async function UpdateMember(id, name, leader, startDate, endDate, projectSrc, status) {
    try {
        const response = await Api.patch(`/projects/${id}`, {
            Name: name,
            Leader: leader,
            StartDate: startDate,
            EndDate: endDate,
            ProjectSrc: projectSrc,
            Status: status
        });

        return response;

    } catch (err) {
        return err;
    }
}

export async function CreateProject(id, name, leader, startDate, endDate, projectSrc, status) {
    try {
        const response = await Api.post('/projects', {
            Id: id,
            Name: name,
            Leader: leader,
            StartDate: startDate,
            EndDate: endDate,
            ProjectSrc: projectSrc,
            Status: status
        });

        return response;

    } catch (err) {
        return err;
    }
}

export async function CreateMember(id, name, leader, startDate, endDate, projectSrc, status) {
    try {
        const response = await Api.post('/projects', {
            Id: id,
            Name: name,
            Leader: leader,
            StartDate: startDate,
            EndDate: endDate,
            ProjectSrc: projectSrc,
            Status: status
        });

        return response;

    } catch (err) {
        return err;
    }
}