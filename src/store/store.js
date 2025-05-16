import { configureStore } from "@reduxjs/toolkit";

import templateReducer from "./slices/templateSlice";
import userReducer from "./slices/userSlice";
export const store = configureStore({
  reducer: {
    templates: templateReducer,
    users: userReducer
  }
});
