import { useMutation } from "@tanstack/react-query";
import accountService from "../../api/account.service";

export const useFetchVault = () => {
    return useMutation({
        mutationFn: (data) => accountService.fetchVault(data),
        onSuccess: (response) => response,
        onError: (error) => console.log("error", error)
    });
};

