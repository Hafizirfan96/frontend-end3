// import { CURRENT_USER_STORAGE_KEY } from "@/config";
import ResponseModal from "@/utils/responseModal";


class AuthService extends ResponseModal {
    constructor(name) {
        super(name);
    }

    async login(data) {
        const response = await this.handleApi("post", "/chef/login", data);
        return response;
    }

    async singUp(data) {
        return await this.handleApi("post", "/add/client", data, true);
    }

    async forgetPassword(data) {
        return await this.handleApi("post", "/email/resetPassword", data, true);
    }

    async forgetPasswordOTP(data) {
        return await this.handleApi("post", "/resetPassword", data, true);
    }

    async logout(data) {
        // localStorage.removeItem(CURRENT_USER_STORAGE_KEY);
        return await this.handleApi("post", "/logout", data, true);
    }

    async setFCM(data) {

        return await this.handleApi("post", "/setFCM", data);
    }

    async verifyUser(data) {

        return await this.handleApi("post", "/verifyEmail", data);
    }
    async getchef(data) {
        return await this.handleApi("post", "/allChefForCustomer", data);
    }
}

const authService = new AuthService("/auth");

export default authService;