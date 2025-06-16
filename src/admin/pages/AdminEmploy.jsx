import { useCallback, useEffect } from "react";
import HCard from "@/components/templates/cards/HCard";
import PackageCard from "@/components/templates/cards/PackageCard";
import SmallCard from "@/components/templates/cards/SmallCard";
import BarChart from "@/components/templates/charts/BarChart";
import DoughnutChart from "@/components/templates/charts/DonutChart";
import HBarChart from "@/components/templates/charts/HBarChart";
import LineChart from "@/components/templates/charts/LineChart";
import CardHeading from "@/components/templates/titles/CardHeading";
import PageHeading from "@/components/templates/titles/PageHeading";
import { useFetchAdminDashboard } from "@/services/queries/protected/user.queries";
import CardContainer from "@/components/containers/CardContainer";
import SideNav from "@/components/templates/sideNav/SideNav";
import Header from "@/pages/authPages/DashboardPages/Components/Header";
import { useSelector } from "react-redux";


const totalData = [
  { title: "Total Jobs", total: 55, percent: +8.2, clr: "#f8d065" },
  { title: "Complete Jobs", total: 35, percent: +8.2, clr: "#b78b16" },
  { title: "In Progress Jobs", total: 4, percent: +8.2, clr: "#d8b454" },
  { title: "Cancelled Jobs", total: 3, percent: -6.5, clr: "#836a29" }
];


const AdminDashboard = () => {
  const { data: adminDashboardData, mutate: fetchAdminDashboardMutate } = useFetchAdminDashboard()
  const { counts,barChartCount,scheduledJobs } = adminDashboardData?.data?.data || { counts: [],scheduledJobs:[],barChartCount:[] };

  const fetchAdminDashboard = useCallback(() => {
    fetchAdminDashboardMutate()
  }, [fetchAdminDashboardMutate])
  useEffect(() => {
    fetchAdminDashboard()
  }, [fetchAdminDashboard])
    const { toggleNav } = useSelector((state) => state.templates);

  return (
    <>
    <main className={`relative w-full min-h-screen `}>
      <SideNav />
     
    </main>
    </>
  );
};

export default AdminDashboard;



