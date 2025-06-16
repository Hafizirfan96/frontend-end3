import { Routes, Route } from 'react-router-dom';
import AdminLogin from '@/admin/pages/AdminLogin';
import AdminDashboard from '@/admin/pages/AdminDashboard';
import ProtectedRoute from '@/routes/route/ProtectedRoute';
import PageTransition from '@/components/containers/PageTransition';
import ProtectedContainer from '@/components/containers/ProtectedContainer';

const AdminRoutes = () => {
  return (
    <Routes>
      {/* <Route path="/" element={<AdminLogin />} />
      <Route path="dashboard" element={<AdminDashboard />} /> */}

       <Route
            path="/*"
            element={
              <PageTransition>
                <ProtectedContainer>
                  <ProtectedRoute />
                </ProtectedContainer>
              </PageTransition>
            }
          />
       
    </Routes>
  );
};

export default AdminRoutes;
