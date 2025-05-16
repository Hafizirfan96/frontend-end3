import { decodeToken, isExpired } from "react-jwt";

// export const validateJWT = (token) => {
//   if (token) {
//     console.log("TOken2",token);
//     if (!isExpired(token)) return true;
//     console.log("TOken3",token);
//   }
//   return false;
// };

export const decodedToken = (token) => {
  if (!token) return null;

  // if (!validateJWT(token)) return null;

  const data = decodeToken(token);

  if (data) {
    return data;
  }
  return null;
};
