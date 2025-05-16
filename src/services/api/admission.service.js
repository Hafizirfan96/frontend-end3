import ResponseModal from "../../utils/responseModal";

class AdmissionService extends ResponseModal {
    constructor(name) {
        super(name);
    }

    async fetchAdmissionData(id) {
        const response = await this.handleApi("get", `/api/?page=1&limit=10`);
        return response;
    }
     
}

const admissionService = new AdmissionService("/admission");

export default admissionService;