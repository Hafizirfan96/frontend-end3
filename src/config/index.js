/**
 * Server Path
 */
const SERVER_PROTOCOL = import.meta.env.VITE_SERVER_PROTOCOL || "http";
const SERVER_HOST = import.meta.env.VITE_SERVER_HOST;


export const SERVER_PATH = `${SERVER_PROTOCOL}://${SERVER_HOST}`;
export const SERVER_PATH_WITHOUT_API = `${SERVER_PROTOCOL}://${SERVER_HOST}`;

/**
 * Current User store in browser key
 */
export const CURRENT_USER_STORAGE_KEY =
  import.meta.env.VITE_CURRENT_USER_STORAGE_KEY// ||
 // "yaoz23dsv21fScasASFasvOX5pua7mBln";

/**
 * JWT Key
//  */
// export const JWT_CODE = import.meta.env.VITE_JWT_CODE// || "LetmeCreate@JWT";
// export const SESSION_EXPIRY_MINUTES=import.meta.env.VITE_SESSION_EXPIRY_MINUTES
// export const SESSION_EXPIRY_SECONDS=import.meta.env.VITE_SESSION_EXPIRY_SECONDS
