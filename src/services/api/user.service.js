import ResponseModal from "../../utils/responseModal";

class UserService extends ResponseModal {
    constructor(name) {
        super(name);
    }

    async fetchSingleUser(id) {
        const response = await this.handleApi("get", `/single/${id}`);
        return response;
    }

    async fetchAllUser(data) {
        const response = await this.handleApi(
            "post",
            `/all`,data
        );
        return response;
    }

    async addUser(data) {
        delete data.Role;
        const response = await this.handleApi("post", `/register`, data);
        return response;
    }

    async editUser(data) {
        const id = data.id;
        delete data.id;
        delete data.Role;
        const response = await this.handleApi("patch", `/update/${id}`, data);
        return response;
    }
    async editUserProfileImage(data) {
        const id = data.id;

        const response = await this.handleApi("patch", `/update/${id}`, data.data);
        return response;
    }

    async deleteUser(id) {
        const response = await this.handleApi("delete", `/delete/${id}`);
        return response;
    }

    async changePassword(data) {
        const response = await this.handleApi("post", `/updatePassword`, data);
        return response;
    }

    async fetchAdminDashboard() {
            const response = await this.handleApi("post", `/dashboard/admin`);
            return response;
        }
      
}

const userService = new UserService("/user");

export default userService;