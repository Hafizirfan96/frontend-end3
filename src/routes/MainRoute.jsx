import { Route, Routes } from "react-router-dom";
import PublicLayer from "./layer/PublicLayer";

import { AnimatePresence } from "framer-motion";
import PageTransition from "../components/containers/PageTransition";
import DashboardPage from "@/pages/authPages/DashboardPages/DashboardPage";
import AboutUs from "@/pages/authPages/AboutUs";
import { Suspense } from "react";
import PageLoading from "@/components/templates/loadings/PageLoading";
import HomePage from "@/pages/authPages/HomePage";
import Institutes from "@/pages/authPages/Institute";
import Jobs from "@/pages/authPages/Jobs";
import ContactUs from "@/pages/authPages/ContactUs";
import TVETSupply from "@/pages/authPages/TVETSupply";
import EmploymentProjections from "@/pages/authPages/EmploymentProjections";
import DistMap from "@/pages/authPages/DistMap";
import TevetExplaination from "@/pages/authPages/TevetExplaination";
import TevtaPage from "@/pages/authPages/TevtaPage";
import GrowthSector from "@/pages/authPages/GrowthSector";
import GrowthSectorDetalis from "@/pages/authPages/GrowthSectorDetalis";
import PVTCPage from "@/pages/authPages/PVTCPage";
import PSDAPage from "@/pages/authPages/PSDAPage";
import PSDFPage from "@/pages/authPages/PSDFPage";
import ProfileDetail from "@/pages/authPages/ProfileDetail";
import ForEmployer from "@/pages/authPages/ForEmployer";
import ForGraduate from "@/pages/authPages/ForGraduate";
import VideoPlayer from "@/pages/authPages/VideoPlayer";

const MainRoute = () => {
  return (
    <AnimatePresence mode="wait">
      <Routes>
        <Route element={<PublicLayer />}>
       
           <Route
          path="/"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <DashboardPage />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/about-us"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <AboutUs />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/home"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <HomePage />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/institutes"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <Institutes />
              </Suspense>
            </PageTransition>
          }
        />
          <Route
          path="/jobs"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <Jobs />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/Contact-us"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ContactUs />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/tvet-supply"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <TVETSupply  />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/employment-projections"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <EmploymentProjections  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/district-map"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <DistMap  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/tevet-detail"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <TevetExplaination  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/tevta-page"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <TevtaPage  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/growth-sector"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <GrowthSector  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/growth-sectordetalis"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <GrowthSectorDetalis  />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/pvtc-page"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <PVTCPage  />
              </Suspense>
            </PageTransition>
          }
        />
         {/* <Route
          path="/psda-page"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <PSDAPage  />
              </Suspense>
            </PageTransition>
          }
        /> */}
        <Route
          path="/psdf-page"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <PSDFPage  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/profile-detail"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ProfileDetail  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/for-employer"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ForEmployer  />
              </Suspense>
            </PageTransition>
          }
        />
        <Route
          path="/for-graduate"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <ForGraduate  />
              </Suspense>
            </PageTransition>
          }
        />
         <Route
          path="/video-player"
          element={
            <PageTransition>
              <Suspense fallback={<PageLoading />}>
                <VideoPlayer  />
              </Suspense>
            </PageTransition>
          }
        />
        </Route>
        
      </Routes>
    </AnimatePresence>
  );
};

export default MainRoute;
