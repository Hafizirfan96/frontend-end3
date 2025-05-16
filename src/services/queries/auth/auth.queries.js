import { useNavigate } from "react-router-dom";
import { useMutation, useQuery } from "@tanstack/react-query";
import authService from "@/services/api/auth.service";
import useFetchCurrentUser from "@/utils/currentUser";

export const useLogin = () => {
    /**
     * Navigate
     */
    const navigate = useNavigate();

    const { mutate: fcmMutate } = useSetFCM();
    const { fetchCurrentUser } = useFetchCurrentUser();

    return useMutation({
        mutationFn: (data) => authService.login(data),
        onSuccess: async (response) => {
            const { data, isSuccess } = response;
            if (isSuccess) {
                if (data?.token) {
                    const currentUser = await fetchCurrentUser(data);

            

                    navigate("/");
                }
            }
            return response;
        },
        onError: (error) => console.log("error", error),
    });
};

export const useSignUp = () => {
    return useMutation({
        mutationFn: (data) => authService.singUp(data),
        onSuccess: (data) => data,
        onError: (error) => console.log(error),
    });
};

export const useForgetPassword = () => {
    return useMutation({
        mutationFn: (data) => authService.forgetPassword(data),
        onSuccess: (data) => data,
        onError: (error) => console.log(error),
    });
};

export const useForgetPasswordOTP = () => {
    return useMutation({
        mutationFn: (data) => authService.forgetPasswordOTP(data),
        onSuccess: (data) => data,
        onError: (error) => console.log(error),
    });
};

export const useGetAllChef = () => {
    return useQuery({
        queryKey: ["all-chef"],
        queryFn: () => authService.getchef({}),
      });
};

export const useLogout = () => {
    return useMutation({
        mutationFn: (data) => authService.logout(data),
        onSuccess: (response) => response,
        onError: (error) => console.log(error),
    });
};

export const useSetFCM = () => {
    return useMutation({
        mutationFn: (data) => authService.setFCM(data),
        onSuccess: (data) => data,
        onError: (error) => console.log(error),
    });
};

export const useVerifyUser = () => {
    /**
     * Navigate
     */
    const navigate = useNavigate();
    const { mutate: fcmMutate } = useSetFCM();
    const { fetchCurrentUser } = useFetchCurrentUser();
    return useMutation({
        mutationFn: (data) => authService.verifyUser(data),
        onSuccess: async (response) => {
            const { data, isSuccess } = response;

            if (isSuccess) {
                if (data?.result?.token) {
                    const currentUser = await fetchCurrentUser(data?.result);
                    // const fcmToken = await requestForToken();

                    // if (currentUser?._id && fcmToken) {
                    //     const body = {
                    //         id: currentUser?._id,
                    //         FCM: fcmToken,
                    //     };
                    //     fcmMutate(body);
                    // }

                    navigate("/");
                }
            }
            return response;
        },
        onError: (error) => console.log(error),
    });
};