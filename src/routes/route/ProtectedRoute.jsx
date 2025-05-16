import { useSelector } from "react-redux";
import { Suspense, useEffect } from "react";
import { AnimatePresence } from "framer-motion";
import useIdleLogout from "@/hooks/useIdleLogout ";
import {
   Favorite, Restaurants, MainMenu,
  SingleRestaurant, ProfileScreen, CheckOut
} from ".";
import { Route, Routes, useNavigate } from "react-router-dom";
import PageTransition from "@/components/containers/PageTransition";
import PageLoading from "@/components/templates/loadings/PageLoading";
import { useLogout } from "@/services/queries/auth/auth.queries";
import {
  CURRENT_USER_STORAGE_KEY,
  SESSION_EXPIRY_MINUTES,
  SESSION_EXPIRY_SECONDS,
} from "@/config";

const ProtectedRoute = () => {
  const { currentUser } = useSelector((state) => state.users);
  const { mutate: logoutMutate, data: logoutData } = useLogout();
  const navigate = useNavigate();


  const onLogout = () => {
    logoutMutate({ id: currentUser?._id });
  };
  useIdleLogout(
    onLogout,
    parseInt(SESSION_EXPIRY_MINUTES) * parseInt(SESSION_EXPIRY_SECONDS) * 1000
  );

  useEffect(() => {
    if (logoutData) {
      localStorage.removeItem(CURRENT_USER_STORAGE_KEY);
      navigate("/auth/sign-in");
    }
  }, [logoutData]);

  /**
   * Routes
   */
  return (
    <AnimatePresence mode="wait">
      <Routes>
      

        <Route
          path="/favorite"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <Favorite />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/restaurants"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <Restaurants />
              </Suspense>
            </PageTransition>
          }
        />
        {/* <Route
          path="/mainMenu"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <MainMenu />
              </Suspense>
            </PageTransition>
          }
        /> */}
        <Route
          path="/singleRestaurant"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <SingleRestaurant />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/profileScreen"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ProfileScreen />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/checkOut"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <CheckOut />
              </Suspense>
            </PageTransition>
          }
        />
        <Route path="/*" element={<h2>PAGE NOT FOUND</h2>} />
      </Routes>
    </AnimatePresence>
  );
};

export default ProtectedRoute;
