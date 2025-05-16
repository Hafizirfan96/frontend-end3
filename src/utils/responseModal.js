import axios from "axios";
import { CURRENT_USER_STORAGE_KEY, SERVER_PATH } from "../config/index";
import { toast } from "react-toastify";
const BASE_URL = SERVER_PATH;

export default class ResponseModal {
  #api;
  name;
  constructor(name) {
    this.name = name;

    this.#api = axios.create({
      baseURL: `${BASE_URL}${name}`,
    });

    this.#api.interceptors.response.use(
      (response) => response,
      async (error) => {
        if (error.response?.status === 403) {
          localStorage.removeItem(CURRENT_USER_STORAGE_KEY);
          window.location.reload();
        }
        if (error.response?.status === 417) {
          try {
            const storageData = localStorage.getItem(CURRENT_USER_STORAGE_KEY);
            if (storageData) {
              const parseData = JSON.parse(storageData);

              const refreshToken = parseData?.refreshToken;

              const rep = await axios.post(`${BASE_URL}/auth/refreshToken`, {
                refreshToken: refreshToken,
              });

              const newToken = rep.data.data;

              this.#api.defaults.headers.common[
                "Authorization"
              ] = `Bearer ${newToken.token}`;

              const newStorageData = {
                ...parseData,
                token: newToken.token,
                refreshToken: newToken.refreshToken,
              };

              localStorage.setItem(
                CURRENT_USER_STORAGE_KEY,
                JSON.stringify(newStorageData)
              );

              const originalRequest = error.config;
              originalRequest.headers[
                "Authorization"
              ] = `Bearer ${newToken.token}`;
              return this.#api(originalRequest);
            }
          } catch (tokenError) {
            if (tokenError.response && tokenError.response?.status === 401) {
              localStorage.clear();
              window.location.reload();
            }

            return Promise.reject(tokenError);
          }
        }
        return Promise.reject(error);
      }
    );
  }

  async handleApi(method, url, data, isMessage, header = null) {
    const token =
      this.name === "/auth"
        ? ""
        : JSON.parse(localStorage.getItem(CURRENT_USER_STORAGE_KEY));

    try {
      const response =
        method === "get" || method === "delete"
          ? await this.#api[method](url, {
              headers: {
                Authorization: `Bearer ${token?.token}`,
                header,
              },
            })
          : await this.#api[method](url, data, {
              headers: {
                Authorization: `Bearer ${token?.token}`,
                header,
              },
            });
      if (isMessage) {
        toast.success(response?.data?.message?.text);
      }

      return { data: response.data, isSuccess: true };
    } catch (error) {
      console.log("Error:", error);

      toast.warn(error.response?.data?.message?.text);

      return {
        data: error.response?.data,
        isSuccess: false,
        errors: error.response?.data?.message,
      };
    }
  }
}
