import { useNavigate } from "react-router-dom";
import { useMutation, useQuery } from "@tanstack/react-query";
import admissionService from "@/services/api/admission.service";

export const useAdmission = () => {
  return useQuery({
    queryKey: ["admission"],
    queryFn: () => admissionService.fetchAdmissionData(),
  });
};
