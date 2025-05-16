import { useEffect, useState } from "react";

import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import MapComponent from "@/components/templates/MapComponent/MapComponent";


const DistMap = () => {
  // useEffect(() => {
  //   window.scrollTo(0, 0);
  // }, []);



  const MapEmbed = ({ src, width, height, customStyles }) => {
    return (
      <div className={`w-full max-w-screen-xl mx-auto p-4 ${customStyles}`}>
        <div className="relative pb-[68.26%] h-0 overflow-hidden rounded-lg shadow-lg">
          <iframe
            src={src}
            className="absolute top-0 left-0 w-full h-full border-0"
            width={width}
            height={height}
            allowFullScreen
            loading="lazy"
          ></iframe>
        </div>
      </div>
    );
  };

  const [mapConfig, setMapConfig] = useState({
    src: 'https://skillingpakistan.gov.pk/dmap/',
    width: 1024,
    height: 699,
    customStyles: 'bg-white border-gray-200', // Customize with additional styles
  });

 

 




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
              width="32"
              height="32"
            >
              <path d="M496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM464 96H345.9c-21.4 0-32.1 25.9-17 41l32.4 32.4L288 242.8l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0l-68.7 68.7c-6.3 6.3-6.3 16.4 0 22.6l22.6 22.6c6.3 6.3 16.4 6.3 22.6 0L192 237.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0l96-96 32.4 32.4c15.1 15.1 41 4.4 41-17V112c0-8.8-7.2-16-16-16z"></path>
            </svg>
          </div>

          <h2 className="text-light text-[22px] text-bold ml-3 text-white ">
            District Map
          </h2>
          <div></div>
        </div>
        <div className="flex px-16 mt-4 py-8">
          <div className="w-1/2 p-4">
            <h3
              className=" text-2xl text-white"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              This Map offers a holistic visual representation of TVET-related
              data across districts of Pakistan, enabling the viewer to
              understand the distribution and capacity of educational institutes
              at a granular level. It provides a consolidated geographical view
              of a number of critical indicators, highlighting regional
              disparities, areas of high demand, and helps identify areas and
              resources needing strengthening. Through this map, stakeholders
              can work towards a better alignment of TVET infrastructure with
              local labor market needs. The level of details in this map
              supports informed planning, resource allocation, and policy
              development, fostering a more equitable and effective vocational
            </h3>
          </div>
          <div className="w-1/2 p-4">
            <h3
              className="text-2xl text-white"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              education landscape across Pakistan. Decision-making is,
              therefore, guided by accurate, localized insights with information
              on key variables, such as the industry, TVET institutions,
              enrolments and drop-outs, and training capacities. The
              district-level breakdown gives nuanced understanding for targeted
              analysis of supply and demand trends within specific regions. TVET
              providers, researchers, and employers can identify districts
              needing enhanced facilities, review of courses offered, and
              strategic investments to improve access and outcomes.
            </h3>
          </div>
        </div>
      </div>




      <MapComponent />

     {/* <div>
     <div className="p-6">
      <h1 className="text-2xl font-semibold mb-4">Dynamic Map Embed</h1>
      <MapEmbed 
        src={mapConfig.src} 
        width={mapConfig.width} 
        height={mapConfig.height} 
        customStyles={mapConfig.customStyles} 
      />
      <div className="mt-4">
        <button
          className="px-4 py-2 bg-blue-500 text-white rounded-md"
          onClick={() => setMapConfig({
            ...mapConfig,
            src: 'https://new-map-source.com', // New source URL
            width: 1200,
            height: 800,
            customStyles: 'bg-gray-100 border-blue-500', // Custom styles
          })}
        >
          Change Map Configuration
        </button>
      </div>
    </div>

     </div> */}




      <Footer />
    </div>
  );
};

export default DistMap;
