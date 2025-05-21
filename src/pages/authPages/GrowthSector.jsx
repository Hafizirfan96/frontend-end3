import { useEffect, useState } from "react";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import { useNavigate } from "react-router-dom";
import ChartDataLabels from "chartjs-plugin-datalabels";

const GrowthSector = () => {
  const navigate = useNavigate();

  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
    ChartDataLabels
  );

  const showTvetSupply = false;
    const navigatetoPages = (pages) => {
    navigate(pages);
  };

  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center pt-8">
          <div className=" ml-16 ">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028ed"
              width={32}
              height={32}
            >
              <path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152l0 264-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427L0 224c0-17.7 14.3-32 32-32l30.3 0c63.6 0 125.6 19.6 177.7 56zm32 264l0-264c52.1-36.4 114.1-56 177.7-56l30.3 0c17.7 0 32 14.3 32 32l0 203c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"></path>
            </svg>
          </div>

          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            Growth Sector
          </h2>
          <div></div>
        </div>
        <div className="flex px-16  py-8">
          <div className=" p-4">
            <h3
              className=" text-2xl text-white"
              style={
                {
                  // textAlign: "justify",
                  // textJustify: "inter-word",
                }
              }
            >
              Explore an industry you are interested in, or browse through them
              all to see which one might suit you. Check out what skills are in
              demand. Learn about the sectors that make up each Industry group
              and the occupations available in each area. You can also view
              industry specific training stories to inspire and inform you.
            </h3>
          </div>
        </div>
      </div>
      <div className="overflow-x-auto mt-16 bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mx-8">
        <div className="grid grid-cols-3 mt-8  ">
          {[
            {
              id: "/growth-sectordetalis",
              title: "Agriculture",
              bgColor: "bg-[#16a085]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M528 336c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 112c-13.2 0-24-10.8-24-24s10.8-24 24-24 24 10.8 24 24-10.8 24-24 24zm80-288h-64v-40.2c0-14.1 4.7-27.8 13.2-38.8 4.4-5.8 3.6-14.1-1.3-19.5L534.2 37.3c-6.7-7.5-18.3-6.9-24.7 .8C490.6 60.9 480 89.8 480 119.8V160H377.7L321.6 29.1A47.9 47.9 0 0 0 277.5 0H144c-26.5 0-48 21.5-48 48v146.5c-8.6-6.7-21-6.5-28.9 1.5L36 227.1c-8.6 8.6-8.6 22.5 0 31.1l5.1 5.1c-5 9.3-9 18.8-11.9 28.7H22c-12.2 0-22 9.9-22 22v44c0 12.2 9.9 22 22 22h7.1c3 9.9 6.9 19.5 11.9 28.7l-5.1 5.1c-8.6 8.6-8.6 22.5 0 31.1L67.1 476c8.6 8.6 22.5 8.6 31.1 0l5.1-5.1c9.3 5 18.8 9 28.7 11.9V490c0 12.2 9.9 22 22 22h44c12.2 0 22-9.9 22-22v-7.1c9.9-3 19.5-6.9 28.7-11.9l5.1 5.1c8.6 8.6 22.5 8.6 31.1 0l31.1-31.1c8.6-8.6 8.6-22.5 0-31.1l-5.1-5.1c5-9.3 9-18.8 11.9-28.7H330c12.2 0 22-9.9 22-22v-6h80.5c21.9-29 56.3-48 95.5-48 18.6 0 36.1 4.6 51.8 12.2l50.8-50.8c6-6 9.4-14.1 9.4-22.6V192c0-17.7-14.3-32-32-32zM176 416c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80zm22-256h-38V64h106.9l41.2 96H198z" />
                </svg>
              ),
            },
            {
              // id: "/tvet-supply",
              title: "Chemical, Petroleum, Rubber & Plastic Goods ",
              bgColor: "bg-[#8e44ad]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 576 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M528.3 61.3c-11.4-42.7-55.3-68-98-56.6L414.9 8.8C397.8 13.4 387.7 31 392.3 48l24.5 91.4L308.5 167.5l-6.3-18.1C297.7 136.6 285.6 128 272 128s-25.7 8.6-30.2 21.4l-13.6 39L96 222.6 96 184c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 264-16 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l512 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-137.3 0L340 257.5l-62.2 16.1L305.3 352l-66.6 0L265 277l-74.6 19.3L137.3 448 96 448l0-159.2 337.4-87.5 25.2 94c4.6 17.1 22.1 27.2 39.2 22.6l15.5-4.1c42.7-11.4 68-55.3 56.6-98L528.3 61.3zM205.1 448l11.2-32 111.4 0 11.2 32-133.8 0z"></path>
                </svg>
              ),
            },
            {
              // id: "/employment-projections",
              title: "Food, Beverages & Tobacco",
              bgColor: "bg-[#1717c7db]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0 -16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0 -16-16zM58.6 224h394.7c34.6 0 54.6-43.9 34.8-75.9C448 83.2 359.6 32.1 256 32c-103.5 .1-192 51.2-232.2 116.1C4 180.1 24.1 224 58.6 224zM384 112a16 16 0 1 1 -16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1 -16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1 -16 16 16 16 0 0 1 16-16z"></path>
                </svg>
              ),
            },
            // {
            //   id: "/district-map",
            //   title: "District Map",
            //   description:
            //     "Explore district level insights about TVET supply and demand indicators.",
            //   bgColor: "bg-indigo-700",
            //   icon: "🗺️",
            // },
            {
              // id: "/institutes",
              title: "Metal & Metal Products",
              bgColor: "bg-[#2c3e50]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M0 224v272c0 8.8 7.2 16 16 16h80V192H32c-17.7 0-32 14.3-32 32zm360-48h-24v-40c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm137.8-64l-160-106.7a32 32 0 0 0 -35.5 0l-160 106.7A32 32 0 0 0 128 138.7V512h128V368c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16v144h128V138.7c0-10.7-5.4-20.7-14.3-26.6zM320 256c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80zm288-64h-64v320h80c8.8 0 16-7.2 16-16V224c0-17.7-14.3-32-32-32z"></path>
                </svg>
              ),
            },
            {
              // id: "/growth-sector",
              title: "Mineral Products",
              bgColor: "bg-[#2980b9]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 576 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M208 64a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM9.8 214.8c5.1-12.2 19.1-18 31.4-12.9L60.7 210l22.9-38.1C99.9 144.6 129.3 128 161 128c51.4 0 97 32.9 113.3 81.7l34.6 103.7 79.3 33.1 34.2-45.6c6.4-8.5 16.6-13.3 27.2-12.8s20.3 6.4 25.8 15.5l96 160c5.9 9.9 6.1 22.2 .4 32.2s-16.3 16.2-27.8 16.2l-256 0c-11.1 0-21.4-5.7-27.2-15.2s-6.4-21.2-1.4-31.1l16-32c5.4-10.8 16.5-17.7 28.6-17.7l32 0 22.5-30L22.8 246.2c-12.2-5.1-18-19.1-12.9-31.4zm82.8 91.8l112 48c11.8 5 19.4 16.6 19.4 29.4l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-74.9-60.6-26-37 111c-5.6 16.8-23.7 25.8-40.5 20.2S-3.9 486.6 1.6 469.9l48-144 11-33 32 13.7z"></path>
                </svg>
              ),
            },
            {
              // id: "/jobs",
              title: "Other Manufacturing Industries ",
              bgColor: "bg-[#6a5f62]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M475.1 163.8L336 252.3v-68.3c0-18.9-20.9-30.4-36.9-20.2L160 252.3V56c0-13.3-10.7-24-24-24H24C10.7 32 0 42.7 0 56v400c0 13.3 10.7 24 24 24h464c13.3 0 24-10.7 24-24V184c0-18.9-20.9-30.4-36.9-20.2z"></path>
                </svg>
              ),
            },
            {
              // id: "/institutes",
              title: "Paper & Paper Products ",
              bgColor: "bg-[#612929]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 576 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M0 80l0 48c0 17.7 14.3 32 32 32l16 0 48 0 0-80c0-26.5-21.5-48-48-48S0 53.5 0 80zM112 32c10 13.4 16 30 16 48l0 304c0 35.3 28.7 64 64 64s64-28.7 64-64l0-5.3c0-32.4 26.3-58.7 58.7-58.7L480 320l0-192c0-53-43-96-96-96L112 32zM464 480c61.9 0 112-50.1 112-112c0-8.8-7.2-16-16-16l-245.3 0c-14.7 0-26.7 11.9-26.7 26.7l0 5.3c0 53-43 96-96 96l176 0 96 0z"></path>
                </svg>
              ),
            },
            {
              // id: "/growth-sector",
              title: "Textile, Wearing Apparel & Leather Products ",
              bgColor: "bg-[#6a7039]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M24 64l32 0 24 0 0 24 0 88 0 80 0 80 0 88 0 24-24 0-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l8 0 0-40-8 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l8 0 0-32-8 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l8 0 0-32-8 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l8 0 0-40-8 0C10.7 112 0 101.3 0 88S10.7 64 24 64zm88 0l416 0 0 384-416 0 0-384zM640 88c0 13.3-10.7 24-24 24l-8 0 0 40 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 32 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 32 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 40 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0-24 0 0-24 0-88 0-80 0-80 0-88 0-24 24 0 32 0c13.3 0 24 10.7 24 24z"></path>
                </svg>
              ),
            },
            {
              // id: "/jobs",
              title: "Wood & Wood Products ",
              bgColor: "bg-[#4E5A6A]",
              icon: (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512"
                  className="w-16 h-16 text-[#9dd8d0] opacity-90"
                  fill="currentColor"
                >
                  <path d="M192 64l0 64c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32zM82.7 207c-15.3 8.8-20.5 28.4-11.7 43.7l32 55.4c8.8 15.3 28.4 20.5 43.7 11.7l55.4-32c15.3-8.8 20.5-28.4 11.7-43.7l-32-55.4c-8.8-15.3-28.4-20.5-43.7-11.7L82.7 207zM288 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-64 0zm64 160c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-64 0zM160 384l0 64c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32zM32 352c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-64 0z"></path>
                </svg>
              ),
            },
            ...(showTvetSupply
              ? [
                  {
                    id: "tvetSupply",
                    label: "tvetSupply",
                    icon: (
                      <>
                        <path
                          stroke="none"
                          d="M0 0h24v24H0z"
                          fill="none"
                        ></path>
                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                        <path d="M15 7a2 2 0 0 1 2 2"></path>
                        <path d="M15 3a6 6 0 0 1 6 6"></path>
                      </>
                    ),
                  },
                ]
              : []),
          ].map((card, index) => (
            <div
            onClick={() => navigatetoPages(card.id)}
              key={index}
              className={`relative overflow-hidden cursor-pointer ${card.bgColor} text-white h-96 flex items-center justify-center p-6 transform transition-transform hover:scale-105`}
            >
              {/* Triangle corner background */}
              <div className="absolute top-0 left-0 w-0 h-0 border-t-[120px] border-r-[120px] border-t-black border-r-transparent opacity-15 pointer-events-none" />

              {/* Icon placed right over the triangle */}
              <div className="absolute top-4 left-4 opacity-90 w-16 h-16">
                {card.icon}
              </div>

              {/* Content */}
              <div className="relative text-right ml-auto">
                <h2 className="text-[25px] font-bold mb-2">{card.title}</h2>
                <p className="text-2xl italic">{card.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default GrowthSector;
