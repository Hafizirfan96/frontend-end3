import { Route, Routes, Navigate } from "react-router-dom";
import { Suspense } from "react";
import { AnimatePresence } from "framer-motion";
import PageTransition from "../../components/containers/PageTransition";
import PageLoading from "../../components/templates/loadings/PageLoading";

import AdminDashboard from "@/admin/pages/AdminDashboard";
import AdminLogin from "@/admin/pages/AdminLogin";
import AdminInstitutes from "@/admin/pages/AdminInstitutes";

const ProtectedRoute = () => {
  return (
    <AnimatePresence mode="wait">
      <Routes>
        <Route path="/" element={<Navigate to="institutes" replace />} />

       
        <Route
          path="institutes"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <AdminInstitutes />
              </Suspense>
            </PageTransition>
          }
        />

        {/* Admin Login Page */}
        <Route
          path="login"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <AdminLogin />
              </Suspense>
            </PageTransition>
          }
        />

        {/* 404 fallback */}
        <Route path="*" element={<h2>PAGE NOT FOUND</h2>} />
      </Routes>
    </AnimatePresence>
  );
};

export default ProtectedRoute;
