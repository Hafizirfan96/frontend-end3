import { Navigate, Outlet } from "react-router-dom";
// import { CURRENT_USER_STORAGE_KEY } from "../../config";
import useFetchCurrentUser from "../../utils/currentUser";
import { useCallback, useEffect } from "react";
import { setCurrentUser } from "@/store/slices/userSlice";

const ProtectedLayer = () => {
  // const user = localStorage.getItem(CURRENT_USER_STORAGE_KEY);
  // const { fetchCurrentUser } = useFetchCurrentUser();
  // const fetchingCurrentUser = useCallback(async () => {
  //   const currentUser =
  //   await fetchCurrentUser();
  //   if (currentUser) {
  //     dispatch(setCurrentUser(currentUser));
  //   }
  // }, []);
  // useEffect(() => {

  //   if(user)
  //     fetchingCurrentUser();
  //   }, [user]);
  // return user ? (
  //   <>
  //     <Outlet />
  //   </>
  // ) : (
  //   <Navigate to={"/auth/sign-in"} />
  // );
  return <Outlet />

};

export default ProtectedLayer;
