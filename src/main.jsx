import ReactDOM from "react-dom/client";
import App from "./App.jsx";
import "./index.css";
import { Provider } from "react-redux";
import { store } from "./store/store";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { GoogleOAuthProvider } from "@react-oauth/google";

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      refetchOnWindowFocus: false,
      refetchOnMount: false,   
    }
  }
});


ReactDOM.createRoot(document.getElementById("root")).render(
  <GoogleOAuthProvider clientId='221174789346-re73sfbuhrbi1vr12bup6u2n6ql9k8e4.apps.googleusercontent.com'>
  {/* <React.StrictMode> */}
    <Provider store={store}>
      <QueryClientProvider client={queryClient}>
        <App />
        {/* <ReactQueryDevtools initialIsOpen={false} /> */}
      </QueryClientProvider>
    </Provider>
  {/* </React.StrictMode> */}
  </GoogleOAuthProvider>
);
