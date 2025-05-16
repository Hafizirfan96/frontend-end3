import { useMemo } from "react";

import { MdDashboard, MdOutlinePriceChange, MdRealEstateAgent } from "react-icons/md";
import { FcSurvey } from "react-icons/fc";
import { v4 as uuid } from "uuid";
import { BsTelephoneForwardFill } from "react-icons/bs";
import {
  FaAddressBook,
  FaCity,
  FaHouseLaptop,
  FaListCheck,
  FaUsers,
  FaUserShield,
  FaUserTag
} from "react-icons/fa6";
import { FaRegFileAlt } from "react-icons/fa";
import {GiNotebook } from "react-icons/gi"
import { LuChartNoAxesCombined } from "react-icons/lu";
import { BiWorld } from "react-icons/bi";
import { GrTransaction } from "react-icons/gr";
import { TbLogs } from "react-icons/tb";

const useSideNav = () => {
  const navList = useMemo(() => {
    return [
      {
        id: uuid(),
        title: "Dashboard",
        url: "/",
        logo: <MdDashboard />
      },
      // {
      //   id: uuid(),
      //   title: "Roles",
      //   url: "/roles",
      //   logo: <FaUserShield />
      // },
      {
        id: uuid(),
        title: "Sub Roles",
        url: "/sub-roles",
        logo: <FaUserTag />
      },
      {
        id: uuid(),
        title: "Users",
        url: "/users",
        logo: <FaUsers />
      },
      {
        id: uuid(),
        title: "Print Shop",
        url: "/print-shops",
        logo: <FaHouseLaptop />
      },
      {
        id: uuid(),
        title: "Price Plan",
        url: "/price-plans",
        logo: <MdOutlinePriceChange />
      },
      {
        id: uuid(),
        title: "Jobs",
        url: "/jobs",
        logo: <FaRegFileAlt />
      },
      {
        id: uuid(),
        title: "Check List Item",
        url: "/check-list-items",
        logo: <FaListCheck />
      }, 
      {
        id: uuid(),
        title: "Payment Ledger",
        url: "/ledger",
        logo: <GiNotebook />
      },
      {
        id: uuid(),
        title: "Transactions",
        url: "/transaction/list",
        logo: <GrTransaction />
      },
      // {
      //   id: uuid(),
      //   title: "Tracking",
      //   url: "/tracking",
      //   logo: <PiPackage />
      // },
      // {
      //   id: uuid(),
      //   title: "Account Settlements",
      //   url: "/account-settlements",
      //   logo: <LuChartNoAxesCombined />
      // },
      
      {
        id: uuid(),
        title: "Address",
        // url: "/address/country",
        logo: <FaAddressBook />,
        dropdown:[
          {
            id: uuid(),
            title: "Country",
            url: "/address/country",
            logo: <BiWorld />
          }, 
          {
            id: uuid(),
            title: "Province",
            url: "/address/province",
            logo: <MdRealEstateAgent />
          }, 
          {
            id: uuid(),
            title: "City",
            url: "/address/city",
            logo: <FaCity />
          }
          
        ]
      },
      {
        id: uuid(),
        title: "Logs",
        url: "/log/list",
        logo: <TbLogs />
      },
    ];
  }, []);

  return navList;
};

export default useSideNav;
