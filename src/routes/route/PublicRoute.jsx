import { Route, Routes, useLocation } from "react-router-dom";
import {
  LoginPage,
  SignUpPage,
  ForgetPasswordPage,
  ForgetPasswordOTPPage,
} from ".";
import { Suspense } from "react";
import { AnimatePresence } from "framer-motion";
import PageLoading from "../../components/templates/loadings/PageLoading";
import PageTransition from "../../components/containers/PageTransition";
import DashboardPage from "@/pages/authPages/DashboardPages/DashboardPage";

const PublicRoute = () => {
  const location = useLocation();
  return (
    <AnimatePresence mode="wait">
      <Routes location={location} key={location.pathname}>
        <Route
          path="/sign-in"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <LoginPage />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/sign-up"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <SignUpPage />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/forget-password"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ForgetPasswordPage />
              </Suspense>
            </PageTransition>
          }
        />

        <Route
          path="/forget-password-otp"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ForgetPasswordOTPPage />
              </Suspense>
            </PageTransition>
          }
        />
         {/* <Route
          path="/dashboard"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <DashboardPage />
              </Suspense>
            </PageTransition>
          }
        /> */}
        <Route path="/*" element={<h2>PAGE NOT FOUNDa</h2>} />
      </Routes>
    </AnimatePresence>
  );
};

export default PublicRoute;
