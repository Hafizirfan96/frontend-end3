import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import userService from "../../api/user.service";

export const useFetchUser = (userId) => {
    return useQuery({
        queryKey: ["user-single", userId],
        queryFn: () => userService.fetchSingleUser(userId),
        enabled: false
    });
};


export const useFetchUsers = () => {
    return useMutation({
      mutationFn: (data) => userService.fetchAllUser(data),
      onSuccess: (response) => response,
      onError: (error) => console.log("error", error)
    });
  };


export const useAddUser = () => {
    return useMutation({
        mutationFn: (data) => userService.addUser(data),
        onSuccess: (response) => response,
        onError: (error) => console.log("error", error)
    });
};

export const useEditUser = () => {
    return useMutation({
        mutationFn: (data) => userService.editUser(data),
        onSuccess: (response) => response
         ,
        onError: (error) => console.log("error", error)
    });
};

export const useEditUserProfileImage = () => {
    // const queryClient = useQueryClient();
    return useMutation({
        mutationFn: (data) => userService.editUserProfileImage(data),
        onSuccess: (response) =>  response,
        onError: (error) => console.log("error", error)
    });
};

export const useDeleteUser = () => {
    const queryClient = useQueryClient();
    return useMutation({
        mutationFn: (id) => userService.deleteUser(id),
        onSuccess: (response, id) => {
            if (response.isSuccess) {
                queryClient.setQueryData(["users"], (oldData) => {
                    if (!oldData) {
                        queryClient.invalidateQueries(["users"], { exact: true });
                    } else {
                        const returnData = {
                            ...oldData,
                            data: {
                                ...oldData.data,
                                subRoles: oldData.data.users.filter((user) => user._id !== id)
                            }
                        };
                        return returnData;
                    }
                });
            }
        },
        onError: (error) => console.log("error", error)
    });
};

export const useChangePassword = () => {
    return useMutation({
        mutationFn: (data) => userService.changePassword(data),
        onSuccess: (response) => response,
        onError: (error) => console.log("error", error)
    });
};


export const useFetchAdminDashboard = () => {

    return useMutation({
        mutationFn: (data) => userService.fetchAdminDashboard(data),
        onSuccess: (response) => response,
        onError: (error) => console.log("error", error)
    });
};