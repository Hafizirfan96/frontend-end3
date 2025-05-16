import { decodedToken } from "./jwtValidator";
// import { CURRENT_USER_STORAGE_KEY } from "../config";
import { useFetchUser } from "../services/queries/protected/user.queries";
import { useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import { setCurrentUser } from "../store/slices/userSlice";
const useFetchCurrentUser = () => {
  const [userId, setUserId] = useState(null);

  const { data: currentUserData, refetch } = useFetchUser(userId);
  const dispatch = useDispatch();
  useEffect(() => {
    if (currentUserData?.isSuccess) {
      
      dispatch(setCurrentUser(currentUserData.data?.user));
    }
  }, [currentUserData, dispatch]);
  
  useEffect(() => {
    if(userId)
    refetch(userId);
  }, [userId]);

  const fetchCurrentUser = async (apiData) => {
    let data = apiData;
    if (!data) {
      // const storageData = await localStorage.getItem(CURRENT_USER_STORAGE_KEY);
      data = await JSON.parse(storageData);
    }
    if (data) {
      const nToken = data.token;
      const currUser = await decodedToken(nToken);
      if (!currUser) return null;
      setUserId(currUser?._id);

      const jsonData = JSON.stringify(data);
      localStorage.setItem(CURRENT_USER_STORAGE_KEY, jsonData);
      return currUser;
    }
    return null;
  };

  return { fetchCurrentUser };
};

export default useFetchCurrentUser;

// export const fetchCurrentUser = async (apiData) => {
//   let data = apiData;
//   if (!data) {
//     const storageData = await localStorage.getItem(CURRENT_USER_STORAGE_KEY);
//     data = await JSON.parse(storageData);
//   }
//   if (data) {
//     const nToken = data.token;
//     const currUser = await decodedToken(nToken);
//     if (!currUser) return null;
//     let currentUser = await axios.get(`${SERVER_PATH}/user/${currUser?._id}`, {
//       headers: {
//         Authorization: `Bearer ${data?.token}`,
//       },
//     });
//     currentUser = currentUser?.data?.data?.user;
//     if (!currentUser) return null;
//     const jsonData = JSON.stringify(data);
//     localStorage.setItem(CURRENT_USER_STORAGE_KEY, jsonData);
//     return currentUser;
//   }
//   return null;
// };
