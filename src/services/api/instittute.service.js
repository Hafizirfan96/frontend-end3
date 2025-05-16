import ResponseModal from "../../utils/responseModal";

class InstittuteService extends ResponseModal {
    constructor(name) {
        super(name);
    }

    async fetchAdmissionData(id) {
        const response = await this.handleApi("get", `/api/?page=1&limit=10`);
        return response;
    }
     
}

const instituteService = new InstittuteService();

export default instituteService;